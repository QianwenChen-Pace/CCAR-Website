<?php

if (isset($_POST['submit3'])) {

    include_once 'dbh.inc.php';

    $first = mysqli_real_escape_string($conn, $_POST['first']);
    $last = mysqli_real_escape_string($conn, $_POST['last']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pwd = mysqli_real_escape_string($conn, $_POST['pwd']);
    $pwd2 = mysqli_real_escape_string($conn, $_POST['pwd2']);

    //Error handlers
    //Check for empty fields
    if (empty($first) || empty($last) || empty($email) || empty($pwd)) {
        header("Location: ../instructorSignup.php?signup=empty");
        exit();
    } else {
        //Check if input characters are valid
        if (!preg_match("/^[-\sa-zA-Z]+$/", $first) || !preg_match("/^[-\sa-zA-Z]+$/", $last)) {
            header("Location: ../instructorSignup.php?signup=invalidname");
            exit();
        } else {
            //Check if email is valid
            if (!filter_var($email, FILTER_VALIDATE_EMAIL) || !(stripos($email, 'pace.edu'))) {
                header("Location: ../instructorSignup.php?signup=email");
                exit();
            } else { //Check if email exists USING PREPARED STATEMENTS
                $sql = "SELECT * FROM `instructor` WHERE email='$email'";
                //Create a prepared statement
                $stmt = mysqli_stmt_init($conn);
                //Check if prepared statement fails
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    header("Location: ../index.php?login=error");
                    exit();
                } else {
                    //Bind parameters to the placeholder

                    mysqli_stmt_bind_param($stmt, "s", $un);

                    //Run query in database
                    mysqli_stmt_execute($stmt);

                    //Check if user exists
                    mysqli_stmt_store_result($stmt);
                    $resultCheck = mysqli_stmt_num_rows($stmt);
                    if ($resultCheck > 0) {
                        header("Location: ../instructorSignup.php?signup=emailtaken");
                        exit();
                    } else {
                        if ((!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%\^&\*])(?=.{8,})/", $pwd))) {
                            header("Location: ../instructorSignup.php?signup=passwordsWeak");
                            exit();
                        } else {
                            if (($_POST['pwd']) !== ($_POST['pwd2'])) {
                                header("Location: ../instructorSignup.php?signup=whypasswordsNoMatch");
                                exit();
                            } else {
                                //Hashing the password
                                $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
                                //Insert the user into the database
                                $sql = "INSERT INTO `instructor` (firstname, lastname, email, pwd) VALUES ('$first','$last','$email','$hashedPwd');";

                                $result = mysqli_query($conn, $sql);

                                header("Location: ../instructorSignup.php?signup=success");
                                exit();
                            }
                        }
                    }
                }
            }
        }
    }
}
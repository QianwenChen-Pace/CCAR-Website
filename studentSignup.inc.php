<?php

if (isset($_POST['submit'])) {
    session_start();
    include_once 'dbh.inc.php';

    $first = mysqli_real_escape_string($conn, $_POST['first']);
    $last = mysqli_real_escape_string($conn, $_POST['last']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $street = mysqli_real_escape_string($conn, $_POST['street']);
    $city = mysqli_real_escape_string($conn, $_POST['city']);
    $zip = mysqli_real_escape_string($conn, $_POST['zip']);
    $un = mysqli_real_escape_string($conn, $_POST['un']);
    $pwd = mysqli_real_escape_string($conn, $_POST['pwd']);
    $pwd2 = mysqli_real_escape_string($conn, $_POST['pwd2']);
    $state = mysqli_real_escape_string($conn, $_POST['state']);

    //Error handlers
    //Check for empty fields
    if (empty($first) || empty($last) || empty($email) || empty($un) || empty($pwd) || empty($zip) || empty($city) || empty($state) || empty($street) || empty($phone)) {
        $_SESSION['signup_empty_message'] = ' Some or all required fields left blank ';
        header("Location: ../studentSignup.php?signup=empty");
        exit();
    } else {
        //Check if input characters are valid
        if (!preg_match("/^[-\sa-zA-Z]+$/", $first) || !preg_match("/^[-\sa-zA-Z]+$/", $last)) {
            $_SESSION['name_error_message'] = ' Name must contain letters and dashes only ';
            header("Location: ../studentSignup.php?signup=invalidname");
            exit();
        } else {
            //Check if email is valid
            if (!filter_var($email, FILTER_VALIDATE_EMAIL) || !(stripos($email, 'pace.edu'))) {
                header("Location: ../studentSignup.php?signup=email");
                exit();
            } else { //Check if email exists USING PREPARED STATEMENTS
                $sql = "SELECT * FROM student_register WHERE email='$email'";
                //Create a prepared statement
                $stmt = mysqli_stmt_init($conn);
                //Check if prepared statement fails
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    header("Location: ../index.php?login=error");
                    exit();
                } else {
                    //Bind parameters to the placeholder
                    //The "s" means we are defining the placeholder as a string
                    mysqli_stmt_bind_param($stmt, "s", $un);

                    //Run query in database
                    mysqli_stmt_execute($stmt);

                    //Check if user exists
                    mysqli_stmt_store_result($stmt);
                    $resultCheck = mysqli_stmt_num_rows($stmt);
                    if ($resultCheck > 0) {
                        header("Location: ../studentSignup.php?signup=emailtaken");
                        exit();
                    } else {
                        //check if phone is valid
                        if (!preg_match("/^[0-9]{10}$/", $phone)) {
                            header("Location: ../studentSignup.php?signup=invalidphone");
                            exit();
                        } else {
                            //checking street v
                            if (!preg_match("/^\s*\S+(?:\s+\S+){2}/", $street)) {
                                header("Location: ../studentSignup.php?signup=invalidstreet");
                                exit();
                            } else {
                                //check if city is valid
                                if (!preg_match("/[-\sa-zA-Z]+$/", $city)) {
                                    header("Location: ../studentSignup.php?signup=invalidcity");
                                    exit();
                                } else {
                                    //check if state is valid
                                    if (!preg_match("/^(?:(A[KLRZ]|C[AOT]|D[CE]|FL|GA|HI|I[ADLN]|K[SY]|LA|M[ADEINOST]|N[CDEHJMVY]|O[HKR]|P[AR]|RI|S[CD]|T[NX]|UT|V[AIT]|W[AIVY]))$/", $state)) {
                                        header("Location: ../studentSignup.php?signup=invalidstate");
                                        exit();
                                        //check if zip is valid
                                    } else {
                                        if (!is_numeric($zip) || $zip > 99999 || $zip < 10000) {
                                            header("Location: ../studentSignup.php?signup=invalidzip");
                                            exit();
                                        } else {
                                            if (!preg_match("/^(u|U)([0-9]{8})$/", $un)) {
                                                header("Location: ../studentSignup.php?signup=invalidUID");
                                                exit();
                                            } else {
                                                //Check if username exists USING PREPARED STATEMENTS
                                                $sql = "SELECT * FROM student_register WHERE unumber='$un'";
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
                                                        header("Location: ../studentSignup.php?signup=Usertaken");
                                                        exit();
                                                    }
                                                    if ((!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%\^&\*])(?=.{8,})/", $pwd))) {
                                                        header("Location: ../studentSignup.php?signup=passwordsWeak");
                                                        exit();
                                                    } else {
                                                        if (($_POST['pwd']) !== ($_POST['pwd2'])) {
                                                            header("Location: ../studentSignup.php?signup=Passwords=NoMatch");
                                                            exit();
                                                        } else {
                                                            //Hashing the password
                                                            $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
                                                            //Insert the user into the database
                                                            $sql = "INSERT INTO student_register (unumber, firstname, lastname, sphone, stradress, city, state, zipcode, email,user_pwd)
						VALUES ('$un','$first','$last','$phone','$street','$city','$state','$zip','$email','$hashedPwd');";


                                                            $result = mysqli_query($conn, $sql);

                                                            header("Location: ../studentSignup.php?signup=success");
                                                            exit();

                                                        }
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
    }
}
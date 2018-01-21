<?php

session_start();

if (isset($_POST['submit'])) {
    //Initializing error message to blank
    $_SESSION['message'] = ' ';
    include_once 'dbh.inc.php';

    $un = mysqli_real_escape_string($conn, $_POST['un']);
    $pwd = mysqli_real_escape_string($conn, $_POST['pwd']);

    //Error handlers
    //Check if inputs are empty
    if (empty($un) || empty($pwd)) {
        $_SESSION['message'] = ' Username or Password field is blank ';
        header("Location: ../index.php");
        exit();
    }
    //to separate which user type is trying to login we use pattern matching, if the pattern matches the specified user
    //type it will check the respective table to see if the password matches the username, if so it will be successful.

    if ((filter_var($un, FILTER_VALIDATE_EMAIL))) {
        //Both Supervisors and Instructors use email as username, so we need to check both tables table,

        $sql = "SELECT * FROM `supervisor` WHERE `email`=? LIMIT 1";// this query is for checking the supervisor table
        $sql2 = "SELECT * FROM `instructor` WHERE `email`=? LIMIT 1";// this query is for checking the instructor table

        //Create a prepared statement
        $stmt = mysqli_stmt_init($conn);

        //Check if prepared statement fails
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            //Changing the error message if connection failes
            $_SESSION['message'] = 'Connection Error ';
            header("Location: ../index.php?login=error");
            exit();
        } else {
            //Bind parameters to the placeholder
            mysqli_stmt_bind_param($stmt, "s", $un);

            //Run query in database
            mysqli_stmt_execute($stmt);

            //Get results from query
            $result = mysqli_stmt_get_result($stmt);

            if ($row = mysqli_fetch_assoc($result)) {
                //De-hashing the password
                $hashedPwdCheck = password_verify($pwd, $row['sup_pwd']);

                if ($hashedPwdCheck == false) {
                    header("Location: ../index.php?wrongPassword");
                    $_SESSION['message'] = 'Username or Password is Incorrect';
                    exit();
                } elseif ($hashedPwdCheck == true) {

                    //Set SESSION variables and log user in as supervisor
                    $_SESSION['s_id'] = $row['supervisorid'];
                    $_SESSION['s_first'] = $row['firstname'];
                    header("Location: ../index.php?login=success");
                    $_SESSION['message'] = '';
                    exit();
                }
            } else {
                //If there is no supervisor that matches it will then attempt to find a match in the instructor table
                if (!mysqli_stmt_prepare($stmt, $sql2)) {
                    header("Location: ../index.php?login=error");
                    $_SESSION['message'] = 'Connection Error';
                    exit();
                } else {
                    //Bind parameters to the placeholder
                    mysqli_stmt_bind_param($stmt, "s", $un);

                    //Run query in database
                    mysqli_stmt_execute($stmt);

                    //Get results from query
                    $result = mysqli_stmt_get_result($stmt);

                    if ($row = mysqli_fetch_assoc($result)) {
                        //De-hashing the password
                        $hashedPwdCheck = password_verify($pwd, $row['pwd']);
                        if ($hashedPwdCheck == false) {
                            header("Location: ../index.php?login=error");
                            $_SESSION['message'] = 'Username or Password is Incorrect';
                            exit();
                        } elseif ($hashedPwdCheck == true) {
                            //Set SESSION variables and log user in as an instructor
                            $_SESSION['i_id'] = $row['instructorid'];
                            $_SESSION['i_first'] = $row['firstname'];

                            header("Location: ../index.php?login=success");
                            $_SESSION['message'] = '';
                            exit();
                        }
                    }
                    mysqli_stmt_close($stmt);
                    header("Location: ../index.php?login=error2");
                    $_SESSION['message'] = 'User does not exist';
                    exit();
                }
            }
        }
    }

    //Here we check to see if it doesnt match the student type, as the only other user type besides instructor, supervisors
    //or student would be admins we search through that table only
    if ((!preg_match("/^(u|U)([0-9]{8})$/", $un))) {

        $sql = "SELECT * FROM `admins` WHERE username=? LIMIT 1";  //query for input username
        //Create a prepared statement
        $stmt = mysqli_stmt_init($conn);
        //Check if prepared statement fails
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../index.php?login=error");
            $_SESSION['message'] = 'Connection Error';
            exit();
        } else {
            //Bind parameters to the placeholder
            mysqli_stmt_bind_param($stmt, "s", $un);

            //Run query in database
            mysqli_stmt_execute($stmt);

            //Get results from query
            $result = mysqli_stmt_get_result($stmt);

            if ($row = mysqli_fetch_assoc($result)) {

                if ($pwd != $row['password']) {
                    header("Location: ../index.php?login=error");
                    $_SESSION['message'] = 'Username or Password is Incorrect';
                    exit();
                } elseif ($pwd == $row['password']) {
                    //Set SESSION variables and log user in
                    $_SESSION['a_id'] = $row['admin_id'];
                    $_SESSION['a_name'] = $row['username'];

                    header("Location: ../index.php?login=success");
                    $_SESSION['message'] = '';
                    exit();

                }
            }
            mysqli_stmt_close($stmt);
            header("Location: ../index.php?login=error");
            $_SESSION['message'] = 'User does not exist';
            exit();
        }
    }

    else if(preg_match("/^(u|U)([0-9]{8})$/", $un)){
        //Last user type is student so we search through that table
        $sql = "SELECT * FROM student_register WHERE unumber=? limit 1";  //Searches the student table
        //Create a prepared statement
        $stmt = mysqli_stmt_init($conn);
        //Check if prepared statement fails
        if(!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../index.php?login=error");
            $_SESSION['message'] = 'Connection Error';
            exit();
        } else {
            //Bind parameters to the placeholder
            mysqli_stmt_bind_param($stmt, "s", $un);

            //Run query in database
            mysqli_stmt_execute($stmt);

            //Get results from query
            $result = mysqli_stmt_get_result($stmt);

            if ($row = mysqli_fetch_assoc($result)) {
                //De-hashing the password
                $hashedPwdCheck = password_verify($pwd, $row['user_pwd']);
                if ($hashedPwdCheck == false) {
                    header("Location: ../index.php?wrongPassword");
                    $_SESSION['message'] = 'Username or Password is Incorrect';
                    exit();
                } elseif ($hashedPwdCheck == true) {
                    //Set SESSION variables and log user in
                    $_SESSION['u_id'] = $row['unumber'];
                    $_SESSION['u_first'] = $row['firstname'];

                    header("Location: ../index.php?login=success");
                    $_SESSION['message'] = '';
                    exit();
                }
            } else {
                header("Location: ../index.php?login=error");
                $_SESSION['message'] = 'Connection Error';
                exit();
            }
        }
        mysqli_stmt_close($stmt); }

} else {
    header("Location: ../index.php?login=error");
    $_SESSION['message'] = 'Connection Error';
    exit();
}
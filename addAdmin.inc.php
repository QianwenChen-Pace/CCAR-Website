<?php

if (isset($_POST['submit4'])) {

    include_once 'dbh.inc.php';

    $un = mysqli_real_escape_string($conn, $_POST['adminUN']);
    $pwd = mysqli_real_escape_string($conn, $_POST['pwd']);
    $pwd2 = mysqli_real_escape_string($conn, $_POST['pwd2']);

    //Error handlers
    //Check for empty fields
    if (empty($un) || empty($pwd)) {
        header("Location: ../adminAddAdmin.php?signup=empty");
        exit();
    } else {
        $sql = "SELECT * FROM `admins` WHERE `username` = '$un';";
        $qry = mysqli_query($conn,$sql);
        if ((mysqli_num_rows($qry) != 0)){
            header("Location: ../adminAddAdmin.php?username=taken");
            exit();
        } else {
            if ((!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%\^&\*])(?=.{8,})/", $pwd))) {
                header("Location: ../adminAddAdmin.php?signup=passwordsWeak");
                exit();
            } else {
                if (($_POST['pwd']) !== ($_POST['pwd2'])) {
                    header("Location: ../adminAddAdmin.php?signup=whypasswordsNoMatch");
                    exit();
                } else {
                    $sql = "INSERT INTO `admins` (`username`, `password`) VALUES ('$un','$pwd');";

                    $result = mysqli_query($conn, $sql);

                    header("Location: ../adminAddAdmin.php?signup=success");
                    exit();
                }
            }
        }
    }
}

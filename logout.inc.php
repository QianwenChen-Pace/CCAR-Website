<?php
if(isset($_POST['submit'])){
    //Destoying session and session data on clicking logout
    session_start();
    session_unset();
    session_destroy();
    header("Location: ../index.php");
    exit();
}
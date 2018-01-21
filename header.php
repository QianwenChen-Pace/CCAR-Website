<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
        <title>Sign-Up</title>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <!-- Google Font: Open Sans -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400,400italic,600,600italic,800,800italic">
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Oswald:400,300,700">

        <!-- Font Awesome CSS -->
        <link rel="stylesheet" href="./css/font-awesome.min.css">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="./css/bootstrap.min.css">

        <!-- App CSS -->
        <link rel="stylesheet" href="./css/mvpready-admin.css">
        <!--<link rel="stylesheet" href="./css/mvpready-flat.css">-->
   <!-- <link rel="stylesheet" href="./style.css">
        <!-- <link href="./css/custom.css" rel="stylesheet">-->

        <!-- Favicon -->
        <link rel="shortcut icon" href="favicon.ico">

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    </head>
<body>
<header>
    <header class="navbar navbar-inverse" role="banner">


        <ul style="margin-left: 100px" class="nav navbar-nav navbar-left">
            <li>
                <a href="./index.php"><i class="fa fa-angle-double-left"></i> &nbsp;Back to Home</a>
            </li>
        </ul>

        <div  style="float: right; margin-right: 100px;padding-bottom: 15px;">
            <br>
<?php
if(isset($_SESSION['u_id'])||isset($_SESSION['a_id'])||isset($_SESSION['s_id'])||isset($_SESSION['i_id'])){
    echo '<form action="includes/logout.inc.php" method="POST">
                    <button type="submit" name="submit">Logout</button>
                    </form>
                     </div> <!-- /.container -->

    </header>';
}else{
           echo '<form action="includes/loginValidate.inc.php" method="POST">
                <input type="text" name="un" placeholder="Username">
                <input type="password" name="pwd" placeholder="Password">
                <button type="submit" name="submit">Login</button>
                <button><a href="signupSplash.php"> Sign up</a></button></form>

        </div> <!-- /.container -->

    </header>';}
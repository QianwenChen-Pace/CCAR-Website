<?php include_once 'header.php';
?>
<?php include_once 'includes/dbh.inc.php'; ?>



                    <?php
                    //login check
                    if (isset($_SESSION['u_id'])){
                    $session = ($_SESSION['u_id']);
                    $username = ($_SESSION['u_first']);

                    ?>



                    <body class="account-bg">


                    <div class="account-wrapper">

                        <div class="account-body">

                            <h3>Welcome  <?php echo "Welcome "; echo $username;?>!</h3>


                            <form class="form account-form" method="POST">

                                <div class="form-group">
                                    <button type="submit" name= "student" class="btn btn-primary btn-block btn-lg" tabindex="4"><a href="studentSubmitform.php">
                                            Submit Form</a>
                                    </button>
                                </div> <!-- /.form-group -->
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-block btn-lg" tabindex="4"><a href="studentviewform.php">
                                            View Forms</a>
                                    </button>
                                </div> <!-- /.form-group -->

                            </form>


                        </div> <!-- /.account-body -->


                    </div> <!-- /.account-wrapper -->
                    </body>

                    <?php
                }
                //login check
                elseif (isset($_SESSION['a_id'])){
                $session = ($_SESSION['a_id']);

                ?>


                    <body class="account-bg">


                    <div class="account-wrapper">

                        <div class="account-body">

                            <h1>Admin Menu</h1>
                            <h4> Select a View </h4>


                            <form class="form account-form" method="POST">

                                <div class="form-group">
                                    <button type="submit" name= "student" class="btn btn-primary btn-block btn-lg" tabindex="4"><a href="adminviewAdmins.php" >
                                            View Admins</a>
                                    </button>
                                </div> <!-- /.form-group -->
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-block btn-lg" tabindex="4"><a href="adminViewCommunity.php">
                                        View Communities
                                    </button>
                                </div> <!-- /.form-group -->

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-block btn-lg" tabindex="4"><a href="adminViewCourse.php">
                                        View Course
                                    </button>
                                </div> <!-- /.form-group -->

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-block btn-lg" tabindex="4"><a href="adminViewInstructors.php">
                                            View Instructors
                                    </button>
                                </div> <!-- /.form-group -->
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-block btn-lg" tabindex="4"><a href="adminViewForms.php">
                                            Submitted Forms
                                    </button>
                                </div> <!-- /.form-group -->
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-block btn-lg" tabindex="4"><a href="adminViewStudents.php">
                                            View Students
                                    </button>
                                </div> <!-- /.form-group -->
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-block btn-lg" tabindex="4"><a href="adminViewSupervisors.php">
                                            View Supervisors
                                    </button>
                                </div> <!-- /.form-group -->
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-block btn-lg" tabindex="4"><a href="adminAddAdmin.php">
                                            New Admin
                                    </button>
                                </div> <!-- /.form-group -->

                            </form>


                        </div> <!-- /.account-body -->


                    </div> <!-- /.account-wrapper -->

                    </body>

                    <?php
                }
                    //login check
                    else if (isset($_SESSION['s_id'])){
                    $session = ($_SESSION['s_id']);
                    $username = ($_SESSION['s_first']);

                    ?>

                <body class="account-bg">


                <div class="account-wrapper">

                    <div class="account-body">

                        <h3>Welcome  <?php echo $username;?>!</h3>


                        <form class="form account-form" method="POST">

                            <div class="form-group">
                                <button type="submit" name= "student" class="btn btn-primary btn-block btn-lg" tabindex="4"><a href="supervisorForm.php">
                                        Verify Forms</a>
                                </button>
                            </div> <!-- /.form-group -->

                        </form>


                    </div> <!-- /.account-body -->


                </div> <!-- /.account-wrapper -->
                </body>




                <?php
                }else if (isset($_SESSION['i_id'])){
                $session = ($_SESSION['i_id']);
                $username = ($_SESSION['i_first']);

                ?>

                <body class="account-bg">


                <div class="account-wrapper">

                    <div class="account-body">

                        <h3>Welcome  <?php echo $username;?>!</h3>


                        <form class="form account-form" method="POST">

                            <div class="form-group">
                                <button type="submit" name= "student" class="btn btn-primary btn-block btn-lg" tabindex="4"><a href="instructorForms.php">
                                        Verify Forms</a>
                                </button>
                            </div> <!-- /.form-group -->

                        </form>


                    </div> <!-- /.account-body -->


                </div> <!-- /.account-wrapper -->
                </body>


        <?php } else{ include_once 'footer.php';
        ?>

<section class="main-container">
    <div class="main-wrapper">
        <br><br>
        <h3 style="text-align: center">Welcome to the CCAR Form Verification Site!</h3>
        <h5 style="text-align: center; color: red">Please login at the top right to see further options or click "Sign Up" to create an account</h5>

        <center><img src="ccar2.jpg" alt="what image shows" ></center>-->
        <section class="main-container">
            <div class="main-wrapper">
                <form  class="student-form"  method="post"><!--action="studentform.php"-->


                    <?php } ?>
        <!-- Bootstrap core JavaScript
                    ================================================== -->
        <!-- Core JS -->
        <script src="./js/libs/jquery-1.10.2.min.js"></script>
        <script src="./js/libs/bootstrap.min.js"></script>

        <!--[if lt IE 9]>
        <script src="./js/libs/excanvas.compiled.js"></script>
        <![endif]-->
        <!-- App JS -->
        <script src="./js/mvpready-core.js"></script>
        <script src="./js/mvpready-admin.js"></script>

        <!-- Plugin JS -->
        <script src="./js/mvpready-account.js"></script>
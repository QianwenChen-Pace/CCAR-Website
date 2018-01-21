<?php include_once 'header.php'; ?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="en" class="no-js"> <!--<![endif]-->


<body class="account-bg">


<div class="account-wrapper">

    <div class="account-body">

        <h3>Welcome to CCAR Verification</h3>

        <h5>Please sign up to get access.</h5>

        <form class="form account-form" method="POST">

            <div class="form-group">
                <button type="submit" name= "student" class="btn btn-primary btn-block btn-lg" tabindex="4"><a href="studentSignup.php">
                    Student Sign up </a>
                </button>
            </div> <!-- /.form-group -->
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block btn-lg" tabindex="4"><a href="instructorSignup.php">
                    Instructor Sign up</a>
                </button>
            </div> <!-- /.form-group -->
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block btn-lg" tabindex="4"><a href="supervisorSignup.php">
                        Supervisor Sign up</a>
                </button>
            </div> <!-- /.form-group -->

        </form>


    </div> <!-- /.account-body -->


</div> <!-- /.account-wrapper -->

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



</body>
</html>
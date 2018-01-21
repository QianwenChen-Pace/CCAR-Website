<?php include_once 'includes/dbh.inc.php'; ?>
<?php include_once 'header.php';
?>

<html>
<body>
<?php
    if (isset($_SESSION['a_id'])) {
        $session = ($_SESSION['a_id']);
        ?>
        <div class="account-wrapper">

            <div class="account-body">

                <h2>New Admin</h2>
                <form class="form account-form" style="text-align: center;" action="includes/addAdmin.inc.php" method="POST">
                    <input type="text" name="adminUN" placeholder="UserName"><br><br>
                    <input type="password" name="pwd" placeholder="Password"><br><br>
                    Make sure your password is at least 8 characters long and contains and number, an upper and lower case letter and a special character<br><br>
                    <input type="password" name="pwd2" placeholder="Please Re-Enter Password"><br><br>
                    <button type="submit" name ="submit4">Sign Up</button><br><br>
                </form>
            </div>
        </div>

<?php } ?>
</body>
</html>
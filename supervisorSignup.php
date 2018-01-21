<?php include_once 'header.php';
?>
    <div class="account-wrapper">

        <div class="account-body">
            <h2>Supervisor Sign Up</h2>

            <form class="form account-form" style="text-align: center;" action="includes/supervisorSignup.inc.php" method="POST">
                <input type="text" name="first" placeholder="First Name"><br><br>
                <input type="text" name="last" placeholder="Last Name"><br><br>
                <input type="text" name="email" placeholder="E-mail"><br><br>
                <input type="text" name="phone" placeholder="Phone Number"><br><br>
                Please enter number using only numbers, do not use dashes or any special characters<br><br>
                <input type="password" name="pwd" placeholder="Password"><br><br>
                Make sure your password is at least 8 characters long and contains and number, an upper and lower case letter and a special character<br><br>
                <input type="password" name="pwd2" placeholder="Please Re-Enter Password"><br><br>
                <button type="submit" name ="submit2">Sign Up</button><br><br>
            </form>
        </div>
    </div>
<?php include_once 'footer.php';
?>
<?php include_once 'header.php';
?>

        <div class="account-wrapper">

            <div class="account-body">
        <h2>Sign Up</h2>

        <form class="form account-form" style="text-align: center;" action="includes/studentSignup.inc.php" method="POST">
            <input type="text" name="first" placeholder="First Name"><br><br>
            <input type="text" name="last" placeholder="Last Name"><br><br>
            <input type="text" name="email" placeholder="E-mail"><br><br>
            Use your Pace email Only<br><br>
            <input type="text" name="phone" placeholder="Phone Number"><br><br>
            Please enter number using only numbers, do not use dashes or any special characters<br><br>
            <input type="text" name="street" placeholder="Street Address"><br><br>
            <input type="text" name="city" placeholder="City / Town"><br><br>
            State:<br>
            <select name="state" id="state"><br><br>
                <option value="AL">Alabama</option>
                <option value="AK">Alaska</option>
                <option value="AZ">Arizona</option>
                <option value="AR">Arkansas</option>
                <option value="CA">California</option>
                <option value="CO">Colorado</option>
                <option value="CT">Connecticut</option>
                <option value="DE">Delaware</option>
                <option value="DC">District of Columbia</option>
                <option value="FL">Florida</option>
                <option value="GA">Georgia</option>
                <option value="HI">Hawaii</option>
                <option value="ID">Idaho</option>
                <option value="IL">Illinois</option>
                <option value="IN">Indiana</option>
                <option value="IA">Iowa</option>
                <option value="KS">Kansas</option>
                <option value="KY">Kentucky</option>
                <option value="LA">Louisiana</option>
                <option value="ME">Maine</option>
                <option value="MD">Maryland</option>
                <option value="MA">Massachusetts</option>
                <option value="MI">Michigan</option>
                <option value="MN">Minnesota</option>
                <option value="MS">Mississippi</option>
                <option value="MO">Missouri</option>
                <option value="MT">Montana</option>
                <option value="NE">Nebraska</option>
                <option value="NV">Nevada</option>
                <option value="NH">New Hampshire</option>
                <option value="NJ">New Jersey</option>
                <option value="NM">New Mexico</option>
                <option value="NY">New York</option>
                <option value="NC">North Carolina</option>
                <option value="ND">North Dakota</option>
                <option value="OH">Ohio</option>
                <option value="OK">Oklahoma</option>
                <option value="OR">Oregon</option>
                <option value="PA">Pennsylvania</option>
                <option value="RI">Rhode Island</option>
                <option value="SC">South Carolina</option>
                <option value="SD">South Dakota</option>
                <option value="TN">Tennessee</option>
                <option value="TX">Texas</option>
                <option value="UT">Utah</option>
                <option value="VT">Vermont</option>
                <option value="VA">Virginia</option>
                <option value="WA">Washington</option>
                <option value="WV">West Virginia</option>
                <option value="WI">Wisconsin</option>
                <option value="WY">Wyoming</option>
            </select><br><br>
            <input type="text" name="zip" placeholder="Postal Code"><br><br>
            <input type="text" name="un" placeholder="UID"><br><br>
            <input type="password" name="pwd" placeholder="Password"><br><br>
            Make sure your password is at least 8 characters long and contains and number, an upper and lower case letter and a special character<br><br>
            <input type="password" name="pwd2" placeholder="Please Re-Enter Password"><br><br>
            <button type="submit" name ="submit">Sign Up</button><br><br>
        </form>
    </div>
        </div>

<?php include_once 'footer.php';
?>
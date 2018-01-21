<?php include_once 'header.php';
?>
<?php include_once 'includes/dbh.inc.php'; ?>
<?php
//initializes errors to empty for the first attempt
$ServiceError="";
$HoursError="";
$s_fnameError="";
$s_lnameError="";
$s_phoneError="";
$s_emailError="";
$i_fnameError="";
$i_lnameError="";
$i_emailError="";
$c_nameError="";
$c_numError="";
$DescriptionError="";
$crnError="";
$comnameError="";
$ConfirmError="";

//used to ensure no errors have occurred
$error_msg = array();

//Checks if fields are set
if(isset($_POST['fsubmit'])) {
    //Service Date Validation and Format
    if (empty($_POST["serviceDate"])) {
        $error_msg[] = ' ';
        $ServiceError = "Date of Service is Required";
    } else {
        $serviceDate = $_POST["serviceDate"];
        list($m, $d, $y) = explode('/', $serviceDate);
        if (!checkdate($m, $d, $y)) {
            $error_msg[] = ' ';
            $ServiceError = "Please enter a valid date in the format mm/dd/yyyy";
        } else {
            $serviceDate = $_POST['serviceDate'];
        }
    }
    //Hours Validation
    if (empty($_POST["Hours"])) {
        $error_msg[] = ' ';
        $HoursError = "Number of Hours is Required";
    } else {
        $Hours = $_POST["Hours"];
        if (!is_numeric($Hours) || $Hours > 24) {
            $error_msg[] = ' ';
            $HoursError = "Number Exceeds Maximum Allowed Hours or is not a numeric value";
        } else {
            $Hours = $_POST['Hours'];
        }
    }
    //Supervisor first name Validation
    if (empty($_POST["s_fname"])) {
        $error_msg[] = ' ';
        $s_fnameError = "Name is Required";
    } else {
        $s_fname = $_POST["s_fname"];
        if (!preg_match("/^[-\sa-zA-Z]+$/", $s_fname)) {
            $error_msg[] = ' ';
            $s_fnameError = "Only Letters and Spaces are allowed";
        } else {
            $s_fname = $_POST['s_fname'];
        }
    }
    //Supervisor last name Validation
    if (empty($_POST["s_lname"])) {
        $error_msg[] = ' ';
        $s_lnameError = "Name is Required";
    } else {
        $s_lname = $_POST["s_lname"];
        if (!preg_match("/^[-\sa-zA-Z]+$/", $s_lname)) {
            $error_msg[] = ' ';
            $s_lnameError = "Only Letters and Spaces are allowed";
        } else {
            $s_lname = $_POST['s_lname'];
        }
    }
    //Supervisors Phone number Validation
    if (empty($_POST["s_phone"])) {
        $error_msg[] = ' ';
        $s_phoneError = "Phone Number is Required";
    } else {
        $s_phone = $_POST["s_phone"];
        if (!preg_match("/^[0-9]{10}$/", $s_phone)) {
            $error_msg[] = ' ';
            $s_phoneError = "Please enter number using only numbers, do not use dashes or any special characters";
        } else {
            $s_phone = $_POST['s_phone'];
        }
    }
    //Supervisor Email Validation
    if (empty($_POST["s_email"])) {
        $error_msg[] = ' ';
        $s_emailError = "Email is Required";
    } else {
        $s_email = $_POST['s_email'];
        if (!filter_var($s_email, FILTER_VALIDATE_EMAIL)) {
            $error_msg[] = ' ';
            $s_emailError = "Please enter a valid email address";
        } else {
            $s_email = $_POST['s_email'];
        }
    }
    //Instructor First name validation
    if (empty($_POST["i_fname"])) {
        $error_msg[] = ' ';
        $i_fnameError = "Name is Required";
    } else {
        $i_fname = $_POST["i_fname"];
        if (!preg_match("/^[-\sa-zA-Z]+$/", $i_fname)) {
            $error_msg[] = ' ';
            $i_fnameError = "Only Letters and Spaces are allowed";
        } else {
            $i_fname = $_POST['i_fname'];
        }
    }
    //Instructor last name Validation
    if (empty($_POST["i_lname"])) {
        $error_msg[] = ' ';
        $i_lnameError = "Name is Required";
    } else {
        $i_lname = $_POST["i_lname"];
        if (!preg_match("/^[-\sa-zA-Z]+$/", $i_lname)) {
            $error_msg[] = ' ';
            $i_lnameError = "Only Letters and Spaces are allowed";
        } else {
            $i_lname = $_POST['i_lname'];
        }
    }
    //Instructor Email Validation
    if (empty($_POST["i_email"])) {
        $error_msg[] = ' ';
        $i_emailError = "Email is Required";
    } else {
        $i_email = $_POST['i_email'];
        if (!filter_var($i_email, FILTER_VALIDATE_EMAIL) || !(stripos($i_email, 'pace.edu'))) {
            $error_msg[] = ' ';
            $s_emailError = "Please enter a valid email address";
        } else {
            $i_email = $_POST['i_email'];
        }
    }
    //Course Name Validation
    if (empty($_POST["c_name"])) {
        $error_msg[] = ' ';
        $c_nameError = "Name is Required";
    } else {
        $c_name = $_POST["c_name"];
        if (!preg_match("/^[-\sa-zA-Z]+$/", $c_name)) {
            $error_msg[] = ' ';
            $c_nameError = "Only Letters and Spaces are allowed";
        } else {
            $c_name = $_POST['c_name'];
        }
    }
    //Course Number Validation
    if (empty($_POST["c_num"])) {
        $error_msg[] = ' ';
        $c_numError = "Course Number is Required";
    } else {
        $c_num = $_POST["c_num"];

        if (!preg_match("/^[a-zA-Z]{2}[0-9]{3}$/", $c_num)) {
            $error_msg[] = ' ';
            $c_numError = "Only Letters and Spaces are allowed";
        } else {
            $c_num = $_POST['c_num'];
        }
    }
    //Can only be validated by supervisor
    if (empty($_POST["Comment"])) {
        $error_msg[] = ' ';
        $DescriptionError = "Description is Required";
    } else {
        $Comment = $_POST["Comment"];
    }
    //CRN validation
    if (empty($_POST["crn"])) {
        $error_msg[] = ' ';
        $crnError = "CRN is required";
    } else {
        $crn = $_POST["crn"];
        if (!is_numeric($crn) || !preg_match("/^[0-9]{1,6}$/",$crn)) {
            $crnError = "Please enter the 6 digit CRN";
        } else {
            $crn = $_POST['crn'];
        }
    }
    //Community Name Verification
    if (empty($_POST["community"])) {
        $error_msg[] = ' ';
        $comnameError = "Name is Required";
    } else {
        $com_name = $_POST["community"];
        if (!preg_match("/^[-\sa-zA-Z]+$/", $com_name)) {
            $error_msg[] = ' ';
            $c_nameError = "Only Letters and Spaces are allowed";
        } else {
            $com_name = $_POST['community'];
        }
    }
    //Check Box Verification
    if (empty($_POST["confirm"])) {
        $error_msg[] = ' ';
        $ConfirmError = "If True please check the box";
    } else {
        $confirm = $_POST['confirm'];
    }

//If the form is completed error free
    if (count($error_msg) == 0) {
        //connect to database
       // $conn = mysqli_connect('localhost', 'root', '', 'ccar2');
//if unable to connect
        if (!$conn) {
            $error_msg = ('Could not connect to database: ' . mysqli_error($conn));
        }
        //student_form escape section
        $serviceDate = mysqli_real_escape_string($conn, $_POST['serviceDate']);
        $Hours = mysqli_real_escape_string($conn, $_POST['Hours']);
        $Comment = mysqli_real_escape_string($conn, $_POST['Comment']);
        $session = $_SESSION['u_id'];
        //community name escape section
        $com_name = mysqli_real_escape_string($conn, $_POST['community']);
        //course escape section
        $crn = mysqli_real_escape_string($conn, $_POST['crn']);
        $c_name = mysqli_real_escape_string($conn, $_POST['c_name']);
        $c_num = mysqli_real_escape_string($conn, $_POST['c_num']);
        //instructor escape section
        $i_fname = mysqli_real_escape_string($conn, $_POST['i_fname']);
        $i_lname = mysqli_real_escape_string($conn, $_POST['i_lname']);
        $i_email = mysqli_real_escape_string($conn, $_POST['i_email']);
        //Supervisor escape section
        $s_fname = mysqli_real_escape_string($conn, $_POST['s_fname']);
        $s_lname = mysqli_real_escape_string($conn, $_POST['s_lname']);
        $s_phone = mysqli_real_escape_string($conn, $_POST['s_phone']);
        $s_email = mysqli_real_escape_string($conn, $_POST['s_email']);


        //Multi Query sending data to relevant tables
        $formInsert = " INSERT IGNORE INTO `community` (`name`) VALUES('$com_name'); INSERT IGNORE INTO `course` (`crn`,`title`,`coursenumber`) VALUES('$crn','$c_name','$c_num');";
        //Executing if no errors

        if (!mysqli_multi_query($conn, $formInsert)) {
            echo("Failed to insert");
            exit();
        } else {

                echo "Success";
            }

        }

        if (count($error_msg) == 0) {
            //connect to database
            $conn = mysqli_connect('localhost', 'root', '', 'ccar');
            //if unable to connect
            if (!$conn) {
                $error_msg = ('Could not connect to database: ' . mysqli_error($conn));
            } else {

                $squery = "SELECT * FROM `supervisor` WHERE email='$s_email';";
                if(!$s_result = mysqli_query($conn, $squery)){
                    $s_id = 0;
                } else {
                    $s_value = mysqli_fetch_array($s_result);
                    $s_id = $s_value[0];}

                $rsql = "INSERT INTO `student_supervisor` (`student_id`,`supervisor_id`) VALUES('$session','$s_id');";
                $tsql = "SELECT * FROM `student_supervisor` WHERE `student_id`='$session' AND `supervisor_id`='$s_id'";
                $tresult = mysqli_query($conn, $tsql);

                $squery = "SELECT * FROM `instructor` WHERE email='$i_email';";
                if(!$s_result = mysqli_query($conn, $squery)){
                    $i_id = 0;
                } else {
                    $s_value = mysqli_fetch_array($s_result);
                    $i_id = $s_value[0];}

                $rsql = "INSERT INTO `student_supervisor` (`student_id`,`supervisor_id`) VALUES('$session','$s_id');";
                $tsql = "SELECT * FROM `student_supervisor` WHERE `student_id`='$session' AND `supervisor_id`='$s_id'";
                $tresult = mysqli_query($conn, $tsql);


                $formsql = "INSERT INTO `student_form` (`date`, `thours`, `description`,`session`,`supervisorid`,`instructorid`) VALUES('$serviceDate','$Hours','$Comment','$session','$s_id','$i_id');";
                if (!mysqli_query($conn, $formsql)) {
                    echo("failed to update");
                } else {

                if ((mysqli_num_rows($tresult) == 0)) {
                    if (!mysqli_query($conn, $rsql)) {
                        echo("Failed to insert2");
                        exit();
                    }
                }
            }
            mysqli_close($conn);
            //closing database
        }
    }
}
?>

<html>
<head>
    <Title >Community Service Form</Title>
</head>
<body>
<div class="account-wrapper">

    <div class="account-body">
    <h2>Community Service Verification Form</h2>
    <div class="form">
<form class="form account-form" style="text-align: center;" action="studentSubmitform.php" method="post">
    <span class="FieldInfoHeading">* Please complete all of the following fields.<br><br></span>
    <fieldset>
        Date of Service:*<br>
        <input class="input" type="text" Name="serviceDate" value="">
        <br>
        <span class="Error" style="color:red"><?php echo $ServiceError; ?><br></span><br>
        Total Hours Completed:*<br>
        <input class="input" type="text" Name="Hours" value="">
        <br>
        <span class="Error" style="color:red"><?php echo $HoursError; ?></span><br><br>
        Supervisors First Name:*<br>
        <input class="input" type="text" Name="s_fname" value="">
        <br>
        <span class="Error" style="color:red"><?php echo $s_fnameError; ?></span><br><br>
        Supervisors Last Name:*<br>
        <input class="input" type="text" Name="s_lname" value="">
        <br>
        <span class="Error" style="color:red"><?php echo $s_lnameError; ?></span><br><br>
        Supervisors Phone Number:*<br>
        <input class="input" type="text" Name="s_phone" value="">
        <br>
        <span class="Error" style="color:red"><?php echo $s_phoneError; ?></span><br><br>
        Supervisors E-mail:*<br>
        <input class="input" type="text" Name="s_email" value="">
        <br>
        <span class="Error" style="color:red"><?php echo $s_emailError; ?></span><br><br>
        Instructors First Name:* <a href="https://whitepages.pace.edu/" target="_blank">Pace White Pages</a><br>
        <input class="input" type="text" Name="i_fname" value="">
        <br>
        <span class="Error" style="color:red"><?php echo $i_fnameError; ?></span><br><br>
        Instructors Last Name:*<br>
        <input class="input" type="text" Name="i_lname" value="">
        <br>
        <span class="Error" style="color:red"><?php echo $i_lnameError; ?></span><br><br>
        Instructors Email *<br>
        <input class="input" type="text" Name="i_email" value="">
        <br>
        <span class="Error" style="color:red"><?php echo $i_emailError; ?></span><br><br>
        Course Name:*<br>
        <input class="input" type="text" Name="c_name" value="">
        <br>
        <span class="Error" style="color:red"><?php echo $c_nameError; ?></span><br><br>
        Course Number *<br>
        <input class="input" type="text" Name="c_num" value="">
        <br>
        <span class="Error" style="color:red"><?php echo $c_numError; ?></span><br><br>
        Brief Description of Service:*<br>
        <textarea Name="Comment" rows="5" cols="25"></textarea><br><span class="Error" style="color:red"><?php echo $DescriptionError; ?></span><span class="FieldInfoHeading"></span>
        <br><br>
        CRN:*<br>
        <input class="input" type="text" Name="crn" value="">
        <br>
        <span class="Error" style="color:red"><?php echo $crnError; ?></span><br><br>
        Community Name:*<br>
        <input class="input" type="text" Name="community" value="">
        <br>
        <span class="Error" style="color:red"><?php echo $comnameError; ?></span><br><br>

        <br><input type="checkbox" id="c1" name="confirm" />
        <label for="c1"><span></span>I Confirm That The following information is true to the best of my knowledge*</label><br><br>
        <span class="Error"style="color:red"><?php echo $ConfirmError; ?></span><br><br>
        <button type="submit" name ="fsubmit" value="submit">Submit</button><br><br>

    </fieldset>
</form>
    </div>
</body>
</html>
<?php include_once 'includes/dbh.inc.php'; ?>
<?php include_once 'header.php'; ?>
<?php if (isset($_SESSION['a_id'])) { ?>
    <html>
<body>
    <h1>Submitted Forms</h1>
<table class="dataTables_wrapper table">
    <caption class="title"></caption>
    <thead>
    <tr>
        <th>Form ID</th>
        <th>Date</th>
        <th>Hours</th>
        <th>Description</th>
        <th>Approved</th>
        <th>Student ID</th>
    </tr>
    </thead>
    <tbody>
    <?php
    if (isset($_SESSION['a_id'])) {
        $session = ($_SESSION['a_id']);
        if (!isset($_GET['page'])) {
            $_GET['page'] = 1;
        }
        if (isset($_GET['page'])) {
            $cpage = $_GET['page'];
        }

        $start = 0 + 25 * ($cpage - 1);
        $rows = 25;

        $sql = "SELECT `form_id` AS total FROM `student_form`;";
        $result = mysqli_query($conn, $sql);
        $numrow = mysqli_num_rows($result);
        $total_pages = ceil($numrow / $rows);

        if (isset($_POST['studentU'])) {
            $id = mysqli_real_escape_string($conn, $_POST['studentU']);

            $test1 = "SELECT * FROM `student_form` WHERE `session` = '$id' LIMIT $start, $rows;";
            if(!$result = mysqli_query($conn, $test1)){
                echo 'user does not exist or number was entered in wrong';
            }
            if(isset($_POST['view'])){
                $test1 = "SELECT * FROM `student_form`LIMIT $start, $rows;";
                $result = mysqli_query($conn, $test1);
            }
            if(mysqli_num_rows($result)<1){
                echo 'User does not exist or number was entered in wrong';
            }
            else { $result = mysqli_query($conn, $test1);
            }
        }


        else {
            $test = "SELECT * FROM `student_form`LIMIT $start, $rows;";
            $result = mysqli_query($conn, $test);
        }


        while ($row = mysqli_fetch_array($result)) {

            if (($row['approved']) == '1') {
                $approved = "Approved";
            } else {
                $approved = "Pending";
            }
            echo '<tr>
					<td>' . $row['form_id'] . '</td>
					<td>' . date('F d, Y', strtotime($row['date'])) . '</td>
					<td>' . $row['thours'] . '</td>
					<td>' . $row['description'] . '</td>';
					if (($row['approved']) == 1) {
                    echo '<td><span style= "color:green">Approved</span>';
                } else {
                    echo '<td><span style= "color:red">Pending</span>';
                }
				echo '<td>' . $row['session'] . '</td>
				</tr>';

        }

        mysqli_close($conn);
        ?>
        </tbody >
        </table >
        <?php if($total_pages>1){ ?>
            <div style = "text-align: center" >

                <br ><br ><button class="next-page" type = "submit" name = "submit" ><a href = "adminViewForms.php?page=<?php if ($cpage>1){ echo $cpage-1;} else echo $cpage; ?>" > Previous Page </a ></button >
                <button class="next-page" type = "submit" name = "submit" ><a href = "adminViewForms.php?page=<?php if ($cpage< $total_pages){ echo $cpage+1;} else echo $cpage; ?>" > Next Page </a ></button >
            </div >

        <?php } echo ' 
<section class="main-container" xmlns="http://www.w3.org/1999/html">
    <div class="main-wrapper" style = "text-align: center">
        <div class="form">
            <form class="student-form" method="post">
                <fieldset>
Enter the UNumber of the student whose forms you wish to see <br><br> 
<input class="input" type="text" Name="studentU"><br><br>
                    <button type="submit" name ="filter" value="Filter">Filter</button><br><br></input>


                </fieldset>
                <fieldset>
                    
               <button type="submit" name ="view" value="View">View All</button><br><br>

                </fieldset>
            </form>';
        ?>
        </body >
        </html >
    <?php }else {
        echo "Access Denied, Insufficient Permission";
    }

}
?>
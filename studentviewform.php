<?php include_once 'includes/dbh.inc.php'; ?>
<?php include_once 'header.php'; ?>

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
    </tr>
    </thead>
    <tbody>
    <?php
    if (isset($_SESSION['u_id'])) {
        $session = ($_SESSION['u_id']);
       //determining which page # to display
        if(!isset($_GET['page'])){
            $_GET['page']=1;
        }
        if(isset($_GET['page'])){
            $cpage = $_GET['page'];}
        //Showing first 25 and limiting to 25 per page can be adjusted here
        $start = 0 + 25 * ($cpage - 1);
        $rows = 25;
        //determining total pages
        $sql = "SELECT `form_id` AS total FROM `student_form` WHERE `session`='$session';";
        $result = mysqli_query($conn, $sql);
        $numrow = mysqli_num_rows($result);
        $total_pages = ceil($numrow / $rows);

        //querying data based on set limit
        $test = "SELECT * FROM `student_form` WHERE `session` ='$session' LIMIT $start, $rows;";
        $result = mysqli_query($conn, $test);

    $no 	= 1;
    $total 	= 0;
    while ($row = mysqli_fetch_array($result)) {
        //Changing value of row based on current value
        if(($row['approved'])=='1'){
            $approved = "Approved";
        }else{
            $approved = "Pending";
        }
        echo '<tr>
                    <td>' . $row['form_id'] . '</td>
					<td>' . date('F d, Y', strtotime($row['date'])) . '</td>
					<td>' . $row['thours'] . '</td>
					<td>' . $row['description'] . '</td>';
					 if(($row['approved'])==1){
                echo '<td><span style= "color:green">Approved</span>';
                } else{
                echo '<td><span style= "color:red">Pending</span>';
            }


			echo	'</tr>';
        //adding to users total approved hours to display if approved
        if(($row['approved'])=='1') {
            $total += $row['thours'];
            $no++;
        }
    }
        mysqli_close($conn);
    }
    ?>

    </tbody>
    <tfoot>
    <tr>
        <th colspan="4">Total Approved Hours</th>
        <th><?=number_format($total)?></th>
    </tr>
    </tfoot>
</table>

<?php if($total_pages>1){ //if multiple pages exist, options to change the page will display ?>
<div style = "text-align: center" >

    <br ><br ><button class="next-page" type = "submit" name = "submit" ><a href = "adminViewForms.php?page=<?php if ($cpage>1){ echo $cpage-1;} else echo $cpage; ?>" > Previous Page </a ></button >
    <button class="next-page" type = "submit" name = "submit" ><a href = "adminViewForms.php?page=<?php if ($cpage< $total_pages){ echo $cpage+1;} else echo $cpage; ?>" > Next Page </a ></button >
</div >
<?php } ?>
</body>
</html>
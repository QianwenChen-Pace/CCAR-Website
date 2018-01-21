<?php include_once 'includes/dbh.inc.php'; ?>
<?php include_once 'header.php'; ?>
<?php if (isset($_SESSION['a_id'])){ ?>
<html>
<body>
<h1>Registered Students</h1>
<table class="dataTables_wrapper table">
    <caption class="title"></caption>
    <thead>
    <tr>
        <th>Student ID</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Phone</th>
        <th>Address</th>
        <th>City</th>
        <th>State</th>
        <th>Zip Code</th>
        <th>Email</th>
    </tr>
    </thead>
    <tbody>
    <?php
    if (isset($_SESSION['a_id'])) {
    $session = ($_SESSION['a_id']);

    if(!isset($_GET['page'])){
        $_GET['page']=1;
    }
    if(isset($_GET['page'])){
        $cpage = $_GET['page'];}

    $start = 0 + 25 * ($cpage - 1);
    $rows = 25;

    $sql = "SELECT `unumber` AS total FROM `student_register`;";
    $result = mysqli_query($conn, $sql);
    $numrow = mysqli_num_rows($result);
    $total_pages = ceil($numrow / $rows);

    $test = "SELECT * FROM `student_register`LIMIT $start, $rows";
    $result = mysqli_query($conn, $test);
    while ($row = mysqli_fetch_array($result)) {

        echo '<tr>
					<td>' . $row['unumber'] . '</td>
					<td>' . $row['firstname'] . '</td>
					<td>' . $row['lastname'] . '</td>
					<td>' . $row['sphone'] . '</td>
					<td>' . $row['stradress'] . '</td>
					<td>' . $row['city'] . '</td>
					<td>' . $row['state'] . '</td>
					<td>' . $row['zipcode'] . '</td>
					<td>' . $row['email'] . '</td>
				</tr>';
    }
    mysqli_close($conn);
    ?>
    </tbody>
    <tfoot>
    </tfoot>
</table>
<?php if($total_pages > 1) { ?>
    <div style="text-align: center">

        <br><br><button class="next-page" type="submit" name ="submit"><a href="adminViewStudents.php?page=<?php if ($cpage>1){ echo $cpage-1;} else echo $cpage; ?>">Previous Page</a></button>
        <button class="next-page" type="submit" name ="submit"><a href="adminViewStudents.php?page=<?php if ($cpage< $total_pages){ echo $cpage+1;} else echo $cpage; ?>">Next Page</a></button>
    </div>
<?php }
} else {
    echo "Access Denied, Insufficient Permission";
}
}?>

</body>
</html>
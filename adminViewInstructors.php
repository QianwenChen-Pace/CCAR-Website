<?php include_once 'includes/dbh.inc.php'; ?>
<?php include_once 'header.php'; ?>
<?php if (isset($_SESSION['a_id'])){ ?>
<html>
<body>
<h1>Registered Instructors</h1>
<table class="dataTables_wrapper table">
    <caption class="title"></caption>
    <thead>
    <tr>
        <th>Instructor ID</th>
        <th>Instructors First Name</th>
        <th>Instructors Last Name</th>
        <th>Instructors Email</th>
        <th>Approved</th>
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

    $sql = "SELECT `instructorid` AS total FROM `instructor`;";
    $result = mysqli_query($conn, $sql);
    $numrow = mysqli_num_rows($result);
    $total_pages = ceil($numrow / $rows);


    $test = "SELECT `instructorid`,`firstname`,`lastname`,`email`,`approved` FROM `instructor`LIMIT $start, $rows";
    $result = mysqli_query($conn, $test);

    while ($row = mysqli_fetch_array($result)) {
        $eliForms[] = $row['instructorid'];
        if (($row['approved']) == '1') {
            $approved = "Approved";
        } else {
            $approved = "Pending";
        }
        echo '<tr>
					<td>' . $row['instructorid'] . '</td>
					<td>' . $row['firstname'] . '</td>
					<td>' . $row['lastname'] . '</td>
					<td>' . $row['email'] . '</td>';
        if (($row['approved']) == 1) {
            echo '<td><span style= "color:green">Approved</span>';
        } else {
            echo '<td><span style= "color:red">Pending</span>';
        }
        echo '</tr>';

    }


    if (isset($_POST['submit'])) {
        $id = mysqli_real_escape_string($conn, $_POST['insID']);
        if (in_array($id, $eliForms)) {
            $sql = "UPDATE `instructor` SET `approved`='1' WHERE `instructorid`='$id'";
            if (mysqli_query($conn, $sql)) {
                echo "Record updated successfully, Refresh your Browser to see changes to the table";
            } else {
                echo "Error updating record: " . mysqli_error($conn);
            }
        } else {
            echo "Cannot Update other forms  ";
        }
        mysqli_close($conn);

    }?>
    </tbody>
</table>
<?php if($total_pages >1){ ?>
    <div style="text-align: center">

        <br><br><button class="next-page" type="submit" name ="submit"><a href="adminViewInstructors.php?page=<?php if ($cpage>1){ echo $cpage-1;} else echo $cpage; ?>">Previous Page</a></button>
        <button class="next-page" type="submit" name ="submit"><a href="adminViewInstructors.php?page=<?php if ($cpage< $total_pages){ echo $cpage+1;} else echo $cpage; ?>">Next Page</a></button>
    </div>

<?php  }  echo ' 
<section class="main-container">
    <div class="main-wrapper" style="text-align: center">
        <div class="form">
            <form class="student-form" method="post">
                <fieldset>
Enter the Number of the Instructor You wish to Approve<br><br> 
<input class="input" type="text" Name="insID" value=""><br><br>
                    <button type="submit" name ="submit" value="submit">Approve</button><br><br>

                </fieldset>
            </form>';
} else {
    echo "Access Denied, Insufficient Permission";

}
}
?>

<tfoot>
</tfoot>
</body>
</html>
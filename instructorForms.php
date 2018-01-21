<?php include_once 'includes/dbh.inc.php'; ?>
<?php include_once 'header.php'; ?>
<html>
<body>
<h1>Your Students Submitted Forms</h1>
<table class="dataTables_wrapper table">
    <caption class="title"></caption>
    <thead>
    <tr>
        <th>Form ID</th>
        <th>Date</th>
        <th>Hours</th>
        <th>Student Name</th>
        <th>Description</th>
        <th>Approved</th>
    </tr>
    </thead>
    <tbody>
    <?php

    if (isset($_SESSION['i_id'])) {
    $session = ($_SESSION['i_id']);
    if(!isset($_GET['page'])){
        $_GET['page']=1;
    }
    if(isset($_GET['page'])){
        $cpage = $_GET['page'];}

    $start = 0 + 25 * ($cpage - 1);
    $rows = 25;

    $sql = "SELECT `instructorid` AS total FROM `student_form`WHERE`instructorid` ='$session';";
    $result = mysqli_query($conn, $sql);
    $numrow = mysqli_num_rows($result);
    $total_pages = ceil($numrow / $rows);


    $test = "SELECT * FROM `student_form` WHERE `instructorid` ='$session'LIMIT $start, $rows";
    $isApproved = "SELECT `approved` FROM `instructor` WHERE `instructorid` ='$session'";
    $canApprove = mysqli_query($conn, $isApproved);
    $rowA = mysqli_fetch_array($canApprove);
    if (($rowA['approved']) == '1') {


    $result = mysqli_query($conn, $test);

    //$eliForms[]=0;
    while ($row = mysqli_fetch_array($result)) {
        $uid = $row['session'];
        $getName = "SELECT * FROM `student_register` WHERE `unumber`='$uid'";
        $result2 = mysqli_query($conn, $getName);
        $row2 = mysqli_fetch_array($result2);
        $name[0] = $row2['firstname'];
        $name[1] = $row2['lastname'];
        $fname = implode(' ', $name);

        $eliForms[] = $row['form_id'];


        if (($row['approved']) == '1') {
            $approved = "Approved";
        } else {
            $approved = "Pending";
        }
        echo '<tr>
					<td>' . $row['form_id'] . '</td>
					<td>' . date('F d, Y', strtotime($row['date'])) . '</td>
					<td>' . $row['thours'] . '</td>
					<td>' . $fname . '</td>
					<td>' . $row['description'] . '</td>';
        if (($row['approved']) == '1') {
            echo '<td><span style= "color:green">Approved</span>';
        } else {
            echo '<td><span style= "color:red">Pending</span>';
        }
        echo '</tr>';
    }


    if (isset($_POST['submit'])) {
        $id = mysqli_real_escape_string($conn, $_POST['formID']);
        if (in_array($id, $eliForms)) {
            $sql = "UPDATE `student_form` SET `approved`='1' WHERE `form_id`='$id'";
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
<div style="text-align: center">
 <?php if($total_pages>1){ ?>
    <br><br>
    <button class="next-page" type="submit" name="submit"><a href="instructorForms.php?page=<?php if ($cpage > 1) {
            echo $cpage - 1;
        } else echo $cpage; ?>">Previous Page</a></button>
    <button class="next-page" type="submit" name="submit"><a
                href="instructorForms.php?page=<?php if ($cpage < $total_pages) {
                    echo $cpage + 1;
                } else echo $cpage; ?>">Next Page</a></button>
</div>
<?php }?>

<?php
}else{
    echo "un-approved Instructors cannot approve or view forms please contact the admin to get verified";
}
}
//
echo ' </tbody>
</table>
<section class="main-container">
    <div class="main-wrapper" style="text-align: center">
        <div class="form">
            <form class="student-form" method="post">
                <fieldset><br>
Enter the Number of the Form You wish to Approve<br><br> 
<input class="input" type="text" Name="formID" value=""><br><br>
                    <button type="submit" name ="submit" value="submit">Approve</button><br><br>

                </fieldset>
            </form>';
?>
</body>

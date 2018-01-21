<?php include_once 'includes/dbh.inc.php'; ?>
<?php include_once 'header.php'; ?>
<?php if (isset($_SESSION['a_id'])){ ?>
<html>
<body>
<h1>Registered Courses</h1>
<table class="dataTables_wrapper table">
    <caption class="title"></caption>
    <thead>
    <tr>
        <th>Course CRN</th>
        <th>Course Title</th>
        <th>Course Number</th>
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

        $sql = "SELECT `crn` AS total FROM `course`;";
        $result = mysqli_query($conn, $sql);
        $numrow = mysqli_num_rows($result);
        $total_pages = ceil($numrow / $rows);

        $test = "SELECT `crn`,`title`,`coursenumber` FROM `course`LIMIT $start, $rows";
        $result = mysqli_query($conn, $test);

        while ($row = mysqli_fetch_array($result)) {

            echo '<tr>
					<td>' . $row['crn'] . '</td>
					<td>' . $row['title'] . '</td>
					<td>' . $row['coursenumber'] . '</td>
				</tr>';
        }
        mysqli_close($conn); }
    else {
        echo "Access Denied, Insufficient Permission";
    }
    }

    ?>
    </tbody>
</table>
<?php if($total_pages>1){?>
    <div style="text-align: center">

        <br><br><button class="next-page" type="submit" name ="submit"><a href="adminViewCourse.php?page=<?php if ($cpage>1){ echo $cpage-1;} else echo $cpage; ?>">Previous Page</a></button>
        <button class="next-page" type="submit" name ="submit"><a href="adminViewCourse.php?page=<?php if ($cpage< $total_pages){ echo $cpage+1;} else echo $cpage; ?>">Next Page</a></button><br><br>
    </div>
<?php }?>
</body>
</html>
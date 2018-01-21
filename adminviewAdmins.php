<?php include_once 'includes/dbh.inc.php'; ?>
<?php include_once 'header.php';
?>

<html>
<body>
<h1>Registered Admins</h1>
<table class="dataTables_wrapper table">
    <caption class="title"></caption>
    <thead>
    <tr>
        <th>Admin ID</th>
        <th>Admin Name</th>
    </tr>
    </thead>
    <tbody>
    <?php
    if (isset($_SESSION['a_id'])) {
        $session = ($_SESSION['a_id']);
        $test = "SELECT `admin_id`,`username` FROM `admins`";
        $result = mysqli_query($conn, $test);

        while ($row = mysqli_fetch_array($result)) {

            echo '<tr>
					<td>' . $row['admin_id'] . '</td>
					<td>' . $row['username'] . '</td>
				</tr>';
            }
        mysqli_close($conn); }

    ?>


    </tbody>
    <tfoot>
    </tfoot>
</table>
</body>
</html>
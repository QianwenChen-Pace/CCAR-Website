<?php include_once 'includes/dbh.inc.php'; ?>
<?php include_once 'header.php'; ?>
<?php if (isset($_SESSION['a_id'])){ ?>
    <html>
    <body>
    <h1>Communities</h1>

    <table class="dataTables_wrapper table">
        <caption class="title"></caption>
        <thead>
        <tr>
            <th>Community ID</th>
            <th>Community Name</th>
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

            $sql = "SELECT `communityid` AS total FROM `community`;";
            $result = mysqli_query($conn, $sql);
            $numrow = mysqli_num_rows($result);
            $total_pages = ceil($numrow / $rows);





            $test = "SELECT `communityid`,`name`,`approved` FROM `community` LIMIT $start, $rows";
            $result = mysqli_query($conn, $test);

            while ($row = mysqli_fetch_array($result)) {

                $comID[] = $row['communityid'];

                echo '<tr>';
                echo '<td>' . $row['communityid'] . '</td>';
                echo '<td>' . $row['name'] . '</td>';
                if (($row['approved']) == '1') {
                    echo '<td><span style= "color:green">Approved</span>';
                } else {
                    echo '<td><span style= "color:red">Pending</span>';
                }
                echo '</tr>';
            }
        } else {
            echo "Access Denied, Insufficient Permission";

        }

        if (isset($_POST['submit'])) {
            $id = mysqli_real_escape_string($conn, $_POST['communityID']);
            if (in_array($id, $comID)) {
                $sql = "UPDATE `community` SET `approved`='1' WHERE `communityid`='$id'";
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
    <?php if($total_pages>1){ ?>
        <div style="text-align: center">

            <br><br><button class="next-page" type="submit" name ="submit"><a href="adminViewCommunity.php?page=<?php if ($cpage>1){ echo $cpage-1;} else echo $cpage; ?>">Previous Page</a></button>
            <button class="next-page" type="submit" name ="submit"><a href="adminViewCommunity.php?page=<?php if ($cpage< $total_pages){ echo $cpage+1;} else echo $cpage; ?>">Next Page</a></button>
    <?php } echo ' 

<section class="main-container">
    <div class="main-wrapper">
        <div class="form">
            <form class="student-form" method="post">
        <br>        <fieldset>
Enter the ID of the community to Approve<br><br>
<input class="input" type="text" Name="communityID" value=""><br><br>
                    <button type="submit" name ="submit" value="submit">Approve</button><br><br>

                </fieldset>
            </form>';
    ?>

        </div>

    <tfoot>
    </tfoot>



    </body>
    </html>
<?php }
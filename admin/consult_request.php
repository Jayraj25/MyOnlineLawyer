<?php
$title = "Dashboard";
?>
<?php include "admin_header.php" ?>
<?php include "admin_dbcon.php" ?>


<div class="container-fluid">

<h1 class="h3 mb-0 text-gray-800">Client Consult Request</h1>

<?php
$adv_id = $_SESSION['user_info']['id'];
$query = "SELECT distinct u.name as name, u.mobileNo as nos ,u.email as email  FROM  consult_adv as cd,users as u where cd.user_id = u.id  and cd.adv_id=".$adv_id;
$result = mysqli_query($connection, $query);
    if (!$result) {
        die("QUERY FAILED " . mysqli_error($connection));
    }
?>
<hr>
<table class="table table-striped ">
    <thead class="thead-inverse">
        <tr>
            <th>Client Name</th>
            <th>Mobile No.</th>
            <th>Email</th>
        </tr>
        </thead>
        <tbody>
            <?php
            while($row = mysqli_fetch_assoc($result)){
                ?>
            <tr>
                <td scope="row"><?php $row['name']?></td>
                <td><?php $row['nos']?></td>
                <td><?php $row['email']?></td>
            </tr>
            <?php
            }
            ?>
        </tbody>
</table>

</div>
<?php include "admin_footer.php" ?>
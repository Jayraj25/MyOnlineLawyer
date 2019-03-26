<?php include "admin_dbcon.php" ?>

<?php 

session_start();
$user_id = $_SESSION['user_info']['id'];
$query  = "UPDATE login_details set last_activity=now() where user_id='$user_id' ";
$result = mysqli_query($connection, $query);
    if (!$result) {
        die("QUERY FAILED " . mysqli_error($connection));
    }

?>

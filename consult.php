<?php include "dbcon.php" ?>

<?php 
session_start();
$adv_id = $_GET['adv_id'];
$user_id = $_SESSION['user_info']['id'];
$query = "INSERT INTO consult_adv(user_id,adv_id) VALUES('$user_id','$adv_id')";
$result = mysqli_query($connection, $query);
    if (!$result) {
        die("QUERY FAILED " . mysqli_error($connection));
    }
echo "c".$adv_id;

?>
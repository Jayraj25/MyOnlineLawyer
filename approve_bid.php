<?php include "dbcon.php" ?>

<?php

if(isset($_GET['user_id'])){
    $user_id  = $_GET['user_id'];
    $bid_id = $_GET['bid_id'];
    $query = "UPDATE bid_made set status='1' where user_id='$user_id' and bid_id='$bid_id' ";
    $result = mysqli_query($connection, $query);
    if (!$result) {
        die("QUERY FAILED " . mysqli_error($connection));
    }
    $query = "UPDATE biding set status='1' where bid_id='$bid_id'";
    if (!$result) {
        die("QUERY FAILED " . mysqli_error($connection));
    }
    echo "1";
}
?>
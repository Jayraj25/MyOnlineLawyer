<?php
include "dbcon.php";
if (isset($_POST['q_id'])) {
    $q_id = $_POST['q_id'];
    $query = "UPDATE ola SET likes = likes + 1 WHERE q_id='$q_id'";
    $result = mysqli_query($connection, $query);
    if (!$result) {
        die("QUERY FAILED " . mysqli_error($connection));
    }
    $query = "SELECT * FROM ola WHERE q_id='$q_id'";
    $result = mysqli_query($connection, $query);
    if (!$result) {
        die("QUERY FAILED " . mysqli_error($connection));
    }
    $row = mysqli_fetch_assoc($result);
    echo $row['likes'];
} else {
    echo "no";
}


?>
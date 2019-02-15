<?php
include "dbcon.php";
if (isset($_POST['a_id'])) {
    $id = $_POST['a_id'];
    $query = "UPDATE ola_answer SET likes = likes + 1 WHERE a_id='$id'";
    $result = mysqli_query($connection, $query);
    if (!$result) {
        die("QUERY FAILED " . mysqli_error($connection));
    }
    $query = "SELECT * FROM ola_answer WHERE a_id='$id'";
    $result = mysqli_query($connection, $query);
    if (!$result) {
        die("QUERY FAILED " . mysqli_error($connection));
    }
    $row = mysqli_fetch_assoc($result);
    echo $row['likes'];
}


?>
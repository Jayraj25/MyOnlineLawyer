<?php
include "dbcon.php";
if (isset($_POST['q_id'])) {
    $q_id = $_POST['q_id'];
    $user_id = $_POST['user_id'];
    $check = "SELECT * FROM ques_like_details where user_id='$user_id' and q_id='$q_id' ";
    $result_check = mysqli_query($connection, $check);
    if (!$result_check) {
        die("QUERY FAILED " . mysqli_error($connection));
    }
    $result_check = mysqli_num_rows($result_check);
    if ($result_check > 0) {
        $result_check = false;
    } else {
        $result_check = true;
    }
    if ($result_check) {
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
        $query = "INSERT INTO ques_like_details (q_id,user_id) VALUES ('$q_id','$user_id')";
        $result = mysqli_query($connection, $query);
        if (!$result) {
            die("QUERY FAILED " . mysqli_error($connection));
        }
        echo $row['likes'];
    } else {
        echo "0";
    }
} else {
    echo "no";
}


?>
<?php
include "admin_dbcon.php";
if (isset($_POST['a_id'])) {
    $id = $_POST['a_id'];
    $user_id = $_POST['user_id'];
    $check = "SELECT * FROM ans_like_details where user_id='$user_id' and a_id='$id' ";
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
        $query = "INSERT INTO ans_like_details (a_id,user_id) VALUES ('$id','$user_id')";
        $result = mysqli_query($connection, $query);
        if (!$result) {
            die("QUERY FAILED " . mysqli_error($connection));
        }
        echo $row['likes'];
    } else {
        echo "";
    }
}


?>
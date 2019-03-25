<?php 

$connection = mysqli_connect('localhost', 'root', '', 'MyOnlineLawyer');
if (!$connection) {
    die("Database connection failed: " . mysqli_error($connection));
}

?>
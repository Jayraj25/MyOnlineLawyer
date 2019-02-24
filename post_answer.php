<?php include "dbcon.php" ?>

<?php 

if (isset($_POST["submit"])) {
    $q_id = $_POST['q_id'];
    $user_id = $_POST['user_id'];
    $answer = $_POST['answer'];
    $query = "INSERT INTO ola_answer (q_id,user_id,answer) VALUES ('$q_id','$user_id','$answer') ";
    $result = mysqli_query($connection, $query);
    if (!$result) {
        die("QUERY FAILED " . mysqli_error($connection));
    }
    echo "<script>window.open('ola.php','_self');</script>";
}
?>
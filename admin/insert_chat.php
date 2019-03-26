<?php include "admin_dbcon.php" ?>
<?php 

session_start();

$to_id = $_POST['adv_id'];
$from_id = $_SESSION['user_info']['id'];
$msg = $_POST['msg'];
$query = "INSERT INTO chat_message(to_user_id,from_user_id,chat_message,timestamp) VALUES ('$to_id','$from_id','$msg',now()) ";
$result = mysqli_query($connection, $query);
    if (!$result) {
        die("QUERY FAILED " . mysqli_error($connection));
    }
echo fetch_user_chat_history($from_id,$to_id,$connection);

?>
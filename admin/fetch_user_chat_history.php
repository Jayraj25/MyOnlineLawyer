
<?php include "admin_dbcon.php";

session_start();

echo fetch_user_chat_history($_SESSION['user_info']['id'], $_POST['to_user_id'], $connection);

?>
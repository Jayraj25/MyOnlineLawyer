<?php 

$connection = mysqli_connect('localhost', 'root', '', 'MyOnlineLawyer');
if (!$connection) {
    die("Database connection failed: " . mysqli_error($connection));
}

date_default_timezone_set('Asia/Kolkata');

function fetch_user_last_activity($user_id,$connection)
{
 $query = "
 SELECT * FROM login_details 
 WHERE user_id = '$user_id' 
 ORDER BY last_activity DESC 
 LIMIT 1
 ";
 $result = mysqli_query($connection, $query);
    if (!$result) {
        die("QUERY FAILED " . mysqli_error($connection));
    }
    while($row = mysqli_fetch_assoc($result)){
        return $row['last_activity'];
    }
}




function fetch_user_chat_history($from_id,$to_id,$connection){

    $query = "
    SELECT * FROM chat_message 
    WHERE (from_user_id = '".$from_id."' 
    AND to_user_id = '".$to_id."') 
    OR (from_user_id = '".$to_id."' 
    AND to_user_id = '".$from_id."') 
    ORDER BY timestamp
    ";
    $result = mysqli_query($connection, $query);
    if (!$result) {
        die("QUERY FAILED " . mysqli_error($connection));
    }
    $output = "";
    while($row =mysqli_fetch_assoc($result)){
        if($row['from_user_id']===$from_id){
            $output .=  '<div class="chat self">
                        <div class="user-photo"><img src="user.png" style="border-radius: 50%"></div>
                        <p class="chat-message">'.$row['chat_message'] .'</p>
                        </div>';
        }
        else{
            $output .=  '<div class="chat friend">
                        <div class="user-photo"><img src="adv.png" style="border-radius: 50%"></div>
                        <p class="chat-message">'.$row['chat_message'] .'</p>
                            </div>';
        }
    }
    return $output;
}

?>


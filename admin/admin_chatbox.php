<?php
$title = "Chat APP";
?>
<?php include "admin_header.php" ?>
<?php include "admin_dbcon.php" ?>

<style>
* {
    margin: 0;
    padding: 0;
    font-family: tahoma, sans-serif;
    box-sizing: border-box;
}

body {
    background: #1ddced
}

.chatbox {
    width: 500px;
    min-width: 390px;
    height: 600px;
    background: #fff;
    padding: 25px;
    margin: 20px auto;
    box-shadow: 0 3px #ccc;
}

.chatlogs {
    padding: 10px;
    width: 100%;
    height: 450px;
    overflow-x: hidden;
    overflow-y: scroll;
}

.chatlogs::-webkit-scrollbar {
    width: 10px;
}

.chatlogs::-webkit-scrollbar-thumb {
    border-radius: 5px;
    background: rgba(0, 0, 0, .1);
}


.chat {
    display: flex;
    flex-flow: row wrap;
    align-items: flex-start;
    margin-bottom: 10px;
}

.chat .user-photo {
    width: 60px;
    height: 60px;
    background: #ccc;
    border-radius: 50%;
}

.chat .user-photo img {
    width: 100%;
}


.chat .chat-message {
    width: 80%;
    padding: 15px;
    margin: 5px 10px 0;
    background: #1ddced;
    border-radius: 10px;
    color: black;
    font-size: 18px;

}

.friend .chat-message {
    background: #1adda4;
}

.self .chat-message {
    background: #1ddced;
    order: -1;
}

.chat-form {
    margin-top: 20px;
    display: flex;
    align-items: flex-start;
}

.chat-form input {
    background: #fbfbfb;
    width: 75%;
    height: 50px;
    border: 4px solid #eee;
    border-radius: 3px;
    resize: none;
    padding: 10px;
    font-size: 18px;
}

.chat-form input:focus {
    background: #fff;
}

.chat-form button {
    background: #1ddced;
    padding: 5px 15px;
    font-size: 20px;
    color: #fff;
    border: none;
    margin: 0;
    border-radius: 3px;
    cursor: pointer;
    height: 51px;
}

.chat-form button :hover {
    background-color: #1adda4;
}

</style>

<?php 

$adv_id='';
$row="";

if(isset($_GET['adv_id'])){
    $adv_id = $_GET['adv_id'];
    $query = "SELECT * from users where id=$adv_id";
    $result = mysqli_query($connection, $query);
    if (!$result) {
        die("QUERY FAILED " . mysqli_error($connection));
    }
    $row = mysqli_fetch_assoc($result);
}
else{
    header("location:/project/admin/online_chat.php");
}

?>


<div class="container-fluid">
<h4> You are currently chating with > <?php echo $row['name']; ?></h4>
    <div class="chatbox">
        <div class="chatlogs" id="chatlogs">
            
            
        </div>
        <div class="chat-form">
            <input id="message"></input>
            <button onclick="send_message()">Send</button>
        </div>
    </div>


</div>
<script>
    function send_message(){
        var msg=document.getElementById('message').value;
        var id = "<?php echo $adv_id?>";
        $.ajax({
        url:"insert_chat.php",
        method:"POST",
        data:{
            'msg':msg,
            'adv_id':id,
        },
        success:function(data){
         if(data){
            document.getElementById('message').value="";
            document.getElementById('chatlogs').innerHTML = data;
         }
        }
        })

    }
    </script>

<script>
     function fetch_user_chat_history(to_user_id)
    {
    $.ajax({
    url:"fetch_user_chat_history.php",
    method:"POST",
    data:{to_user_id:to_user_id},
    success:function(data){
    $('#chatlogs').html(data);
    }
    })
    }

</script>

<script>
        setInterval(function(){
       update_chat_history_data();
       }, 3500);
   
     function update_chat_history_data()
    {
     $('#chatlogs').each(function(){
      var to_user_id = "<?php echo $adv_id?>";
      fetch_user_chat_history(to_user_id);
     });
    }
   </script>
<?php include "admin_footer.php" ?>
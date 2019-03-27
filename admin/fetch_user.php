<?php include "admin_dbcon.php" ?>

<?php
session_start();
$query ="SELECT distinct users.id as id ,users.name as name from bid_made,biding,users WHERE bid_made.bid_id = biding.id and biding.user_id = users.id and bid_made.user_id= '".$_SESSION['user_info']['id']."'";


$result = mysqli_query($connection, $query);
    if (!$result) {
        die("QUERY FAILED " . mysqli_error($connection));
    }

?> 


<table class="table table-striped">
    <thead>
        <tr>
            <th>User Name</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
            <?php 
            while($row = mysqli_fetch_assoc($result)){
                $status = '';
                $current_timestamp = strtotime(date("Y-m-d H:i:s") . '- 10 second');
                $current_timestamp = date('Y-m-d H:i:s', $current_timestamp);
                $user_last_activity = fetch_user_last_activity($row['id'],$connection);
                if($user_last_activity > $current_timestamp)
                {
                $status = '<span class="btn btn-success">Online</span>';
                }
                else
                {
                $status = '<span class="btn btn-danger">Offline</span>';
                }
            ?>
            <tr>
                <td scope="row"><?php  echo $row['name'];?></td>
                <td><?php echo $status?></td>
                <td><a href="admin_chatbox.php?adv_id=<?php echo $row['id'] ?>" class="btn btn-info btn-sm">Start Chat</button></td>
                
            </tr>
            <?php
            }
            ?>
        </tbody>
</table>
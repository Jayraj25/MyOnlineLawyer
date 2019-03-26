<?php include "admin_dbcon.php" ?>

<?php 

if(isset($_POST['submit'])){
    $user_id= mysqli_real_escape_string($connection, $_POST['user_id']);
    $bid_id = mysqli_real_escape_string($connection, $_POST['bid_id']);
    $price = mysqli_real_escape_string($connection, $_POST['price']);
    //Check if already bid is made or not
    $query = "SELECT * from bid_made where bid_id=$bid_id and user_id=$user_id ";
    $result = mysqli_query($connection, $query);
    if (!$result) {
        die("QUERY FAILED " . mysqli_error($connection));
    }
    $total = mysqli_fetch_assoc($result);
    $len = count($total);
    if($len === 0){
    $query = "INSERT INTO bid_made(bid_id,user_id,price) VALUES ('$bid_id','$user_id','$price') ";
    $result = mysqli_query($connection, $query);
    if (!$result) {
        die("QUERY FAILED " . mysqli_error($connection));
    }
    }
    else{
        if($total['status'] === '0'){
        $query = "UPDATE bid_made set price='$price' where bid_id='$bid_id' and user_id='$user_id' ";
        $result = mysqli_query($connection, $query);
        if (!$result) {
        die("QUERY FAILED " . mysqli_error($connection));
        }
        }
    }
    header("location:/project/admin/admin_bidings.php");
}

?>
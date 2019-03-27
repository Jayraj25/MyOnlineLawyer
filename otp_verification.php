<?php
$title = "Verify OTP";
?>
<?php include "header.php" ?>
<?php include "dbcon.php" ?>

<?php 
if (isset($_POST['submit'])) {
    $query = $_SESSION['insertion_query'];
    $otp = $_SESSION['otp'];
    $user_name = $_SESSION['user_name'];
    echo $otp;
    if ($otp == $_POST['enterOTP']) {
        //Now create user
        $result1 = mysqli_query($connection, $query);

        if (!$result1) {
            die('QUERY FAILED' . mysqli_error($connection));
        } else {
            //Setting up the session for the user
            $query = "select * from users where username='$user_name'";
            $result = mysqli_query($connection, $query);
            if (!$result) {
                die("QUERY FAILED " . mysqli_error($connection));
            }
            $row = mysqli_fetch_assoc($result);
            $_SESSION['insertion_query'] = '';
            $_SESSION['otp'] = '';
            $_SESSION['is_logged_in'] = true;
            $_SESSION['user_type'] = $row['type'];
            $_SESSION['user_info'] = $row;
            $user_id = $row['id'];
            $sub_query = "INSERT INTO login_details(user_id) VALUES('$user_id')";
            $result = mysqli_query($connection, $sub_query);
            if (!$result) {
            die("QUERY FAILED " . mysqli_error($connection));
            }
            echo "<script>window.open('index.php','_self')</script>";
        }
    } else {
        $error = "Please provide valid OTP";
        echo $error;
    }

}

?>

<?php
    //Using Sessions
if (!$_SESSION['is_logged_in']) {
    ?>
<!--OTP verification Form-->
<div class="container">
    <br>
    <center>
        <div class="jumbotron" style="width: 50%">
            <h3 style="text-align: center">OTP Verification</h3>
            <hr>
            <form method="POST" action="otp_verification.php">
                <div class="alert alert-success">
                    <?php echo "OTP is sent to your mobile no. <br><strong>Please Enter the OTP</strong>"; ?>
                </div>
                <br>
                <lable class="form-group" for="enterOTP">OTP:</lable>
                <br>
                <br>
                <input type="text" class="form-control" name="enterOTP" required> 
                <br>
                <button class="form-control btn btn-success" name="submit">Submit</button>
            </form>
        </div>

    </center>
</div>
<?php

} else {
    echo "<script>window.open('index.php','_self')</script>";
}
?>


<?php include "footer.php" ?>
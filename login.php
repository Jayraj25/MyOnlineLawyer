<?php
$title = "Login";
?>
<?php include "header.php" ?>
<?php include "dbcon.php" ?>
<?php 
    //Logging the user
if (isset($_POST['submit'])) {
    $username = mysqli_real_escape_string($connection, $_POST['username']);
    $password = mysqli_real_escape_string($connection, $_POST['password']);
    //Password Incryption will be added
    $hashFormat = "$2y$10$";
    $salt = "thisisshashwatsanket12"; //length should be 22
    $create_crypt = $hashFormat . $salt;
    $encript_pwd = crypt($password, $create_crypt);
    //end Encryption

    $query = "select * from users where username='$username'";
    $result = mysqli_query($connection, $query);
    if (!$result) {
        die("QUERY FAILED " . mysqli_error($connection));
    }
    if (mysqli_num_rows($result) <= 0) {
        $username_error = "Username does not exists";
        echo $username_error;
    } else {
        $row = mysqli_fetch_assoc($result);
        if ($row['password'] != $encript_pwd) {
            $pwd_error = "Invalid Password";
            echo $pwd_error;
        } else {
            echo "You are Successfully logged in";
            //Saving the information in the sessions
            $_SESSION['is_logged_in'] = true;
            $_SESSION['user_info'] = $row;
            $_SESSION['user_type'] = $row['type'];
            //Redirecting to the home page
            echo '<script>window.open("blank.php","_self")</script>';
            //Now we can use these information in furthur pages 
        }
    }
}


?>
<div class="container">
    <div class="jumbotron">
        <form method="POST" action="login.php">
            <label class="form-group" for="username">Username:</label>
            <input class="form-control" type="text" name="username">
            <label class="form-group" for="username">Password:</label>
            <input class="form-control" type="password" name="password">
            <br>
            <button class="btn btn-info" type="submit" name="submit">Submit</button>

        </form>
    </div>
</div>

<?php include "footer.php" ?>
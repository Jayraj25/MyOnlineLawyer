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
            if($row['type']!=="Client"){
            echo '<script>window.open("admin/index.php","_self")</script>';
            }else{
            echo '<script>window.open("index.php","_self")</script>';   
            }
            //Now we can use these information in furthur pages 
        }
    }
}


?>
<style>

    body {
        background-image: url('static/giammarco-boscaro-380907-unsplash.jpg');
        background-size: cover;
    }
   
    .card-login {
        margin-top: 130px;
        padding: 18px;
        max-width: 30rem;
    }

    .card-header {
        color: #fff;
        /*background: #ff0000;*/
        font-family: sans-serif;
        font-size: 20px;
        font-weight: 600 !important;
        margin-top: 10px;
        border-bottom: 0;
    }
    .input-group-prepend span{
        width: 50px;
        background-color:#495057;
        color: #fff;
        border:0 !important;
        border-radius: 50%;
    }

    input:focus{
        outline: 0 0 0 0  !important;
        box-shadow: 0 0 0 0 !important;
    }

    .login_btn{
        width: 130px;
    }

    .login_btn:hover{
        color: #fff;
        background-color: #126d27;
    }

    .btn-outline-danger {
        color: #fff;
        font-size: 18px;
        background-color: #28a745;
        background-image: none;
        border-color: #28a745;
    }

    .form-control {
        display: block;
        width: 100%;
        height: calc(2.25rem + 2px);
        padding: 0.375rem 0.75rem;
        font-size: 1.2rem;
        line-height: 1.6;
        color: #28a745;
        background-color: transparent;
        background-clip: padding-box;
        border: 1px solid #28a745;
        border-radius: 0;
        transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
    }

    .input-group-text {
        display: -ms-flexbox;
        display: flex;
        -ms-flex-align: center;
        align-items: center;
        padding: 0.375rem 0.75rem;
        margin-bottom: 0;
        font-size: 1.5rem;
        font-weight: 700;
        line-height: 1.6;
        color: #495057; 
        text-align: center;
        white-space: nowrap;
        background-color: #e9ecef;
        border: 1px solid #ced4da;
        border-radius: 0;
    }

</style>

<div class="container">
    <p>My online Lawyer</p>
<div class="container">
    <div class="card card-login mx-auto text-center" style="background-color: #ededed;border-radius:10px;">
        <div class="card-header mx-auto bg-dark" style="border-radius:20px;">Login</div>
        <div class="card-body">
            <form action="login.php" method="POST">
                <div class="input-group form-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                    </div>
                    <input type="text" name="username" class="form-control" placeholder="Username">
                </div>

                <div class="input-group form-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-key"></i></span>
                    </div>
                    <input type="password" name="password" class="form-control" placeholder="Password">
                </div>

                <div class="form-group">
                    <input type="submit" name="submit" value="Login" class="btn btn-success float-right login_btn">
                    <a href="signup.php" class="btn btn-success float-left login_btn">Sign Up</a>
                </div>

            </form>
        </div>
    </div>
</div>

<?php include "footer.php" ?>
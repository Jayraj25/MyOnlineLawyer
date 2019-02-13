<?php
$title = "blank page";
?>
<?php include "header.php" ?>
<?php include "dbcon.php" ?>
<?php //include "signup.php" ?>

<?php
    //Using Sessions
if (!$_SESSION['is_logged_in']) {
    /*echo "User is logged in";
    print_r($_SESSION['user_info']);*/

    if(isset($_POST['submit']))
    {
        $name = $_POST['name'];
        $user_name = $_POST['user_name'];
        $pass = $_POST['pass'];
        $email = $_POST['email'];
        $mobnum = $_POST['mobnum'];
        $type = $_POST['type'];

        $hashFormat = "$2y$10$";
        $salt = "thisisshashwatsanket12"; //length should be 22
        $create_crypt = $hashFormat . $salt;
        $encript_pwd1 = crypt($pass, $create_crypt);

        $query = "INSERT INTO users(name,username,password,email,mobile_no,type) ";
        $query .= "VALUES ('$name','$user_name','$encript_pwd1','$email','$mobnum','$type')";

        $result1 = mysqli_query($connection,$query);

        if(!$result1)
        {
            die('QUERY FAILED' . mysqli_error($connection));
        }
    }

}
 else {
    echo "User is already logged in";
}

?>




<div class="container">
    hello
    
</div>

<?php include "footer.php" ?>
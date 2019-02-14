<?php
$title = "blank page";
?>
<?php include "header.php" ?>
<?php include "dbcon.php" ?>

<?php
    //Using Sessions
if (!$_SESSION['is_logged_in']) {

    if (isset($_POST['submit'])) {
        $name = $_POST['name'];
        $user_name = $_POST['user_name'];
        $pass = $_POST['pass'];
        $email = $_POST['email'];
        $mobnum = $_POST['mobnum'];
        $type = $_POST['type'];
        //Check wheter it is admin or not

        $hashFormat = "$2y$10$";
        $salt = "thisisshashwatsanket12"; //length should be 22
        $create_crypt = $hashFormat . $salt;
        $encript_pwd1 = crypt($pass, $create_crypt);

        $query = "INSERT INTO users(name,username,password,email,mobileNo,type) ";
        $query .= "VALUES ('$name','$user_name','$encript_pwd1','$email','$mobnum','$type')";

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
            $_SESSION['is_logged_in'] = true;
            $_SESSION['user_type'] = $type;
            $_SESSION['user_info'] = $row;
            echo "<script>window.open('blank.php','_self')</script>";
        }
    }

} else {
    echo '<script>window.open("blank.php","_self")</script>';
}

?>

<?php include "footer.php" ?>
<?php
$title = "Sign Up";
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
		//$id=$_SESSION['user_info']['id'];
		//echo "$id";
        //$query1 = "INSERT INTO `adv_profile` (`id`,`name`,`email`,`cemail`,`mob`) VALUES ('$id','$name','$email','$cemail','$mobnum')";
        $errors =false;
       //Username check 
        $query_check = "select * from users where username='$user_name'";
        $result = mysqli_query($connection, $query_check);
        if (!$result) {
            die("QUERY FAILED " . mysqli_error($connection));
        }
        if (mysqli_num_rows($result) > 0) {
            $username_error = "Username alredy exist";
            $errors = true;
        }
        //Mobile No check 
        $query_check = "select * from users where mobileNo='$mobnum'";
        $result = mysqli_query($connection, $query_check);
        if (!$result) {
            die("QUERY FAILED " . mysqli_error($connection));
        }

        if (mysqli_num_rows($result) > 0) {
            $mobileNo_error = "Mobile Number alredy exist";
            echo $mobileNo_error;
            $errors = true;
        }
        //Email check 
        $query_check = "select * from users where email='$email'";
        $result = mysqli_query($connection, $query_check);
        if (!$result) {
            die("QUERY FAILED " . mysqli_error($connection));
        }
        if (mysqli_num_rows($result) > 0) {
            $email_error = "Email alredy exist";
            echo $email_error;
            $errors = true;
        }
        if (!$errors) {
            $_SESSION['insertion_query'] = $query;
            $_SESSION['mobileNo'] = $mobnum;
            $_SESSION['user_name'] = $user_name;
            $otp = rand(500000, 999999);
            $message = urlencode("User Verification OTP for MyOnlineLawyer is " . $otp);
            $url = "http://sambsms.com/app/smsapi/index.php?key=558CA4B80010C7&campaign=0&routeid=26&type=text&contacts=$mobnum&senderid=COMEXc&msg=$message";
            //$response = file_get_contents($url);
            $_SESSION['otp'] = $otp;
            echo '<script>window.open("otp_verification.php","_self")</script>';

        }

    }



} 
else {

    echo '<script>window.open("blank.php","_self")</script>';

}



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Register</title>

    <!-- Main CSS-->
    <link href="css/main.css" rel="stylesheet" media="all">
</head>

<body>
<form name="reg_form" action="signup.php" onsubmit="return validation()" method="POST">
    <div class="page-wrapper bg-gra-01 p-t-180 p-b-100 font-poppins">
        <div class="wrapper wrapper--w780">
            <div class="card card-3">
                <div class="card-heading"></div>
                <div class="card-body">
                    <h2 class="title">Registration Info</h2>
                    <form method="POST">
                        <div class="input-group">
                            <input class="input--style-3" id="my_name" type="text" placeholder="Name" name="name">
                        </div>
                        <div class="input-group">
                            <input class="input--style-3" id="u_name" type="text" placeholder="Username" name="user_name">
                        </div>
                        <div class="input-group">
                                <input class="input--style-3" id="my_pass" type="text" placeholder="Password" name="pass">
                        </div>
                        <div class="input-group">
                                <input class="input--style-3" id="conf_my_pass" type="text" placeholder="Confirm Password" name="conf_pass">
                        </div>
                        <div class="input-group">
                                <input class="input--style-3" type="" id="my_mobnum" placeholder="Mobile No" name="mobnum">
                        </div>
                        <div class="input-group">
                                <input class="input--style-3" type="email" id="my_email" placeholder="Email" name="email">
                        </div>
                        <div class="input-group">
                            
                                <select name="type" class="form-control">
                                    <option>Client</option>
                                    <option>Advocate</option>
                                </select>                              
                            </div>
                        
                        <div class="p-t-10">
                            <button class="btn btn--pill btn--green" name='submit' type="submit">Submit</button>
                            <button class="btn btn--pill btn--green" type="reset" style="align-left">Reset</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</form>
<script>
function validation()                                    
    { 
    var name = document.forms["reg_form"]["my_name"];               
    var email = document.forms["reg_form"]["my_email"];    
    var phone = document.forms["reg_form"]["my_mobnum"];  
    var cpassword =  document.forms["reg_form"]["conf_my_pass"];  
    var password = document.forms["reg_form"]["my_pass"];  
    var uname = document.forms["reg_form"]["u_name"];  
    var type = document.forms["reg_form"]["name"]
    if (name.value == "")                                  
    { 
        window.alert("Please enter your name.");
        return false; 
    } 
    
    if((name.value.length <= 2) || (name.value.length > 20)) {
		alert("Name lenght must be between 2 and 20"); 
        name.focus(); 
        return false;		
		}
	if(!isNaN(name.value)){
		alert("Only characters are allowed"); 
        name.focus(); 
        return false;
			}
	var format = /[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]/;
    if( format.test(name.value)==true)
    {
    	alert("No special characters")
         return false;
    }
    
    if (uname.value == "")                               
    { 
        window.alert("Enter username"); 
        uname.focus(); 
        return false; 
    }
    if((uname.value.length <= 2) || (uname.value.length > 20)) {
		alert("Username length must be between 2 and 20"); 
        uname.focus(); 
        return false;		
		}
	if (password.value == "")                        
    { 
        window.alert("Please enter your password"); 
        password.focus(); 
        return false; 
    }
    var pass=/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9]).{6,}$/;
    if(pass.test(password.value)==false)
    {
    	window.alert("Password should include an uppercase,a lowercase and a number "); 
        password.focus(); 
        return false;
    } 
    if (cpassword.value == "")                        
    { 
        window.alert("Please enter your password again to verify"); 
        cpassword.focus(); 
        return false; 
    }
    if(password.value!=cpassword.value){
    	window.alert("Confirm password wrong"); 
        cpassword.focus(); 
        return false;
			} 
       
    if (email.value == "")                                   
    { 
        window.alert("Please enter a valid e-mail address."); 
        email.focus(); 
        return false; 
    } 
   
    var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;

            if (reg.test(email.value) == false) 
            {
            	window.alert("Please enter a valid e-mail address."); 
            return false;
            } 
   
    if (phone.value == "")                           
    { 
        window.alert("Please enter your telephone number."); 
        phone.focus(); 
        return false; 
    }
    var pas=/^[0]?[789]\d{9}$/;
    if(pas.test(phone.value)==false)
    {
    	window.alert(" phone number wrong"); 
        password.focus(); 
        return false;
    } 
    if(document.reg_form.type.selectedIndex==0)
    {
          alert("Please enter your type(advocate or client)"); 
        type.focus(); 
        return false;
    } 
   
    return true;
}
</script>

<?php include "footer.php" ?>
</body>

</html>
<!-- end document-->
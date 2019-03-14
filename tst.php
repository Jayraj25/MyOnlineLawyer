<?php
$title = "Login";
?>
<?php include "header.php" ?>
<?php include "dbcon.php" ?>
<script>
function image(img) {
    var src = img.src;
    window.open(src);
}
function abc()
{
	var x=document.getElementById("image").value;
	c = x.substring(12)
	document.getElementById("img1").src=c;
}
</script>
<?php
    //Using Sessions
if (!$_SESSION['is_logged_in']) {
    echo '<script>window.open("login.php","_self")</script>';
}
?>

<?php	
    if (isset($_POST['submit'])) {
	
		$name = $_POST['aname'];
        $gender= $_POST['gender'];
        $email= $_POST['email'];
        $cemail = $_POST['cemail'];
        $mobnum = $_POST['mnum'];
        $addr= $_POST['addr'];
		$wsite= $_POST['website'];
        $pcity= $_POST['pcity'];
        $area= $_POST['area'];
        $pin = $_POST['pin'];
        $edu= $_POST['edetails'];
        $exp= $_POST['exp'];
		$spec= $_POST['spec'];
        $pcourts= $_POST['pcourts'];
        $lang= $_POST['lang'];
        $bcno= $_POST['cnum'];
		$id=$_SESSION['user_info']['id'];
        //$query = "INSERT INTO `adv_profile` (`id`,`name`,`gender`,`email`,`cemail`,`mob`,`addr`,`website`,`pcity`,`area`,`pin`,`edudetails`,`exp`,`spec`,`pcourts`,`lang`,`bcno`) VALUES ('$id','$name','$gender','$email','$cemail','$mobnum','$addr','$wsite','$pcity','$area','$pin','$edu','$exp','$spec','$pcourts','$lang','$bcno')";
		$query="UPDATE `adv_profile` SET `name`='".$name."',`gender`='".$gender."',`email`='".$email."',`cemail`='".$cemail."',`mob`=$mobnum,`addr`='".$addr."',`website`='".$wsite."',`pcity`='".$pcity."',`area`='".$area."',`pin`=$pin,`edudetails`='".$edu."',`exp`=$exp,`spec`='".$spec."',`pcourts`='".$pcourts."',`lang`='".$lang."',`bcno`=$bcno WHERE `id`=$id";
		
		if (mysqli_query($connection,$query))
		{
			echo "<script type='text/javascript'> alert('Your Profile has been Updated')</script>";
		
		}
		else
		{
			echo "<script type='text/javascript'> alert('Sorry ! Your Profile could not be updated')</script>";
							
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

	img {
  display: block;
  margin-left: auto;
  margin-right: auto;
  width: 40%;
}

</style>

<div class="parent-container">
    <p>My online Lawyer</p>
<div class="container">
    <div class="card card-login mx-auto text-center " style="background-color: #ededed;border-radius:10px;float:left;width: 75%;">
        <div class="card-header mx-auto bg-dark" style="border-radius:20px;">My Profile</div>
        <div class="card-body">
            <form action="tst.php" method="POST">
                <div class="input-group form-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                    </div>
                    <input type="text" name="aname" class="form-control" value="<?php echo $_SESSION['user_info']['name']?>">
                </div>

                <div class="input-group form-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-mars-stroke	"></i></span>
                    </div>
                    <input type="radio" name="gender" value="male" class="form-control" placeholder="Male"><strong>Male</strong>
                    <input type="radio" name="gender" value="female" class="form-control" placeholder="Female"><strong>Female</strong>
                    <input type="radio" name="gender" value="other" class="form-control" placeholder="Other"><strong>Other</strong>
                </div>
				<div class="input-group form-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                    </div>
                    <input type="text" name="email" class="form-control" value="<?php echo $_SESSION['user_info']['email']?>">
                </div>

                <div class="input-group form-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                    </div>
                    <input type="text" name="cemail" class="form-control" value="<?php echo $_SESSION['user_info']['email']?>">
                </div>
				<div class="input-group form-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-mobile"></i></span>
                    </div>
                    <input type="text" name="mnum" class="form-control" value="<?php echo $_SESSION['user_info']['mobileNo'] ?>">
                </div>

                <div class="input-group form-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
                    </div>
                    <input type="text" name="addr" class="form-control" placeholder="Address">
                </div>
				<div class="input-group form-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fab fa-internet-explorer"></i></span>
                    </div>
                    <input type="text" name="website" class="form-control" placeholder="Website">
                </div>

                <div class="input-group form-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-city"></i></span>
                    </div>
                    <input type="text" name="pcity" class="form-control" placeholder="Practicing City">
                </div>
				<div class="input-group form-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-archway"></i></span>
                    </div>
                    <input type="text" name="area" class="form-control" placeholder="Area/Locality">
                </div>

                <div class="input-group form-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-map-pin"></i></span>
                    </div>
                    <input type="text" name="pin" class="form-control" placeholder="Pin/Zip Code">
                </div>
				<div class="input-group form-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-graduation-cap"></i></span>
                    </div>
                    <input type="text" name="edetails" class="form-control" placeholder="Educational Details">
                </div>

                <div class="input-group form-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-clock"></i></span>
                    </div>
                    <input type="text" name="exp" class="form-control" placeholder="Experience (in years)">
                </div>
				<div class="input-group form-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-star"></i></span>
                    </div>
                    <input type="text" name="spec" class="form-control" placeholder="Specialisation">
                </div>

                <div class="input-group form-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-gavel"></i></span>
                    </div>
                    <input type="text" name="pcourts" class="form-control" placeholder="Practicing Courts">
                </div>
				<div class="input-group form-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-language"></i></span>
                    </div>
                    <input type="text" name="lang" class="form-control" placeholder="Languages Known">
                </div>

                <div class="input-group form-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-id-card"></i></span>
                    </div>
                    <input type="text" name="cnum" class="form-control" placeholder="Bar Council Number "><br>
                </div>
		
                <div class="form-group">
                    <button type="submit" name="submit" class="btn btn-primary" style="margin-left: 15px;margin-right: 15px;margin-bottom: 10px;" >Update Profile</button>  
                </div>
			
            </form>
        </div>
    </div>

	</div>
<div class="container">
    <div class="card card-login mx-auto text-center " style="background-color: #ededed;border-radius:10px;float:right;width: 75%;">
        <div class="card-header mx-auto bg-dark" style="border-radius:20px;">My Profile</div>
        <div class="card-body">
            <form action="tst.php" method="POST" encrypt="multipart/form-data">
			<div style="border:dotted ;border-color:black; margin:10px ;padding:10px">
			<img src="user.png" height="150px" width="50px" onclick="image(this)" id="img1"><br>
			<img src="s5.png" height="40px" width="350px" id="img2">
			</div>
			<br><input type="file" name="image" id="image"><br>
			<input type="button" name="upload" value="Upload" onclick="abc()">
			
			</form>
		</div>
		</div>
	</div>
</div>

<?php include "footer.php" ?>
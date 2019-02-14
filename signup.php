<?php
$title = "Sign Up";
?>
<?php include "header.php" ?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>

        label{
            font-family:Georgia, 'Times New Roman', Times, serif;
            font-weight: bold;
        }

        * {box-sizing: border-box}
        body {font-family: Verdana, sans-serif; margin:0}
        .mySlides {display: none}
        img {vertical-align: middle;}
        
        /* Slideshow container */
        .slideshow-container {
          max-width: 1000px;
          position: relative;
          margin: auto;
        }
        
        /* Next & previous buttons */
        .prev, .next {
          cursor: pointer;
          position: absolute;
          top: 50%;
          width: auto;
          padding: 16px;
          margin-top: -22px;
          color: white;
          font-weight: bold;
          font-size: 18px;
          transition: 0.6s ease;
          border-radius: 0 3px 3px 0;
          user-select: none;
        }
        
        /* Position the "next button" to the right */
        .next {
          right: 0;
          border-radius: 3px 0 0 3px;
        }
        
        /* On hover, add a black background color with a little bit see-through */
        .prev:hover, .next:hover {
          background-color: rgba(0,0,0,0.8);
        }
        
        /* Number text (1/3 etc) */
        .numbertext {
          color: #f2f2f2;
          font-size: 12px;
          padding: 8px 12px;
          position: absolute;
          top: 0;
        }
        
        /* Fading animation */
        .fade {
          -webkit-animation-name: fade;
          -webkit-animation-duration: 1.5s;
          animation-name: fade;
          animation-duration: 1.5s;
        }
        
        @-webkit-keyframes fade {
          from {opacity: .4} 
          to {opacity: 1}
        }
        
        @keyframes fade {
          from {opacity: .4} 
          to {opacity: 1}
        }
        
        /* On smaller screens, decrease text size */
        @media only screen and (max-width: 300px) {
          .prev, .next,.text {font-size: 11px}
        }
        
        </style>

<div class="container">
    <?php
    //Using Sessions
    //session_start();
    if (!$_SESSION['is_logged_in']) {
        ?>
     
<div class="jumbotron">
    <div class="row">
    <div class="col-sm-6">
        <form name="reg_form" action="signupdb.php" onsubmit="return validation()" method="POST">
            <div class="card">
                <div class="card-header">
                    <span>
                        <h4><i class="fa fa-address-card">&nbsp;Registration form</i></h4>
                    </span>
                </div>
                <div class="form-group">
                    <div class="card-body">
                        <label for="Name">Name:</label><input type="text" class="form-control" name="name" id="my_name">
                        <label for="username">Username:</label><input type="text" class="form-control" name="user_name" id="u_name">
                        <label for="password">Password:</label><input type="password" class="form-control" name="pass" id="my_pass">
                        <label for="password">Confirm Password:</label><input type="password" class="form-control" name="conf_pass" id="conf_my_pass">
                        <label for="email">Email</label><input type="text" class="form-control" name="email" id="my_email">
                        <label for="mobnum">Mobile no:</label><input type="text" class="form-control" name="mobnum" id="my_mobnum"><br>
                        <label for="Type">Type:</label>
                            <select class="custom-select" name="type">
                                <option value="selected">Select type</option>
                                <option value="Advocate">Advocate</option>
                                <option value="Client">Client</option>
                            </select>
                    </div>
                </div>
                <button type="submit" name="submit" class="btn btn-primary" style="margin-left: 15px;margin-right: 15px;margin-bottom: 10px;" >Submit</button>
                <button type="reset" value="Reset" name="Reset" class="btn btn-primary" style="margin-left: 15px;margin-right: 15px;margin-bottom: 10px;" >Reset</button>
            </div>
        </form>
    </div>
    <div class="col-sm-6">
            <div class="slideshow-container">

                <div class="mySlides fade">
                   <div class="numbertext">1 / 3</div>
                    <img src="static/signup.jpg" style="width:100%;height:50%;border-radius: 10px;">
                </div>
                    
                <div class="mySlides fade">
                    <div class="numbertext">2 / 3</div>
                    <img src="static/signup1.jpg" style="width:100%;height:50%;border-radius: 10px;">
                </div>
                    
                <div class="mySlides fade">
                    <div class="numbertext">3 / 3</div>
                    <img src="static/signup2.jpg" style="width:100%;height:50%;border-radius: 10px;">
                </div>
                    
                <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                <a class="next" onclick="plusSlides(1)">&#10095;</a>
                    
            </div>
    </div>
</div>
    
</div>

<script>
        var slideIndex = 1;
        showSlides(slideIndex);
        
        function plusSlides(n) {
          showSlides(slideIndex += n);
        }
        
    var slideIndex = 0;
    showSlides();

    function showSlides() {
        var i;
        var slides = document.getElementsByClassName("mySlides");
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none"; 
        }
        slideIndex++;
        if (slideIndex > slides.length) {slideIndex = 1} 
        slides[slideIndex-1].style.display = "block"; 
        setTimeout(showSlides, 5000); // Change image every 2 seconds
    }
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
    var pass=/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[^\w\s]).{8,}$/;
    if(pass.test(password.value)==false)
    {
    	window.alert("Password should include an uppercase,a lowercase,a number and a special character"); 
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
        

    <?php 
} else {
        # code...
    echo '<script>window.open("blank.php","_self")</script>';
} ?>

<?php include "footer.php" ?>
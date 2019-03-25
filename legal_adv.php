<?php
$title = "Online Legal Advice";
?>
<?php include "header.php" ?>
<?php include "dbcon.php" ?>

<?php
    //Using Sessions
if (!$_SESSION['is_logged_in']) {
    echo '<script>window.open("login.php","_self")</script>';
}
?>
<!--<?php 
if (isset($_POST['submit'])) {

    $heading = mysqli_real_escape_string($connection, $_POST['heading']);
    $topic = mysqli_real_escape_string($connection, $_POST['topic']);
    $city = mysqli_real_escape_string($connection, $_POST['city']);
    $description = mysqli_real_escape_string($connection, $_POST['description']);
    $user_id = $_SESSION['user_info']['id'];
    $query = "INSERT INTO ola(user_id,heading,topic,description,city) ";
    $query .= "VALUES ('$user_id','$heading','$topic','$description','$city')";
    $result = mysqli_query($connection, $query);
    if (!$result) {
        die("QUERY FAILED " . mysqli_error($connection));
    }
}


?>-->

<style>
    label{
        font-weight: 500 !important;
    }
</style>
<div class="container">
    <!-- Page Heading/Breadcrumbs -->
    <h1 class="mt-4 mb-3">Online Legal Advice &nbsp;
        <small>Search Advocate</small>&nbsp;&nbsp;&nbsp;
    </h1>

    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="index.php">Home</a>
        </li>
        <li class="breadcrumb-item active">Online Legal Advice / Search Advocate</li>
    </ol>

    <!-- Image Header -->
    <img class="img-fluid rounded mb-4" src='static/banner.jpg' alt="">
    <br>
    <div id="result">
        <!-- Results  for the search query -->

    </div>

</div>

<script>
    $(document).ready(function () {
        //alert("Hello");
        $.ajax({
            url: "adv_details.php",
            success: function (data) {
                $('#result').html(data);
            }
        })
    })

    function cityAuto() {
        var input = document.getElementById('city');
        var autocomplete = new google.maps.places.Autocomplete(input);
    }
    function validation(){
	var heading = document.forms["advice"]["heading"];               
    var topic = document.forms["advice"]["topic"];    
    var city = document.forms["advice"]["city"]; 
    if (heading.value == "")                                  
    { 
        window.alert("Please enter heading");
        return false; 
    } 
    
    if((heading.value.length <= 2) || (heading.value.length > 20)) {
		alert("heading lenght must be between 2 and 20"); 
        heading.focus(); 
        return false;		
		}
    if(document.advice.topic.selectedIndex==0)
    {
          alert("Please enter your topic"); 
        topic.focus(); 
        return false;
    }
	if (city.value == "")                                  
    { 
        window.alert("Please enter city");
        return false; 
    }  
	

}
	function limitText(limitField, limitCount, limitNum) {
          if (limitField.value.length > limitNum) {
            limitField.value = limitField.value.substring(0, limitNum);
          } else {
            limitCount.value = limitNum - limitField.value.length;
          }
        }
</script>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDJ5ELIUvC5xcx1itdQBE1CIXgU_Tewoko&libraries=places&callback=cityAuto"></script>
<?php include "footer.php" ?>
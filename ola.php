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
<?php 
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


?>

<style>
    label{
        font-weight: 500 !important;
    }
</style>
<div class="container">
    <!--Modal-->
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Get Advice</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form name="advice" onsubmit="return validation()" method="POST" action="ola.php">
                        <div class="form-group">
                            <label for="heading">Heading</label>
                            <input type="text" class="form-control" name="heading" id="heading" placeholder="Enter heading">
                        </div>
                        <div class="form-group">
                            <label for="topic">Topic</label>
                            <select id="topic" name="topic" class="form-control">
                                <option>[Choose One]</option>
                                <option>Accident</option>
                                <option>ANY</option>
                                <option>Banking</option>
                                <option>Business</option>
                                <option>Civil</option>
                                <option>Constitution</option>
                                <option>Consumer Protection</option>
                                <option>Criminal</option>
                                <option>Environmental</option>
                                <option>Family</option>
                                <option>Human Rights</option>
                                <option>Information Technology</option>
                                <option>Insurance</option>
                                <option>Intellectual Property</option>
                                <option>International Law</option>
                                <option>Labor</option>
                                <option>Maritime law</option>
                                <option>Motor Vehicle</option>
                                <option>Notary</option>
                                <option>Property</option>
                                <option>Tax</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="city">City</label>
                            <input type="text" class="form-control" name="city" id="city" placeholder="Enter Nearest City">
                        </div>
                        <div class="form-group">
                        <h3>Description</h3>
                        	<textarea class="form-control"  id="description" name='description' placeholder="Type here to see how it work" rows="5" onkeydown="limitText(this.form.description,this.form.countdown,600);" onkeyup='limitText(this.form.description,this.form.countdown,600);'>	
                        	</textarea>You have<input readonly type="text" name="countdown" size="3" value="600"> chars left
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" name="submit" class="form-control btn btn-primary">Submit</button> <button
                        type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
                </form>
            </div>

        </div>
    </div>
    <!--Modal Ends-->

    <!-- Page Heading/Breadcrumbs -->
    <h1 class="mt-4 mb-3">Online Legal Advice
        <small>Discussion Forum</small>&nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-info btn-lg" data-toggle="modal"
            data-target="#myModal">
            <spna class="fa fa-gavel"></spna> Post Your Problem
        </button>
    </h1>

    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="index.html">Home</a>
        </li>
        <li class="breadcrumb-item active">Online Leagel Advice</li>
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
            url: "fetch_questions.php",
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
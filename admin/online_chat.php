<?php
$title = "Online Chat";
?>
<?php include "admin_header.php" ?>
<?php include "admin_dbcon.php" ?>


<div class="container-fluid">

<h1 class="h3 mb-0 text-gray-800">Online Chat Portal</h1>
<br>
<h5>Online Users</h5>
<hr>
<div id="users" >


</div>
</div>

<script>
$(document).ready(function(){

 fetch_user();

  setInterval(function(){
  fetch_user();
 }, 5000);

 function fetch_user()
 {
  $.ajax({
   url:"fetch_user.php",
   method:"POST",
   success:function(data){
    $('#users').html(data);
   }
  })
 }


})

</script>

<?php include "admin_footer.php" ?>
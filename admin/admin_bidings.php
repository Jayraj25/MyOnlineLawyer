<?php
$title = "Dashboard";
?>
<?php include "admin_header.php" ?>
<?php include "admin_dbcon.php" ?>


<div class="container-fluid">

<h1 class="h3 mb-0 text-gray-800">Make your Bid</h1>
<br>
<div id="bid">

</div>

</div>
<script src="http://code.jquery.com/jquery-3.3.1.min.js"
		integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
			  crossorigin="anonymous"></script>
<script>

$(document).ready(function () {
        //alert("Hello");
    $.ajax({
            url: "fetch_bidings.php",
        success: function (data) { 
         $('#bid').html(data);
            }
        })
})

</script>
<?php include "admin_footer.php" ?>
<?php
$title = "Dashboard";
?>
<?php include "admin_header.php" ?>
<?php include "admin_dbcon.php" ?>


<div class="container-fluid">

<h1 class="h3 mb-0 text-gray-800">Online Legal Advice</h1>
<br>
<div class="col-lg-12" id="result">



</div>

</div>
<script>
$(document).ready(function () {
        $.ajax({
            url: "fetch_questions.php",
            success: function (data) {
                $('#result').html(data);
            }
        })
    })

</script>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDJ5ELIUvC5xcx1itdQBE1CIXgU_Tewoko&libraries=places&callback=cityAuto"></script>

<?php include "admin_footer.php" ?>
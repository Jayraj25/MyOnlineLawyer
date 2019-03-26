<?php
$title = "Dashboard";
?>
<?php include "admin_header.php" ?>
<?php include "admin_dbcon.php" ?>


<div class="container-fluid">

<h1 class="h3 mb-0 text-gray-800">Make your Bid</h1>
<br>
<div class="row">
<div class="col-lg-9">
        <div id="bid">

            </div>
            
</div>
<div class="col-lg-3">
        <div class="card border-left-success shadow h-20 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Problems</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">30</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-calculator fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
              <br>
              <div class="card border-bottom-info shadow h-20 py-2">
                    <div class="card-body">
                      <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                          <div class="form-group">
                            <input type="text" class="form-control" name="loc_search" id="loc_search" placeholder="Location Filter">
                           
                          </div>
                        </div>
                        <div class="col-auto">
                          <i class="fas fa-search fa-2x text-gray-300"></i>
                        </div>
                      </div>
                    </div>
                  </div>
</div>



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
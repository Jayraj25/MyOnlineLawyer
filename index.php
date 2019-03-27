<?php
$title = "Index";
?>
<?php include "header.php" ?>
<?php include "dbcon.php" ?>

   
	<script>
function searchcity()
{
	var input=document.getElementById("search_city");
	var autocomplete=new google.maps.places.Autocomplete(input);
}
</script>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCbM4WNoeWD3y5QjyLMS97Lm8w2Q06uslE&libraries=places&callback=searchcity">
</script>
<?php

    //echo "<h1>Hello Not</h1>";?>
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner" role="listbox">
        <!-- Slide One - Set the background image for this slide in the line below -->
        <div class="carousel-item active" style="background-image: url('static/imgcorousel.jpg')">
          <div class="carousel-caption d-none d-md-block">
            <h3>First Slide</h3>
            <p>This is a description for the first slide.</p>
          </div>
        </div>
        <!-- Slide Two - Set the background image for this slide in the line below -->
        <div class="carousel-item" style="background-image: url('static/img.jpg')">
          <div class="carousel-caption d-none d-md-block">
            <h3>Second Slide</h3>
            <p>This is a description for the second slide.</p>
          </div>
        </div>
        <!-- Slide Three - Set the background image for this slide in the line below -->
        <div class="carousel-item" style="background-image: url('static/imgcorousel1.jpg')">
          <div class="carousel-caption d-none d-md-block">
            <h3>Third Slide</h3>
            <p>This is a description for the third slide.</p>
          </div>
        </div>
      </div>
      <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
<div class="container">
    <div class="jumbotron" style="margin-top: 10px;">
        <div class="input-group">
            <input type="text" class="form-control" id="search_city" placeholder="Type City (Ex: Chennai)">
            <div class="input-group-append">
                <button class="btn btn-secondary" type="button">
                <i class="fa fa-search"></i>
                </button>
            </div>
        </div><br>
        <!-- Card deck -->
    <div class="card-deck">
            <!-- Card -->
            <div class="card mb-4">
        
            <!--Card image-->
            <div class="view overlay">
                <img class="card-img-top" src="static/onlinelegaladvice.jpg" alt="Card image cap" height="300">
                <a href="ola.php">
                <div class="mask rgba-white-slight"></div>
                </a>
            </div>
        
            <!--Card content-->
            <div class="card-body">
        
                <!--Title-->
                <h4 class="card-title">Online Legal Advice</h4>
                <!--Text-->
                <p class="card-text">Want Some Advice?</p>
                <!-- Provides extra visual weight and identifies the primary action in a set of buttons -->
                <button type="button" class="btn btn-primary"><a class="text-white" href="ola.php">Ask Question</a></button>
        
            </div>
        
            </div>
            <!-- Card -->
        
            <!-- Card -->
            <div class="card mb-4">
        
            <!--Card image-->
            <div class="view overlay">
                <img class="card-img-top" src="static/hireyourlawyer.jpg" alt="Card image cap" height="300">
                <a href="lawyersview.php">
                <div class="mask rgba-white-slight"></div>
                </a>
            </div>
        
            <!--Card content-->
            <div class="card-body">
        
                <!--Title-->
                <h4 class="card-title">Hire your Lawyer</h4>
                <!--Text-->
                <p class="card-text">List of the Lawyers registered</p>
                <!-- Provides extra visual weight and identifies the primary action in a set of buttons -->
                <button type="button" class="btn btn-primary"><a class="text-white" href="lawyersview.php">View Lawyers</a></button>
        
            </div>
        
            </div>
            <!-- Card -->
        
            <!-- Card -->
            <div class="card mb-4">
        
            <!--Card image-->
            <div class="view overlay">
                <img class="card-img-top" src="static/bidding.jpg" alt="Card image cap" height="300">
                <a href="bidding.php">
                <div class="mask rgba-white-slight"></div>
                </a>
            </div>
        
            <!--Card content-->
            <div class="card-body">
        
                <!--Title-->
                <h4 class="card-title">Legal Case Bidding</h4>
                <!--Text-->
                <p class="card-text">Post your case here with the budget.</p>
                <!-- Provides extra visual weight and identifies the primary action in a set of buttons -->
                <button type="button" class="btn btn-primary"><a class="text-white" href="bidding.php">Post your Case</a></button>
        
            </div>
        
            </div>
            <!-- Card -->
        
        </div>
        <!-- Card deck -->

        <div class="card-deck">
                <!-- Card -->
                <div class="card mb-4">
            
                <!--Card image-->
                <div class="view overlay">
                    <img class="card-img-top" src="static/lawyersindia.jpg" alt="Card image cap" height="300">
                    <a href="#!">
                    <div class="mask rgba-white-slight"></div>
                    </a>
                </div>
            
                <!--Card content-->
                <div class="card-body">
            
                    <!--Title-->
                    <h4 class="card-title">Lawyers India</h4>
                    <!--Text-->
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <!-- Provides extra visual weight and identifies the primary action in a set of buttons -->
                    <button type="button" class="btn btn-primary">Read more</button>
            
                </div>
            
                </div>
                <!-- Card -->
            
                <!-- Card -->
                <div class="card mb-4">
            
                <!--Card image-->
                <div class="view overlay">
                    <img class="card-img-top" src="static/criminal-lawyer.jpg" alt="Card image cap" height="300">
                    <a href="#!">
                    <div class="mask rgba-white-slight"></div>
                    </a>
                </div>
            
                <!--Card content-->
                <div class="card-body">
            
                    <!--Title-->
                    <h4 class="card-title">Criminal Lawyers</h4>
                    <!--Text-->
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <!-- Provides extra visual weight and identifies the primary action in a set of buttons -->
                    <button type="button" class="btn btn-primary">Read more</button>
            
                </div>
            
                </div>
                <!-- Card -->
            
                <!-- Card -->
                <div class="card mb-4">
            
                <!--Card image-->
                <div class="view overlay">
                    <img class="card-img-top" src="static/consumercourt.jpg" alt="Card image cap" height="300">
                    <a href="#!">
                    <div class="mask rgba-white-slight"></div>
                    </a>
                </div>
            
                <!--Card content-->
                <div class="card-body">
            
                    <!--Title-->
                    <h4 class="card-title">Consumer Court</h4>
                    <!--Text-->
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <!-- Provides extra visual weight and identifies the primary action in a set of buttons -->
                    <button type="button" class="btn btn-primary">Read more</button>
            
                </div>
            
                </div>
                <!-- Card -->
            
            </div>
            
    </div>
 
</div>

<?php include "footer.php" ?>


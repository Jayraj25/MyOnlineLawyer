<?php
$title = "Index";
?>
<?php include "header.php" ?>
<?php include "dbcon.php" ?>

<div class="container">
    <?php
    if ($_SESSION['is_logged_in']) {
        ?>
        <h1>Hello</h1>
    <?php

} else {
    //echo "<h1>Hello Not</h1>";?>
    <div class="jumbotron" style="margin-top: 10px;">
        <div class="input-group">
            <input type="text" class="form-control" placeholder="Type City (Ex: Chennai)">
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
                <a href="#!">
                <div class="mask rgba-white-slight"></div>
                </a>
            </div>
        
            <!--Card content-->
            <div class="card-body">
        
                <!--Title-->
                <h4 class="card-title">Online Legal Advice</h4>
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
                <img class="card-img-top" src="static/hireyourlawyer.jpg" alt="Card image cap" height="300">
                <a href="#!">
                <div class="mask rgba-white-slight"></div>
                </a>
            </div>
        
            <!--Card content-->
            <div class="card-body">
        
                <!--Title-->
                <h4 class="card-title">Hire your Lawyer</h4>
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
                <img class="card-img-top" src="static/bidding.jpg" alt="Card image cap" height="300">
                <a href="#!">
                <div class="mask rgba-white-slight"></div>
                </a>
            </div>
        
            <!--Card content-->
            <div class="card-body">
        
                <!--Title-->
                <h4 class="card-title">Legal Case Bidding</h4>
                <!--Text-->
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <!-- Provides extra visual weight and identifies the primary action in a set of buttons -->
                <button type="button" class="btn btn-primary">Read more</button>
        
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
            <div class="card-deck">
                    <!-- Card -->
                    <div class="card mb-4">
                
                    <!--Card image-->
                    <div class="view overlay">
                        <img class="card-img-top" src="static/propertyverification.jpg" alt="Card image cap" height="300">
                        <a href="#!">
                        <div class="mask rgba-white-slight"></div>
                        </a>
                    </div>
                
                    <!--Card content-->
                    <div class="card-body">
                
                        <!--Title-->
                        <h4 class="card-title">Property Verification</h4>
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
                        <img class="card-img-top" src="static/lawfirms.jpg" alt="Card image cap" height="300">
                        <a href="#!">
                        <div class="mask rgba-white-slight"></div>
                        </a>
                    </div>
                
                    <!--Card content-->
                    <div class="card-body">
                
                        <!--Title-->
                        <h4 class="card-title">Law Firms India</h4>
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
                        <img class="card-img-top" src="static/legalnews.jpg" alt="Card image cap" height="300">
                        <a href="#!">
                        <div class="mask rgba-white-slight"></div>
                        </a>
                    </div>
                
                    <!--Card content-->
                    <div class="card-body">
                
                        <!--Title-->
                        <h4 class="card-title">Legal News</h4>
                        <!--Text-->
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <!-- Provides extra visual weight and identifies the primary action in a set of buttons -->
                        <button type="button" class="btn btn-primary">Read more</button>
                
                    </div>
                
                    </div>
                    <!-- Card -->
                
                </div>
    </div>
<?php
}
?>
    
</div>

<?php include "footer.php" ?>


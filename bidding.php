<?php
$title = "Bidding System";
?>
<?php include "header.php" ?>
<?php include "dbcon.php" ?>


<?php
if(!$_SESSION['is_logged_in']){
    header("location:/project/login.php");
}
?>
<?php 
define ('SITE_ROOT', realpath(dirname(__FILE__)));
if(isset($_POST['submit'])){
    
    $user_id = $_SESSION['user_info']['id'];
    $title = mysqli_real_escape_string($connection, $_POST['title']);
    $topic = mysqli_real_escape_string($connection, $_POST['topic']);
    $budget = mysqli_real_escape_string($connection, $_POST['budget']);
    $des= mysqli_real_escape_string($connection, $_POST['desc']);
    $loc= mysqli_real_escape_string($connection, $_POST['location']);
    $total = count($_FILES['ref_file']['name']);
    $posted_on = date('Y-m-d H:i:s');
    $query = "INSERT INTO biding(user_id,title,description,category,budget,location,posted_on,status) ";
    $query .= "VALUES ('$user_id','$title','$des','$topic','$budget','$loc','$posted_on','0')";
    $result = mysqli_query($connection, $query);
    if (!$result) {
        die("QUERY FAILED " . mysqli_error($connection));
    }
    $b_id = mysqli_insert_id($connection);
    
    if($total!==0){
        for( $i=0 ; $i < $total ; $i++ ) {
            $tmpFilePath = $_FILES['ref_file']['tmp_name'][$i];
            if ($tmpFilePath != ""){
                //Setup our new file path
                $newFilePath = SITE_ROOT. "/admin/uploadFiles/" . $_FILES['ref_file']['name'][$i];
                if(move_uploaded_file($tmpFilePath, $newFilePath)) {
                    $file_name = $_FILES['ref_file']['name'][$i];
                    $query = "INSERT INTO binding_ref_file(bid_id,file_name) VALUES('$b_id','$file_name')";
                    $result = mysqli_query($connection, $query);
                    if (!$result) {
                    die("QUERY FAILED " . mysqli_error($connection));
                    }
                  }
                else{
                    die("ERROR in uploading file ");
                }
            }
            
        }
    }
}
?>





<!-- Page Content -->
  <div class="container">
    <!--Modals-->
        
<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
            <h4 class="modal-title"><span class="fa fa-gavel"></span>&nbsp;Put Your Biding Problem</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-8">
                    <form action="bidding.php" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                          <label for="title">Title</label>
                          <input type="text" class="form-control" name="title" id="title" placeholder="Enter the title..">
                        </div>
                        <div class="form-group">
                            <label for="budget">Budget</label>
                            <input type="text" class="form-control" name="budget" id="budget" aria-describedby="helpBud" placeholder="Enter your Budget..">
                            <small id="helpBud" class="form-text text-muted">Example: 1000-1500</small>
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
                                    <label for="location">Location</label>
                                    <input type="text" class="form-control" name="location" id="location" aria-describedby="helploc" placeholder="Location">
                                    <small id="helploc" class="form-text text-muted">Location</small>
                            </div>
                            <div class="form-group">
                              <label for="description">Description</label>
                              <textarea class="form-control" name="desc" id="desc" rows="3"></textarea>
                            </div>
                            
                </div>
                <div class="col-lg-4">
                    <h6>Upload Reference files</h6>
                    <hr>
                    <div class="form-group">
                      <label for="ref_file"></label>
                      <input type="file" class="form-control-file" name="ref_file[]" id="ref_file" placeholder="Upload Files" aria-describedby="fileHelpId" multiple>
                      <small id="fileHelpId" class="form-text text-muted">You can upload multiple files</small>
                    </div>
                </div>   
            
                
                </div>
                <center><button name="submit" type="submit" class="btn btn-success btn-md">Submit</button></center>
                </form>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">&times; Close</button>
            
        </div>
        </div>

        </div>
        </div>
    <!--End Modals-->
        <!-- Page Heading/Breadcrumbs -->
    <h1 class="mt-4 mb-3">Legal Problems
      <small>Bidding System</small>
      <button style="float: right;" data-toggle="modal" data-target="#myModal" class="btn btn-primary btn-md"><span class="fa fa-plus"></span>&nbsp; Your Bid</button>
    </h1>
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="index.html">Home</a>
      </li>
      <li class="breadcrumb-item active">Bidding System</li>
    </ol>

    <div class="row">

      <!-- Blog Entries Column -->
      <div class="col-md-8">
          <?php
            $query = "SELECT * from biding ORDER BY posted_on DESC";
            $result = mysqli_query($connection, $query);
            if (!$result) {
            die("QUERY FAILED " . mysqli_error($connection));
            }
            
            while ($row = mysqli_fetch_assoc($result)) {
          ?>
        <!-- Blog Post -->
        <div class="card mb-4" id="<?php echo $row['id'];?>">
          <div class="card-body">
            <h2 class="card-title"><?php echo $row['title'];?> 
                <button class="btn btn-secondary btn-sm" style="float: right;" disabled>&nbsp;<?php echo $row['category'] ?></button>
                &nbsp;&nbsp; 
                <?php 
                if ($row['status'] === "0") {
                    ?>
                <button class="btn btn-success btn-sm" style="float: right;"><span class="fa fa-gavel"></span>&nbsp;Bidding On</button>
                <?php

            } else {
                ?>
                <button class="btn btn-danger btn-sm" style="float: right;"><span class="fa fa-gavel"></span>&nbsp;Bidding OFF</button>
                <?php

            } ?>
        </h2>
            <hr>
            <p class="card-text"><strong>Problem Description</strong>
                <br>
                <?php echo $row['description'];?>
                <br><strong>Reference Files</strong><br>
                <?php 
                $query2 = "SELECT * from binding_ref_file where bid_id=". $row['id'] ." ";
                $result1 = mysqli_query($connection, $query2);
                if (!$result1) {
                die("QUERY FAILED " . mysqli_error($connection));
                }
                ?>
                <ul>
                    <?php
                    while($row2  =  mysqli_fetch_assoc($result1))
                    {
                        ?>
                        <li><a href="<?php echo 'admin/uploadFiles/'.$row2['file_name'];?>" download>File<?php echo $row2['id']?></a></li>
                        <?php
                    }?>
                </ul>
                <br>
                <strong><span class="fa fa-map-marked"></span>&nbsp;Location: <?php echo $row['location'] ?></strong>
            

            </p>
            <a href="#" class="btn btn-primary" style="float: right;"><span class="fa fa-rupee-sign"></span>&nbsp;<?php echo $row['budget'];?> </a>
            <br>
            <br>
            <div class="card">
                <div class="card-header">
                    Current Bids Made         
                </div>
                <div class="card-body card-text">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Advocate Name</th>
                                <th><span class="fa fa-rupee"></span> Proposed Price</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $query3 = "SELECT users.id as user_id,users.name as name,bid_made.price as price,bid_made.user_id as adv_id from bid_made,users where bid_made.user_id=users.id and bid_made.status='0' and  bid_made.bid_id=".$row['id'] . " ";
                            $result2 = mysqli_query($connection, $query3);
                            if (!$result2) {
                            die("QUERY FAILED " . mysqli_error($connection));
                            }
                            while($row3 = mysqli_fetch_assoc($result2))
                            {
                            ?>
                            <tr id="advo<?php echo $row3['user_id']?><?php echo $row['id']?>">
                                <td scope="row"><?php echo $row3['name']?></td>
                                <td><?php echo $row3['price']?></td>
                                <?php 
                                    if($row['user_id'] === $_SESSION['user_info']['id']){
                                echo '<td><button onclick = "Approve('. $row3['user_id']. ',' .$row['id'] .')" class="btn btn-md btn-info"><span class="fa fa-check-circle">&nbsp;Approve and Consult</button></td>';
                                }
                                else{
                                    echo "<td>Not Allowed</td>";
                                }   
                                ?>
                            </tr>
                            <?php 
                        }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>    
        </div>
          <div class="card-footer text-muted">
                <?php echo $row['posted_on'];?>
          </div>
        </div>
        <br>
        <?php
    }
        ?>

      </div>

      <!-- Sidebar Widgets Column -->
      <div class="col-md-4">

        <!-- Search Widget -->
        <div class="card mb-4">
          <h5 class="card-header">Search</h5>
          <div class="card-body">
            <div class="input-group">
              <input type="text" class="form-control" placeholder="Search for...">
              <span class="input-group-btn">
                <button class="btn btn-secondary" type="button">Go!</button>
              </span>
            </div>
          </div>
        </div>

        <!-- Categories Widget -->
        <div class="card my-4">
          <h5 class="card-header">Categories</h5>
          <div class="card-body">
            <div class="row">
              <div class="col-lg-6">
                <ul class="list-unstyled mb-0">
                  <li>
                    <a href="#">Your Posts</a>
                  </li>
                  <li>
                    <a href="#">HTML</a>
                  </li>
                  <li>
                    <a href="#">Freebies</a>
                  </li>
                </ul>
              </div>
              <div class="col-lg-6">
                <ul class="list-unstyled mb-0">
                  <li>
                    <a href="#">JavaScript</a>
                  </li>
                  <li>
                    <a href="#">CSS</a>
                  </li>
                  <li>
                    <a href="#">Tutorials</a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>

        <!-- Side Widget -->
        <div class="card my-4">
          <h5 class="card-header">Side Widget</h5>
          <div class="card-body">
            You can put anything you want inside of these side widgets. They are easy to use, and feature the new Bootstrap 4 card containers!
          </div>
        </div>

      </div>

    </div>
    <!-- /.row -->
    <br>
    <br>
  </div>
  <!-- /.container -->

<script>
    function Approve(user_id,bid_id){
        $.ajax({
            method:"GET",
            url: "approve_bid.php",
            data:{
                'user_id':user_id,
                'bid_id':bid_id,
            },
            success: function (data) {
                if(data){
                alert("You have made the approval");
                var id = 'advo'+user_id+bid_id;
                document.getElementById(id).style.display = "none";
                }
            }
        })
    }
</script>
<?php include "footer.php" ?>

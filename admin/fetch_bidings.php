<?php include "admin_dbcon.php" ?>

<?php
define('SITE_ROOT', realpath(dirname(__FILE__)));
session_start();
?>



<div id="bidPost" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
         <h4 class="modal-title">Go Ahead Make Your Bid?</h4>
         <button type="button" class="close" data-dismiss="modal">&times;</button>
       
      </div>
      <div class="modal-body">
       <form action="make_bid.php" method="POST">
           <input name="user_id" value="<?php echo $_SESSION['user_info']['id'] ?>" hidden> 
           <input name="bid_id" id="bid_id" hidden> 
           <div class="form-group">
             <label for="price">Enter Price:</label>
             <input type="text" class="form-control" name="price" id="price">
           </div>
           <button type="submit" name="submit" class="btn btn-success">Submit</button>
        </form> 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">&times;Close</button>
      </div>
    </div>

  </div>
</div>

<div class="col-md-12">
          <?php
            $query = "SELECT * from biding ORDER BY posted_on DESC";
            $result = mysqli_query($connection, $query);
            if (!$result) {
                die("QUERY FAILED " . mysqli_error($connection));
            }

            while ($row = mysqli_fetch_assoc($result)) {
                ?>
        <!-- Blog Post -->
        <div class="card border-left-primary shadow mb-4" id="<?php echo $row['id']; ?>">
          <div class="card-body">
            <h2 class="card-title"><?php echo $row['title']; ?> 
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

            }
            ?>
            
            </h2>
            <hr>
            <p class="card-text"><strong>Problem Description</strong>
                <br>
                <?php echo $row['description']; ?>
                <br><strong>Reference Files</strong><br>
                <?php 
                $query2 = "SELECT * from binding_ref_file where bid_id=" . $row['id'] . " ";
                $result1 = mysqli_query($connection, $query2);
                if (!$result1) {
                    die("QUERY FAILED " . mysqli_error($connection));
                }
                ?>
                <ul>
                    <?php
                    while ($row2 = mysqli_fetch_assoc($result1)) {
                        ?>
                        <li><a href="<?php echo 'uploadFiles/' . $row2['file_name']; ?>" download>File<?php echo $row2['id'] ?></a></li>
                        <?php

                    } ?>
                </ul>
                <br>
                <strong><span class="fa fa-map-marked"></span>&nbsp;Location: <?php echo $row['location'] ?></strong>
            

            </p>
            <?php 
            if ($row['status'] === "0") {
                ?>
            <button class="btn btn-primary btn-icon-split" data-toggle="modal" data-target="#bidPost" data-id="<?php echo $row['id'] ?>" id="makeBid">
                    <span class="icon text-white-50">
                      <i class="fas fa-flag"></i>
                    </span>
                    <span class="text">Make Bid</span>
                </button>
                <?php

            }
            ?>
 
                    
            <a href="#" class="btn btn-primary" style="float: right;"><span class="fa fa-rupee-sign"></span>&nbsp;<?php echo $row['budget']; ?> </a>
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
                                <th><span class="fas fa-rupee"></span> Proposed Price</th>
                                <th>Result</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $query3 = "SELECT bid_made.status as status ,users.name as name,bid_made.price as price,bid_made.user_id as adv_id from bid_made,users where bid_made.user_id=users.id and bid_made.bid_id=" . $row['id'] . " ";
                            $result2 = mysqli_query($connection, $query3);
                            if (!$result2) {
                                die("QUERY FAILED " . mysqli_error($connection));
                            }
                            while ($row3 = mysqli_fetch_assoc($result2)) {
                                ?>
                            <tr>
                                <td scope="row"><strong><?php echo $row3['name'] ?></strong></td>
                                <td><strong><?php echo $row3['price'] ?></strong></td>
                                <td>
                                    <?php
                                    if ($row3['status']) {
                                        echo '<button class="btn btn-success btn-sm" disabled>Approved</button>';
                                    } else {
                                        echo '<button class="btn btn-danger btn-sm" disabled>Pending</button>';
                                    }
                                    ?>
                                </td>
                                
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
               Posted On: <?php echo $row['posted_on']; ?>
          </div>
        </div>
        <br>
        <?php

    }
    ?>

      </div>
<script>
      $(document).on("click", "#makeBid", function () {
        var myBookId = $(this).data('id');
        $(".modal-body #bid_id").val( myBookId );
   });  
   </script>    
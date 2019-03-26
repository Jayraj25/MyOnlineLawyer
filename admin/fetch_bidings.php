<?php include "admin_dbcon.php" ?>

<?php
define ('SITE_ROOT', realpath(dirname(__FILE__)));
session_start();
?>


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
                
                <button class="btn btn-success btn-sm" style="float: right;"><span class="fa fa-gavel"></span>&nbsp;Bidding On</button>
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
                        <li><a href="<?php echo 'uploadFiles/'.$row2['file_name'];?>" download>File<?php echo $row2['id']?></a></li>
                        <?php
                    }?>
                </ul>
                <br>
                <strong><span class="fa fa-map-marked"></span>&nbsp;Location: <?php echo $row['location'] ?></strong>
            

            </p>
            <button class="btn btn-primary btn-icon-split">
                    <span class="icon text-white-50">
                      <i class="fas fa-flag"></i>
                    </span>
                    <span class="text">Make Bid</span>
                </button>

            <a href="#" class="btn btn-primary" style="float: right;"><span class="fa fa-rupee-sign"></span>&nbsp;<?php echo $row['description'];?> </a>
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
                                
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $query3 = "SELECT users.name as name,bid_made.price as price,bid_made.user_id as adv_id from bid_made,users where bid_made.user_id=users.id and bid_made.bid_id=".$row['id'] . " ";
                            $result2 = mysqli_query($connection, $query3);
                            if (!$result2) {
                            die("QUERY FAILED " . mysqli_error($connection));
                            }
                            while($row3 = mysqli_fetch_assoc($result2))
                            {
                            ?>
                            <tr>
                                <td scope="row"><?php echo $row3['name']?></td>
                                <td><?php echo $row3['price']?></td>
                                
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
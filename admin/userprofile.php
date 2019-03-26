<?php
$title = "Dashboard";
?>
<?php include "admin_header.php" ?>
<?php include "admin_dbcon.php" ?>

<?php
if(isset($_POST['submit']))
{
    $city= $_POST['city'];
    $area= $_POST['area'];
    $pin = $_POST['pin'];
    $edu= $_POST['education'];
    $exp= $_POST['exp'];
    $spec= $_POST['spec'];
    //$pcourts= $_POST['pcourts'];
    $lang= $_POST['language'];
    $bcno= $_POST['barcounc'];
    $add = $_POST['add'];
    $id=$_SESSION['user_info']['id'];

    $query = "INSERT INTO adv_profile (id,addr,pcity,area,pin,edudetails,exp,spec,lang,bcno) 
    VALUES ('$id','$add','$city','$area','$pin','$edu','$exp','$spec','$lang','$bcno')";
    $result = mysqli_query($connection,$query);

    if (!$result) {
        die("QUERY FAILED " . mysqli_error($connection));
    }
}

 //image storing in DB

if(isset($_POST['but_upload'])){
 
    $name = $_FILES['file']['name'];
    $id=$_SESSION['user_info']['id'];
    $target_dir = "Uploads/";
    $target_file = $target_dir . basename($_FILES["file"]["name"]);
  
    // Select file type
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
  
    // Valid file extensions
    $extensions_arr = array("jpg","jpeg","png","gif");
  
    // Check extension
    if( in_array($imageFileType,$extensions_arr) ){
   
      // Convert to base64 
      $image_base64 = base64_encode(file_get_contents($_FILES['file']['tmp_name']));
      $image = 'data:image/' . $imageFileType . ';base64,' . $image_base64;
      // Insert record
      $query = "insert into images(profileid,image) values('$id','$image')";
      $result = mysqli_query($connection,$query);
      if (!$result) {
        die("QUERY FAILED " . mysqli_error($connection));
    }

    
      // Upload file
      move_uploaded_file($_FILES['file']['tmp_name'],$target_dir.$name);
    }
   
  }
?>

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">User Profile</h1>
    </div>

    <div class="card shadow md-4">
        <div class="row" style="margin:20px;">
            <div class="col-lg-4">
            <?php
            $id = $_SESSION['user_info']['id'];
            $sql = "select image from images where profileid='".$id."'";
            $result = mysqli_query($connection,$sql);
            $row = mysqli_fetch_array($result);

            $image_src2 = $row['image'];
            
            ?>
                <img src='<?php echo $image_src2; ?>' class="img-circle" alt="Cinque" width="200" height="200"><br><br>
                <form method="post" action="userprofile.php" enctype='multipart/form-data'>
                    <div class="form-group">
                        <input type="file" class="form-control-file" name="file" id="file" />
                        <input type='submit'  value='Save name' name='but_upload'>
                    </div>
                </form>
            </div>
            <div class="col-lg-5" style="margin-top:30px;">
                <?php
                $query = "SELECT * from users where id = '" .$_SESSION['user_info']['id']. "'";
                $result = mysqli_query($connection,$query);

                if (!$result) {
                    die("QUERY FAILED " . mysqli_error($connection));
                }

                while($row = mysqli_fetch_assoc($result))
                {
                    echo "<p><b>Name</b>&nbsp;&nbsp;:&nbsp;&nbsp;$row[name]</p>";
                    echo "<p><b>Username</b>&nbsp;&nbsp;:&nbsp;&nbsp;$row[username]</p>";
                    echo "<p><b>Email</b>&nbsp;&nbsp;:&nbsp;&nbsp;$row[email]</p>";
                    echo "<p><b>Mob num</b>&nbsp;&nbsp;:&nbsp;&nbsp;$row[mobileNo]</p>";
                }
                ?>
            </div>
            <div class="col-lg-3">
                <button class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                    <i class="fa fa-plus"></i> Add additional information
                </button>
            </div>
        </div>
    </div>
    <br>
    <div class="card shadow md-4">
        <div class="row" style="margin:20px;">
            <div class="col-lg-6">
                <?php
                $query1 = "SELECT * from adv_profile where id = '" .$_SESSION['user_info']['id']. "'";
                $result1 = mysqli_query($connection,$query1);

                if (!$result1) {
                    die("QUERY FAILED " . mysqli_error($connection));
                }

                while($rows = mysqli_fetch_assoc($result1))
                {
                    echo "<p><b>Practicing City</b>&nbsp;&nbsp;:&nbsp;&nbsp;$rows[pcity]</p>";
                    echo "<p><b>Area</b>&nbsp;&nbsp;:&nbsp;&nbsp;$rows[area]</p>";
                    echo "<p><b>Pin</b>&nbsp;&nbsp;:&nbsp;&nbsp;$rows[pin]</p>";
                    echo "<p><b>Educational Details</b>&nbsp;&nbsp;:&nbsp;&nbsp;$rows[edudetails]</p>";
                ?>
            </div>
                <div class="col-lg-6">
                    <?php
                    echo "<p><b>Experience</b>&nbsp;&nbsp;:&nbsp;&nbsp;$rows[exp]</p>";
                    echo "<p><b>Specialization</b>&nbsp;&nbsp;:&nbsp;&nbsp;$rows[spec]</p>";
                    echo "<p><b>Languages Known</b>&nbsp;&nbsp;:&nbsp;&nbsp;$rows[lang]</p>";
                    echo "<p><b>Bar Council Number</b>&nbsp;&nbsp;:&nbsp;&nbsp;$rows[bcno]</p>";
                }
                ?>
            </div>
        </div>
    </div>

    <!--Modal-->
    <div id="myModal" class="modal fade" role="dialog">
            <div class="modal-dialog">
    
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Additional Information</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <form name="advice" onsubmit="return validation()" method="POST" action="userprofile.php">
                            <div class="form-group">
                                <label for="city">Practicing City</label>
                                <input type="text" class="form-control" name="city" id="city" placeholder="Enter the practicing city">
                            </div>
                            <div class="form-group">
                                <label for="area">Area/Locality</label>
                                <input type="text" class="form-control" name="area" id="area" placeholder="Enter the area/locality">
                            </div>
                            <div class="form-group">
                                <label for="pin">Pin/Zip Code</label>
                                <input type="text" class="form-control" name="pin" id="pin" placeholder="Enter the Pin">
                            </div>
                            <div class="form-group">
                                <label for="education">Educational Details</label>
                                <input type="text" class="form-control" name="education" id="education">
                            </div>
                            <div class="form-group">
                                <label for="exp">Experience(in years)</label>
                                <input type="number" class="form-control" name="exp" id="exp">
                            </div>
                            <div class="form-group">
                                <label for="specialization">Specialization</label>
                                <input type="text" class="form-control" name="spec" id="spec">
                            </div>
                            <div class="form-group">
                                <label for="language">Languages Known</label>
                                <input type="text" class="form-control" name="language" id="language">
                            </div>
                            <div class="form-group">
                                <label for="barcounc">Bar Council Number</label>
                                <input type="text" class="form-control" name="barcounc" id="barcounc">
                            </div>
                            <div class="form-group">
                            <label for="add">Address</label>
                                <textarea class="form-control"  id="add" name="add" placeholder="Type here to see how it work" rows="5" onkeydown="limitText(this.form.description,this.form.countdown,600);" onkeyup='limitText(this.form.description,this.form.countdown,600);'>	
                                </textarea>You have<input readonly type="text" name="countdown" size="3" value="600"> chars left
                            </div>
    
                    </div>
                    <div class="modal-footer">
                        <button type="submit" name="submit" class="form-control btn btn-primary">Add to Profile</button> <button
                            type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>
                    </form>
                </div>
    
            </div>
        </div>
        <!--Modal Ends-->
</div>
<?php include "admin_footer.php" ?>
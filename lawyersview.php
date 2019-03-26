<?php
$title = "Lawyers View";
?>
<?php include "header.php" ?>
<?php include "dbcon.php" ?>



<div class="container">
    <div class="jumbotron" style="margin-top: 10px;">
        <div style="text-align: center">
            <img src="static/lawyers.png" height="50" width="50">&nbsp;&nbsp;<h1>Lawyers</h1>
        </div>
        <form method="POST" action="lawyersview.php">
            <div class="input-group">
                <input type="text" class="form-control" name="search_city" id="search_city" placeholder="Type City (Ex: Chennai)">
                <div class="input-group-append">
                    <input type="submit" class="btn btn-secondary" name="search" value="Search">
                </div>
            </div>
        </form>
        <?php
        if(isset($_POST['search']))
        {
            $search_city = $_POST['search_city'];
            $query = "select * from users,images,adv_profile where users.id=images.profileid and images.profileid=adv_profile.id and pcity='".$search_city."'";
            $result = mysqli_query($connection,$query);
            if (!$result) {
                die("QUERY FAILED " . mysqli_error($connection));
            }
        
            while($rows = mysqli_fetch_assoc($result))
            {?>
            <div class="card shadow mb-4">
                <div class="row">
                    <div class="col-lg-4" style="margin:20px;">
                        <img src="<?php echo $rows['image']; ?>" alt='black' widht='200' height='200'>
                    </div>
                    <div class="col-lg-4" style="margin-top:20px;">
                    <?php
                    $query1 = "select * from users,adv_profile where users.id=adv_profile.id and users.username ='".$rows['username']."' and pcity='".$search_city."'";
                    
                    $result1 = mysqli_query($connection,$query1);
                    if (!$result1) {
                        die("QUERY FAILED " . mysqli_error($connection));
                    }
        
                    while($rows1 = mysqli_fetch_assoc($result1))
                    {
                        echo "<p><b>Name</b> : $rows1[name]</p>";
                        echo "<p><b>Location</b> : $rows1[pcity]</p>";
                        echo "<p><b>Experience(in years)</b> : $rows1[exp]</p>";
                        echo "<p><b>Specialities</b> : $rows1[spec]</p>";
                        echo "<p><b>Languages Known</b> : $rows1[lang]</p>";
                    }?>
                    </div>
                    <div class="col-lg-3" style="margin-top:20px;">
                        <button class="btn btn-primary" name="consult"><i class="fas fa-1x fa-handshake"></i>&nbsp;&nbsp;Consult</button>
                    </div>
                </div>
            </div>
            <?php
            }
        }
        else{
            $query = "select * from users,images where users.id=images.profileid";
            $result = mysqli_query($connection,$query);
            if (!$result) {
                die("QUERY FAILED " . mysqli_error($connection));
            }

            while($rows = mysqli_fetch_assoc($result))
            {?>
            <div class="card shadow mb-4">
                <div class="row">
                    <div class="col-lg-4" style="margin:20px;">
                        <img src="<?php echo $rows['image']; ?>" alt='black' widht='200' height='200'>
                    </div>
                    <div class="col-lg-4" style="margin-top:20px;">
                    <?php
                    $query1 = "select * from users,adv_profile where users.id=adv_profile.id and users.username ='".$rows['username']."' ";
                    
                    $result1 = mysqli_query($connection,$query1);
                    if (!$result1) {
                        die("QUERY FAILED " . mysqli_error($connection));
                    }

                    while($rows1 = mysqli_fetch_assoc($result1))
                    {
                        echo "<p><b>Name</b> : $rows1[name]</p>";
                        echo "<p><b>Location</b> : $rows1[pcity]</p>";
                        echo "<p><b>Experience(in years)</b> : $rows1[exp]</p>";
                        echo "<p><b>Specialities</b> : $rows1[spec]</p>";
                        echo "<p><b>Languages Known</b> : $rows1[lang]</p>";
                    }?>
                    </div>
                    <div class="col-lg-3" style="margin-top:20px;">
                        <button class="btn btn-primary" name="consult"><i class="fas fa-1x fa-handshake"></i>&nbsp;&nbsp;Consult</button>
                    </div>
                </div>
            </div>
            <?php
            }
        
        }
        ?>
                    
        
        </div>
    </div>
</div>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCbM4WNoeWD3y5QjyLMS97Lm8w2Q06uslE&libraries=places&callback=searchcity">
</script>
<script>
function searchcity()
{
	var input=document.getElementById("search_city");
	var autocomplete=new google.maps.places.Autocomplete(input);
}
</script>

<?php include "footer.php" ?>
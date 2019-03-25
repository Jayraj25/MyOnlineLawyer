<?php include "dbcon.php" ?>
<?php session_start(); ?>
<?php

$query = "SELECT  * FROM adv_profile";
$result = mysqli_query($connection, $query);
if (!$result) {
    die("QUERY FAILED " . mysqli_error($connection));
}
?>



<center>
    <h4>Advocate List</h4>
</center>
<br>

<div class="row">
    <div class="col-lg-4">
        <input class="form-control" name="filter_city" placeholder="Enter the city">
    </div>
    <div class="col-lg-2">
        <button class="btn btn-primary"><span class="fa fa-filter"></span> Apply Filter</button>
    </div>

</div>
<br>
<?php
while ($row = mysqli_fetch_assoc($result)) {
    ?>
<div class="card border-dark" id="<?php echo $row['q_id']; ?>">
    <h5 class="card-header">
	<span class="fa fa-tag"></span> Advocate Name:
        <span style="color:teal">
			<?php echo $row['name'] ?></span>
			
    </h5>
    <div class="card-body">
        <div class="row">
            <div class="col-lg-6">
                <h5 class="card-title">
					<img src="<?php echo $row['img']?>" height="100px" width="100px">
                    <?php echo "<br>Email : ".$row['email'] ?><br>
					<?php echo  "Experience : ".$row['exp'] ?><br>
					<?php echo  "City : ".$row['pcity'] ?><br>
                </h5>
            </div>
            <div class="col-lg-6" style="text-align: right">
                <button class="btn btn-primary" onclick="q_like(<?php echo $row['id']; ?>);" id="button-<?php echo $row['id']; ?>">
                    <span id="btn-<?php echo $row['id']; ?>">
                        <?php echo $row['likes'] ?></span>
                    <span class="fa fa fa-thumbs-up"></span>
                </button>
            </div>
			
        </div>
        <p class="card-text">
            <?php echo "Languages Known : ".$row['lang'] ?><br>
            <?php echo "Specialisation : ".$row['spec'] ?> 
			<?php $map="https://www.google.com/maps/place/".$row['area']; ?>
			<a style="float:right;" href="adv_profile.php">More Details >></a>
			<a href="<?php echo $map?>" style="float:right;"><img src="map.png" height="30px" width="30px"></a>
        </p>
    </div>
	<br><button>Consult Advocate</button>
    
</div>
<br>
<?php 
}
?>
<script>
    $('#myModal1').on('show.bs.modal', function (e) {
        var q_id = $(e.relatedTarget).data('q-id');
        $(e.currentTarget).find('input[name="q_id"]').val(q_id);
    });
</script>
<script>
    function q_like(q_id) {
        var btn_id = 'btn-' + q_id;
        var button = "button-" + q_id;
        var user_id = "<?php echo $_SESSION['user_info']['id']; ?>";
        $.ajax({
            url: "ques_like.php",
            method: "POST",
            data: {
                'q_id': q_id,
                'user_id':user_id,
            },
            success: function (data) {
                if(data!='0'){
                document.getElementById(btn_id).innerHTML = data;
            }}

        })


    }
</script>
<script>
    function ans_like(ans_id) {
        var btn_id = 'abtn-' + ans_id;
        var button = "abutton-" + ans_id;
        var user_id = "<?php echo $_SESSION['user_info']['id']; ?>";
        $.ajax({
            url: "ans_like.php",
            method: "POST",
            data: {
                'a_id': ans_id,
                'user_id':user_id,
            },
            success: function (data) {
                if(data!='0'){
                document.getElementById(btn_id).innerHTML = data;
            }}

        })


    }
</script>
<br>
<br>
<br>
<br>
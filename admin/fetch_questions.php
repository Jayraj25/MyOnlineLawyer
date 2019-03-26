<?php include "admin_dbcon.php" ?>
<?php session_start(); ?>
<?php

$query = "SELECT  * FROM ola";
$result = mysqli_query($connection, $query);
if (!$result) {
    die("QUERY FAILED " . mysqli_error($connection));
}
?>
<script>
function searchcity()
{
	var input=document.getElementById("search_city");
	var autocomplete=new google.maps.places.Autocomplete(input);
}
</script>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDsBB1ea1WWszNR6y39ZnVi8O_Q90P_p5U&libraries=places&callback=searchcity"></script>

<center>
    <h4>Discussion Table</h4>
</center>
<br>
<!-- Modal -->
<div id="myModal1" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><span class="fa fa-pen "></span> POST Advice</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>

            </div>
            <div class="modal-body">
                <form method="POST" action="post_answer.php">
                    <input name="q_id" type="hidden">
                    <input name="user_id" type="hidden" value="<?php echo $_SESSION['user_info']['id']; ?>">
                    <div class="form-group">
                        <label for="answer">Your Advice</label>
                        <textarea class="form-control" id="answer" name="answer" rows="5"></textarea>
                        <input type="text" placeholder="Total Char Count: 600" disabled>
                    </div>
                    <button type="submit" name="submit" class="form-control btn btn-primary">Submit</button>
            </div>
            </form>
        </div>

    </div>
</div>
<div class="row">
    <div class="col-lg-4">
        <input class="form-control" name="filter_city" id="search_city" placeholder="Enter the city">
    </div>
    <div class="col-lg-2">
        <button class="btn btn-primary"><span class="fa fa-filter"></span> Apply Filter</button>
    </div>
    <div class="col-lg-6">
        <button class="btn btn-outline-primary">
            <h5><span class="fa fa-balance-scale"></span> Total Questions on the Forum :
                <?php echo mysqli_num_rows($result); ?>
            </h5>
        </button>
    </div>

</div>
<br>
<?php
while ($row = mysqli_fetch_assoc($result)) {
    ?>
<div class="card border-dark" id="<?php echo $row['q_id']; ?>">
    <h5 class="card-header"><span class="fa fa-tag"></span> Problem type:
        <span style="color:teal">
            <?php echo $row['topic'] ?></span>
    </h5>
    <div class="card-body">
        <div class="row">
            <div class="col-lg-6">
                <h5 class="card-title">
                    <?php echo $row['heading'] ?>
                </h5>
            </div>
            <div class="col-lg-6" style="text-align: right">
                <button class="btn btn-primary" onclick="q_like(<?php echo $row['q_id']; ?>);" id="button-<?php echo $row['q_id']; ?>">
                    <span id="btn-<?php echo $row['q_id']; ?>">
                        <?php echo $row['likes'] ?></span>
                    <span class="fa fa fa-thumbs-up"></span>
                </button>
            </div>

        </div>
        <p class="card-text">
            <?php echo $row['description'] ?>
        </p>
    </div>
    <div class="card-footer">
        <h5 class="card-title"><span class="fa fa-comments"></span> Advices
            &nbsp;&nbsp;&nbsp;&nbsp;
            <?php if ($_SESSION['user_type'] == 'Advocate') {
                echo "<button class='btn btn-outline-info'  data-toggle='modal' data-target='#myModal1' data-q-id='" . $row['q_id'] . "' >Give Advice</button>";
            }
            ?>
        </h5>
        <hr>
        <?php 
        $ans_query = "SELECT * FROM ola_answer,users where ola_answer.user_id=users.id and ";
        $ans_query .= " q_id='" . $row['q_id'] . "'";
        $result_ans = mysqli_query($connection, $ans_query);
        if (!$result_ans) {
            die("QUERY FAILED " . mysqli_error($connection));
        }
        while ($row1 = mysqli_fetch_assoc($result_ans)) {
            ?>
        <div class="card border-primary">
            <h6 class="card-header">
                By:
                <?php echo $row1['name']; ?>
            </h6>
            <div class="card-body">
                <p class="card-text" style="color:#007bff">
                    <?php echo $row1['answer'] ?>
                </p>
            </div>
            <div class="card-footer">
                <button class="btn btn-primary" onclick="ans_like(<?php echo $row1['a_id']; ?>);" id="abutton-<?php echo $row1['a_id']; ?>">
                    <span id="abtn-<?php echo $row1['a_id']; ?>">
                        <?php echo $row1['likes'] ?>
                    </span>
                    <span class="fa fa fa-thumbs-up"></span>
                </button>
            </div>
        </div><br>
        <?php 
    }
    ?>
    </div>
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
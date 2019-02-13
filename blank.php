<?php
$title = "blank page";
?>
<?php include "header.php" ?>
<?php include "dbcon.php" ?>

<?php
    //Using Sessions
if ($_SESSION['is_logged_in']) {
    echo "User is logged in";
    print_r($_SESSION['user_info']);
} else {
    echo "User is not logged in";
}
?>


<div class="container">
    hello
    
</div>

<?php include "footer.php" ?>
<?php
$title = "blank page";
?>
<?php include "header.php" ?>

<div class="container">
    hello
    <?php
    //Using Sessions
    session_start();
    print_r($_SESSION['user_info']);
    ?>
</div>

<?php include "footer.php" ?>
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
    echo "<h1>Hello Not</h1>";
}
?>
    
</div>

<?php include "footer.php" ?>


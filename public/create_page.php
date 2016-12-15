<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>


<?php
if (isset($connection)) {
  mysqli_close($connection); }
?>

<!-- <?php error_log("hello"); ?> -->
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php include("../includes/layouts/header.php"); ?>
<?php find_selected_page();?>

  <div id="Main">
    <div id="navigation">
      <?php echo navigation($current_wine, $current_page); ?>
  </div>
 <div id="page">

  <h2>Create Vinfo</h2>

  <form action="create_page.php" method="post">
    
    <input type="submit" name="submit" value="Create Vinfo"/>
  </form>
  <br />
  <a href="manage_content.php">cancel</a>
</div>
</div>


<?php include("../includes/layouts/footer.php"); ?>

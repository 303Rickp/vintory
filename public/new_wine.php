<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php include("../includes/layouts/header.php"); ?>
<?php find_selected_page();?>

  <div id="Main">
    <div id="navigation">
      <?php echo navigation($current_wine, $current_page); ?>
  </div>
 <div id="page">
<?php
  // echo message();
 ?>
  <h2>Create Wine</h2>

  <form action="create_wine.php" method="post">

    <p> Wine Name:
      <input type="text" name="wine_name" value=""/>
    </p>
    <p>Vintage:
      <input type="text" name="vintage" value=""/>
    </p>
    <p>Varietal:
      <input type="text" name="varietal" value=""/>
    </p>
    <p>Wine Maker:
      <input type="text" name="wine_maker" value=""/>
    </p>
    <p>Bottle No:
      <input  name="bottle_no" value="" />
    </p>
    <p>visible:
      <input type="text" name="visible" value=""/>
    </p>
    <p>Content:
      <input type="text" name="content" value=""/>
    </p>
    <p> Menu Name:
      <input type="text" name="menu_name" value=""/>
    </p>
      <div class="rating">
        <p>Rating:
<span>☆</span><span>☆</span><span>☆</span><span>☆</span><span>☆</span>
</div>
      <input type="text" name="rating" value=""/>
    </p>
    <input type="submit" name="submit" value="Create Wine"/>
  </form>
  <br />
  <a href="manage_content.php">cancel</a>
</div>
</div>


<?php include("../includes/layouts/footer.php"); ?>

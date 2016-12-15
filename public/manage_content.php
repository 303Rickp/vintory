
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php include("../includes/layouts/header.php"); ?>
<?php find_selected_page(); ?>

<?php
  $content = $_GET["content"]
 ?>

  <div id="Main">
    <div id="navigation"><br />
    <a href="new_wine.php">+ ADD TO YOU COLLECTION </a>
    <?php echo navigation($current_wine, $current_page); ?>
  </div>

 <div id="page">
  <?php if ( !$content ){ ?>
    <h2 class="selwin">Selected Wine:</h2>
    <br/>
    <?php echo $current_wine["wine_name"]; ?><br />
      <?php } elseif ($content) { ?>
    <h2>Wine Info:</h2>
        <?php echo $current_wine["content"]; ?><br />
       <?php } else { ?>
         SELECT A WINE or PAGE
       <?php } ?>

 </div>
</div>

<?php include("../includes/layouts/footer.php"); ?>

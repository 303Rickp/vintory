<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>

<?php
//peform db query
  $query  = "SELECT * ";
  $query .= "FROM wines";
  // $query .= "WHERE vintage = 2015 ";
  // $query .= "ORDER BY position ASC";

  $result =  mysqli_query($connection, $query);
  // confirm_query($result);
   if (!$result){
     die(" db query failed");
   }
 ?>

<?php include("../includes/layouts/header.php"); ?>

<div id="Main">
  <div id="navigation">
    <ul class ="wines">
      <?php
  // use return data
    while($wines = mysqli_fetch_assoc($result)){
      ?>
        <li><?php echo $wines["wine_name"] . " (" . $wines["id"] . ")"; ?></li>
      <?php
    }
    ?>
  </ul>
  </div>
  <div id="page">
    <h2>Manage Content</h2>
  </div>
</div>
<?php
mysqli_free_result($result);
?>
<?php include("../includes/layouts/footer.php"); ?>

........
<?php
    while($page = mysqli_fetch_assoc($page_set)){
?>
<li><?php echo $page["menu_name"]; ?></li>
<?php
  }
?>
<?php mysqli_free_result($page_set); ?>

.......

<!-- <?php
    $query  = "SELECT * ";
    $query .= "FROM pages ";
    $query .= "WHERE visible = 1 ";
    $query .= "AND wine_id = {$wines["id"]} ";
    $query .= "ORDER BY position ASC";
    $page_set =  mysqli_query($connection, $query);
?> -->


<!-- <?php if($selected_wine_id){ ?>
 <?php $current_wine = find_wine_by_id($selected_wine_id); ?>

  Wine Name: <?php echo $current_wine["wine_name"]; ?>

   <?php } elseif ($selected_page_id) { ?>
    <?php echo $selected_page_id; ?>
     <?php } else { ?>
    SELECT A WINE
    <?php } ?> -->
.............................

<!-- <ul class="vino">
  <?php $wine_set = find_all_wines();
   ?>

<?php while($wines = mysqli_fetch_assoc($wine_set)){ ?>

<?php echo " <li ";
if ($wine["id"] == $selected_wine_id) {
    echo " class=\"selected\"";
  }
  echo ">";
?>
<a href="manage_content.php?wine=
<?php echo urlencode($wines["id"]); ?>">
<?php echo $wines["wine_name"]; ?></a>

<?php $page_set = find_pages_for_wine($wines["id"]); ?>

<ul class="pages">
  <?php while($page = mysqli_fetch_assoc($page_set)){ ?>
    <?php echo " <li ";
      if ($page["id"] == $selected_page_id) {
        echo " class=\"selected\"";
      }
        echo ">";
  ?>
   <a href="manage_content.php?page=
   <?php echo urlencode($page["id"]); ?>">
   <?php echo $page["content"]; ?> </a>
 </li>
    <?php
      }
    ?>
    <?php mysqli_free_result($page_set);?>
</ul>
</li>
<?php
 }
?>
<!-- release return data -->
<?php mysqli_free_result($wine_set); ?>
</ul> -->
,,,,,,,,,,,,,,,,,,,,,

<!-- <?php
  $wine_set = find_all_wines();
  $wine_count = mysqli_num_rows($wine_set);
  for($count=1; $count <= ($wine_count+1); $count ++){
    // echo "<option value=\"{$count}\">{$count}</option>";
  } -->
 ?>
.........................

<?php
if (isset($_POST['submit'])){
  // $page_name = mysql_prep($_post["menu_name"]);
  $wine_id = $_POST["wine_id"];
  $menu_name = (int) $_POST["menu_name"];
  $Position = $_POST["Position"];
  $visible = $_POST["visible"];
  $content= (int) $_POST["content"];


 $query  = "INSERT INTO pages (";
 $query .= "wine_id, menu_name, Position, visible, content";
 $query .= ") VALUES (";
 $query .= " '{$wine_id}', '{$menu_name}', '{$Position}', '{$visible}', '{$content}' ";
 $query .= ")";
 $result =mysqli_query($connection, $query);

 if ($result) {
   $message = "Vinfo Entered";
   redirect_to("/~richardfpetersIII/vintory/public/manage_content.php");
} else {
  $message = "Vinfo Failed";
  redirect_to("/~richardfpetersIII/vintory/public/new_wine.php");
}

} else {
  redirect_to("/~richardfpetersIII/vintory/public/manage_content.php");
}
 ?>

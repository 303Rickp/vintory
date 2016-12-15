<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>

<?php
if (isset($_POST['submit'])){
  // $wine_name = mysql_prep($_POST["wine_name"]);
  $wine_name = $_POST["wine_name"];
  $vintage = (int) $_POST["vintage"];
  $varietal = $_POST["varietal"];
  $wine_maker = $_POST["wine_maker"];
  $bottle_no = (int) $_POST["bottle_no"];
  $rating = $_POST["rating"];
  $menu_name =  $_POST["menu_name"];
  $visible = $_POST["visible"];
  $content=  $_POST["content"];

 $query  = "INSERT INTO wines (";
 $query .= "wine_name, vintage, varietal, wine_maker, bottle_no, rating, menu_name, visible, content";
 $query .= ") VALUES (";
 $query .= " '{$wine_name}', '{$vintage}', '{$varietal}', '{$wine_maker}', '{$bottle_no}', '{$rating}', '{$menu_name}', '{$visible}', '{$content}' ";
 $query .= ")";
 $result = mysqli_query($connection, $query);
// error_log($result);
 if ($result != FALSE) {
   $_SESSION["message"] = "Wine Entered";
   redirect_to("/~richardfpetersIII/vintory/public/new_wine.php");
} else {
  $_SESSION["message"] = "Wine Failed";
  redirect_to("/~richardfpetersIII/vintory/public/new_wine.php");
}

} else {
  redirect_to("/~richardfpetersIII/vintory/public/new_wine.php");
}
 ?>

<?php
if (isset($connection)) { mysqli_close($connection); }
?>

<?php
function redirect_to($new_location){
  header("location:" . $new_location);
  exit;
}

function mysql_prep($string){
  global $connection;
$escaped_string= mysqli_real_escape_string($connection, $string);
return $escaped_string;
}

 function confirm_query($result_set){
   if (!$result_set) {
     die("Database query failed.");
   }
  }

 function find_all_wines() {
   global $connection;
// $safe_subject_id = mysqli_real_escape_string($connection, $wine_id);
   $query  = "SELECT * ";
   $query .= "FROM wines ";
  //  $query .= "WHERE vintage = 2015 ";
   // $query .= "ORDER BY position ASC";
   $wine_set =  mysqli_query($connection, $query);
   return $wine_set;
 }

 function find_pages_for_wine($wine_id) {
   global $connection;

   $query  = "SELECT * ";
   $query .= "FROM pages ";
   $query .= "WHERE visible = 1 ";
   $query .= "AND wine_id = {$wine_id} ";
  //  $query .= "ORDER BY Position ASC";
   $page_set =  mysqli_query($connection, $query);
   return $page_set;
 }

function find_wine_by_id($wine_id){
  global $connection;

$safe_wine_id = mysqli_real_escape_string($connection, $wine_id);

  $query  = "SELECT * ";
  $query .= "FROM wines ";
  $query .= "WHERE id = {$safe_wine_id} ";
  $query .= "LIMIT 1";
  $wine_set =  mysqli_query($connection, $query);
  confirm_query($wine_set);
  if($wine = mysqli_fetch_assoc($wine_set)) {
  return $wine;
  } else {
  return null;
  }
}

function find_page_by_id($page_id){
  global $connection;

$safe_page_id = mysqli_real_escape_string($connection, $page_id);

  $query  = "SELECT * ";
  $query .= "FROM pages ";
  $query .= "WHERE id = {$safe_page_id} ";
  $query .= "LIMIT 1";
  $page_set =  mysqli_query($connection, $query);
  confirm_query($page_set);
  if($page = mysqli_fetch_assoc($page_set)) {
  return $page;
  } else {
  return null;
  }
}



function find_selected_page(){
global $current_wine;
global $current_page;

if(isset($_GET["wine"])) {
  $current_wine =find_wine_by_id($_GET["wine"]);
  $current_page = null;
}elseif(isset($_GET["page"])) {
  $current_wine = null;
  $current_page =find_page_by_id($_GET["page"]);
}else{
  $current_wine = null;
  $current_page = null;
  }

 }



function navigation($wine_array, $page_array) {
  $output = "<ul class=\"wine\">";
  $wine_set = find_all_wines();
   while($wine = mysqli_fetch_assoc($wine_set)){
    $output .=  "<li";
    if ($wine_array && $wine["id"] == $wine_array["id"]) {
      $output .= " class=\"selected\" ";
    }
  $output .=  ">";
  $output .= "<a href=\"manage_content.php?wine=";
  $output .=  urlencode($wine["id"]);
  $output .= "\">";
  $output .=  $wine["wine_name"];
  $output .= "</a>";

  // $page_set = find_pages_for_wine($wine["id"]);
  $output .= "<ul class=\"pages\">";
  // while($page = mysqli_fetch_assoc($page_set)){
   $output .=  " <li ";
    if ($page_array && $page["id"] == $page_array["id"]) {
       $output .=  " class=\"selected\" ";
       }
     $output .=  ">";
     $output .= "<a href=\"manage_content.php?content=true&wine=";
     $output .=  urlencode($wine["id"]);
     $output .= "\">";
     $output .=  "info &rarr;";
     $output .= "</a></li>";
  //  }
    mysqli_free_result($page_set);
  $output .= "</ul></li>";
}
 mysqli_free_result($wine_set);
$output .= "</ul>";
return $output;

}
?>

<?php
session_start();

if (isset($_SESSION["message"])){
 $output = "<div class=\"message\">";
 $output.= $_SESSION["message"];
 $output.=  "</div>";
 return $output;
 }
 ?>

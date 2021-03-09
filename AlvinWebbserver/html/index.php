<?php
  $h1span = "Huvudsida";
  session_start();
  
  header("content-type:text/html; charset=utf-8");
  require "../templates/index-template.php";
?>
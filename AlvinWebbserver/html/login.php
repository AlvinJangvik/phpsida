<?php
  $h1span = "Login";
 
  session_start();
  header("content-type:text/html; charset=utf-8");
  require "../templates/login-template.php";
?>
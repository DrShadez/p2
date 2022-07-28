<?php
session_start();

if(!isset($_SESSION["valid"])){
  header('Location:signin.php');
}

session_destroy();

header('Location:home.php');
?>

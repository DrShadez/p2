<?php
session_start();
if(!isset($_SESSION["adminvalid"])){
  header('Location:signin.php');
}
echo"Admin";
echo "<br>";
echo "<a href='adminuserinfo.php'>user info</a>";
echo "<br>";
echo "<a href='logout.php'>logout</a>";

?>

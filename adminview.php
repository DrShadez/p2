<?php
session_start();
if(!isset($_SESSION["adminvalid"])){
  header('Location:https://atdpsites.berkeley.edu/skshastri/AIC/p2/signin.php');
}
var_dump($_SESSION);
echo"Admin";
echo "<br>";
echo "<a href='adminuserinfo.php'>user info</a>";
echo "<br>";
echo "<a href='logout.php'>logout</a>";

?>

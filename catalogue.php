<?php
session_start();
if(!isset($_SESSION["valid"])){
  header('Location:https://atdpsites.berkeley.edu/skshastri/AIC/p2/signin.php');
}
echo "welcome to catalogue";
echo "<a href=logout.php>logout</a>";



echo "<form action='cart.php' id='bushoption' method='post'>";



echo "<input type='submit' value='save selection'>";
echo "</form>";

?>

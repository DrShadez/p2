<html>
<head>
</head>
<body class = 'haha'>
<ul class="nav">
  <li><a href="home.php">Home </a></li>
  <li><a href="catalogue.php">Cuts</a></li>
  <li><a href="#">Contact</a></li>
  <li><a href="#">About</a></li>
  <li class="logoish"><a  href="home.php">TheCuts</a></li>
</ul>

<?php
session_start();
if(!isset($_SESSION["adminvalid"])){
  header('Location:https://atdpsites.berkeley.edu/skshastri/AIC/p2/signin.php');
}
echo"Admin";
echo "<br>";
echo "<a href='adminuserinfo.php'>user info</a>";
echo "<br>";
echo "<a href='logout.php'>logout</a>";

?>

</body>
</html>

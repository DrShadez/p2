<html>
<head>
</head>
<body class = 'haha'>
<ul class="nav">
  <li><a href="home.php">Home </a></li>
  <li><a href="catalogue.php">Cuts</a></li>
  <li><a href="contact.php">Contact</a></li>
  <li><a href="about.php">About</a></li>
  <li class="logoish"><a  href="home.php">TheCuts</a></li>
</ul>
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
</body>
</html>

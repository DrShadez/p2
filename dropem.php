<!DOCTYPE html>
<?php
//accessing session info
session_start();
require 'config.php';
//if user isn't logged in, redirect to signin
if(!isset($_SESSION["valid"])){
  header('Location:signin.php');
}
try {
  //makes sure that current order only displays the order that the user is currently on by dropping it after they select the buy button
  $dbh = new PDO(DB_DSN, DB_USER, DB_PASSWORD);
  $sth = $dbh -> prepare('DROP TABLE IF EXISTS `current_order`');
  $sth -> execute();
  //uses new .sql file to drop all of the file contents
  $query = file_get_contents('currentorderyyy.sql');
  $dbh->exec($query);
}
catch (PDOException $e){
  echo "<p>Error: {$e->getMessage()}</p>";
}

?>
<html>
<head>
      <link rel="stylesheet" href="p2.css">
</head>
<body>
  <!--navbar config-->
  <ul class="nav">
    <li><a href="home.php">Home </a></li>
    <li><a class="current" href="catalogue.php">Cuts</a></li>
    <li><a href="#">Contact</a></li>
    <li><a href="#">About</a></li>
    <li class="logoish"><a  href="home.php">TheCuts</a></li>
  </ul>
<p>Nothing really to see here. We tracked you down secretly and are sending the package to you<br>
You can go back to doing whatever you were doing now. Your current cart has been used.</p>
<a  href="catalogue.php">Back?</a>

</body>
</html>

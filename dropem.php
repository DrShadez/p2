<!DOCTYPE html>
<?php
session_start();
require 'config.php';
if(!isset($_SESSION["valid"])){
  header('Location:https://atdpsites.berkeley.edu/rmaji/p2/signin.php');
}
try {
  $dbh = new PDO(DB_DSN, DB_USER, DB_PASSWORD);
  $sth = $dbh -> prepare('DROP TABLE IF EXISTS `current_order`');
  $sth -> execute();
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
  <ul class="nav">
 <li><a href="home.php">Home </a></li>
  <li><a href="catalogue.php">Cuts</a></li>
  <li><a href="cart.php">Cart</a></li>
  <li><a href="contact.php">Contact</a></li>
  <li><a href="about.php">About</a></li>
    <li class="logoish"><a  href="home.php">TheCuts</a></li>
  </ul>
<p>Nothing really to see here. We tracked you down secretly and are sending the package to you<br>
You can go back to doing whatever you were doing now. Your current cart has been used.</p>
<a  href="catalogue.php">Back?</a>

</body>
</html>

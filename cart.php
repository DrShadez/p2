<!DOCTYPE html>
<?php
session_start();
require 'config.php';
if(!isset($_SESSION["valid"])){
  header('Location:https://atdpsites.berkeley.edu/rmaji/p2/signin.php');
}
try {
  $dbh = new PDO(DB_DSN, DB_USER, DB_PASSWORD);
  $sth = $dbh -> prepare('SELECT * FROM `bushes`');
  $sth -> execute();
  $bush = $sth -> fetchAll();
}
catch (PDOException $e){
  echo "<p>Error: {$e->getMessage()}</p>";
}
$sphere = $_POST['sphere'];
echo "water";
echo empty($_POST['sphere']);
if (empty($_POST['sphere'])) {
  echo "hesus";

}
else {
  $sth = $dbh -> prepare(
  "INSERT INTO current_order
  (`design`, `img`)

  VALUES('sphere', 'linglong.jpg')");
  $sth -> execute();

}
$spiral = $_POST['spiral'];
if (empty($_POST['spiral'])) {

}
else {
  $sth = $dbh -> prepare(
  "INSERT INTO current_order
  (`design`, `img`)

  VALUES('spiral', 'watersa.jpg')");
  $sth -> execute();
}

$maze = $_POST['maze'];
if (empty($_POST['maze'])) {

}
else {

  $sth = $dbh -> prepare(
  "INSERT INTO `current_order`
  (`design`, `img`)

  VALUES('maze', 'mazebsuh.jpg')");
  $sth -> execute();
}
  $elephant = $_POST['elephant'];
if (empty($_POST['elephant'])) {

}
else {
  $sth = $dbh -> prepare(
  "INSERT INTO `current_order`
  (`design`, `img`)

  VALUES('elephant', 'theelephants.jpg')");
  $sth -> execute();
}
  $heart = $_POST['heart'];
if (empty($_POST['heart'])) {

}
else {
  $sth = $dbh -> prepare(
  "INSERT INTO `current_order`
  (`design`, `img`)

  VALUES('heart', 'heart.jpg')");
  $sth -> execute();

}
  $tall = $_POST['tall'];
if (empty($_POST['tall'])) {

}
else {
  $sth = $dbh -> prepare(
  "INSERT INTO `current_order`
  (`design`, `img`)

  VALUES('tall', 'long.jpg')");
  $sth -> execute();

}
try {
  $dbh = new PDO(DB_DSN, DB_USER, DB_PASSWORD);
  $sth = $dbh -> prepare('SELECT * FROM `current_order`');
  $sth -> execute();
  $orders = $sth -> fetchAll();
}
catch (PDOException $e){
  echo "<p>Error: {$e->getMessage()}</p>";
}
var_dump($orders);
?>
<html>
<head>
      <link rel="stylesheet" href="p2.css">
</head>
<body>
</body>
</html>

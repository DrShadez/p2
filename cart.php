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
$total=0;
$sphere = 35;
if (empty($_POST['sphere'])) {


}
else {
  $sth = $dbh -> prepare(

  "INSERT INTO current_order
  (`design`, `img`, `user`, `cost`)

  VALUES('sphere', 'linglong.jpg', :user, :cost )");
  $sth->bindValue(":user", $_SESSION["user"]);
  $sth->bindValue(":cost", $sphere);
  $sth -> execute();

}
$spiral = 45;
if (empty($_POST['spiral'])) {

}
else {
  $sth = $dbh -> prepare(
  "INSERT INTO current_order
  (`design`, `img`, `user`, `cost`)

  VALUES('spiral', 'watersa.jpg', :user, :cost )");
  $sth->bindValue(":user", $_SESSION["user"]);
  $sth->bindValue(":cost", $spiral);

  $sth -> execute();
}

$maze = 123;
if (empty($_POST['maze'])) {

}
else {

  $sth = $dbh -> prepare(
  "INSERT INTO `current_order`
  (`design`, `img`, `user`, `cost`)

  VALUES('maze', 'mazebsuh.jpg', :user, :cost )");
  $sth->bindValue(":user", $_SESSION["user"]);
    $sth->bindValue(":cost", $maze);
  $sth -> execute();
}
  $elephant = 80;
if (empty($_POST['elephant'])) {

}
else {
  $sth = $dbh -> prepare(
  "INSERT INTO `current_order`
  (`design`, `img`, `user`, `cost`)

  VALUES('elephant', 'theelephants.jpg', :user, :cost )");
  $sth->bindValue(":user", $_SESSION["user"]);
  $sth->bindValue(":cost", $elephant);
  $sth -> execute();
}
  $heart = 60;
if (empty($_POST['heart'])) {

}
else {
  $sth = $dbh -> prepare(
  "INSERT INTO `current_order`
  (`design`, `img`, `user`, `cost`)

  VALUES('heart', 'heart.jpg', :user, :cost )");
  $sth->bindValue(":user", $_SESSION["user"]);
  $sth->bindValue(":cost", $heart);
  $sth -> execute();

}
  $tall = 30;
if (empty($_POST['tall'])) {

}
else {
  $sth = $dbh -> prepare(
  "INSERT INTO `current_order`
    (`design`, `img`, `user`, `cost`)

  VALUES('tall', 'long.jpg', :user, :cost )");
  $sth->bindValue(":user", $_SESSION["user"]);
  $sth->bindValue(":cost", $tall);
  $sth -> execute();

}
try {
  $dbh = new PDO(DB_DSN, DB_USER, DB_PASSWORD);
  $sth = $dbh -> prepare('SELECT * FROM `current_order` WHERE `user`=:sessionid');
  $sth->bindValue(":sessionid", $_SESSION["user"]);
  $sth -> execute();
  $orders = $sth -> fetchAll();
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

  <h3>You ordered...</h3>
  <?php
  foreach ($orders as $order) {

    echo "A/an " . $order['design'] . " cut which costs $" . $order['cost'];
    $total +=$order['cost'];
    echo "<br>";
  }

  echo "Your total amount comes out to $" . $total;



  ?>
  <form action='dropem.php' id='drops' method='POST'>
    <input type='submit' name='buy' id='buy' value='BUY'>
    <a  href="catalogue.php">Back?</a>

  </form>

</body>
</html>

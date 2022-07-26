<!DOCTYPE html>
<?php
//accessing session info
session_start();
require 'config.php';

//if user isn't logged in redirect to login
if(!isset($_SESSION["valid"])){
  header('Location:signin.php');
}
try {
  //query for accessing all of the user's past orders
  $dbh = new PDO(DB_DSN, DB_USER, DB_PASSWORD);
  $sth = $dbh -> prepare('SELECT * FROM `pastorders` WHERE `user`=:sessionid');
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
  <!--nav config-->
<body>
  <ul class="nav">
    <li><a href="home.php">Home </a></li>
    <li><a class="current" href="catalogue.php">Cuts</a></li>
    <li><a href="#">Contact</a></li>
    <li><a href="#">About</a></li>
    <li class="logoish"><a  href="home.php">TheCuts</a></li>
  </ul>

  <h3>You have previously ordered...</h3>
  <?php
  //displaying each order
  foreach ($orders as $order) {

    echo "A/an " . $order['design'] . " cut which costed $" . $order['cost'];
    $total +=$order['cost'];
    echo "<br>";
  }

  echo "You have spent $" . $total . " on our site! Thank you for your contribution.";



  ?>

    <a  href="cart.php">Back To Cart</a>

</body>
</html>

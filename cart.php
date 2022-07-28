<!DOCTYPE html>
<?php

//accessing session info
session_start();
require 'config.php';
//if user isn't logged in, redirect to signin
if(!isset($_SESSION["valid"])){
  header('Location:signin.php');



}
//function for backend validation for each checkbox, so there isn't tons of lines of the same repeated code for each checkbox
function checkboxvalidation($post){
$spherecheckbox=$_POST[$post];
  //if spherechecked's value is the same as the post's value, proceed
  if($spherecheckbox=$post){

  }
//else exit
  else{
    echo"not cool";
    exit;
  }
//large block of function calls
}checkboxvalidation("sphere");
checkboxvalidation('spiral');
checkboxvalidation('maze');
checkboxvalidation('elephant');
checkboxvalidation('heart');
checkboxvalidation('tall');
try {
  $dbh = new PDO(DB_DSN, DB_USER, DB_PASSWORD);
  //accessing info from bushes table
  $sth = $dbh -> prepare('SELECT * FROM `bushes`');
  $sth -> execute();
  $bush = $sth -> fetchAll();
}
catch (PDOException $e){
  echo "<p>Error: {$e->getMessage()}</p>";
}
$total=0;
$sphere = 35;

//backend validation for if the checkbox is empty
if (empty($_POST['sphere'])) {


}

//if it's checked, insert the value into current order as well as past orders
else {
  $sth = $dbh -> prepare(

  "INSERT INTO current_order
  (`design`, `img`, `user`, `cost`)
  VALUES('sphere', 'linglong.jpg', :user, :cost );
  INSERT INTO `pastorders`
    (`design`, `img`, `user`, `cost`)
  VALUES('sphere', 'linglong.jpg', :user, :cost )");
  $sth->bindValue(":user", $_SESSION["user"]);
  $sth->bindValue(":cost", $sphere);
  $sth -> execute();

}
//same code for spiral
$spiral = 45;
if (empty($_POST['spiral'])) {

}
else {
  $sth = $dbh -> prepare(
  "INSERT INTO current_order
  (`design`, `img`, `user`, `cost`)
  VALUES('spiral', 'watersa.jpg', :user, :cost );
  INSERT INTO `pastorders`
    (`design`, `img`, `user`, `cost`)
  VALUES('spiral', 'watersa.jpg', :user, :cost )");
  $sth->bindValue(":user", $_SESSION["user"]);
  $sth->bindValue(":cost", $spiral);

  $sth -> execute();
}
//same code for maze
$maze = 123;
if (empty($_POST['maze'])) {

}
else {

  $sth = $dbh -> prepare(
  "INSERT INTO `current_order`
  (`design`, `img`, `user`, `cost`)
  VALUES('maze', 'mazebsuh.jpg', :user, :cost );
  INSERT INTO `pastorders`
    (`design`, `img`, `user`, `cost`)
  VALUES('maze', 'mazebsuh.jpg', :user, :cost )");
  $sth->bindValue(":user", $_SESSION["user"]);
    $sth->bindValue(":cost", $maze);
  $sth -> execute();
}
//same code for elephant
  $elephant = 80;
if (empty($_POST['elephant'])) {

}
else {
  $sth = $dbh -> prepare(
  "INSERT INTO `current_order`
  (`design`, `img`, `user`, `cost`)
  VALUES('elephant', 'theelephants.jpg', :user, :cost );
  INSERT INTO `pastorders`
    (`design`, `img`, `user`, `cost`)
  VALUES('elephant', 'theelephants.jpg', :user, :cost )");
  $sth->bindValue(":user", $_SESSION["user"]);
  $sth->bindValue(":cost", $elephant);
  $sth -> execute();
}
//same code for heart
  $heart = 60;
if (empty($_POST['heart'])) {

}
else {
  $sth = $dbh -> prepare(
  "INSERT INTO `current_order`
  (`design`, `img`, `user`, `cost`)
  VALUES('heart', 'heart.jpg', :user, :cost );
  INSERT INTO `pastorders`
    (`design`, `img`, `user`, `cost`)
  VALUES('heart', 'heart.jpg', :user, :cost )");
  $sth->bindValue(":user", $_SESSION["user"]);
  $sth->bindValue(":cost", $heart);
  $sth -> execute();

}
//same code for tall
  $tall = 30;
if (empty($_POST['tall'])) {

}
else {
  $sth = $dbh -> prepare(
  "INSERT INTO `current_order`
    (`design`, `img`, `user`, `cost`)
  VALUES('tall', 'long.jpg', :user, :cost );
  INSERT INTO `pastorders`
    (`design`, `img`, `user`, `cost`)
  VALUES('tall', 'long.jpg', :user, :cost )");
  $sth->bindValue(":user", $_SESSION["user"]);
  $sth->bindValue(":cost", $tall);
  $sth -> execute();

}
//displays the current_orders that are specific to that user
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
  <!--navbar config-->
  <ul class="nav">
    <li><a href="home.php">Home </a></li>
      <li><a href="catalogue.php">Cuts</a></li>
      <li><a class="current" href="cart.php">Cart</a></li>
      <li><a href="contact.php">Contact</a></li>
      <li><a href="about.php">About</a></li>
      <li class="logoish"><a  href="home.php">TheCuts</a></li>

  </ul>

  <h3>You ordered...</h3>

  <?php
//code for finding total price and the price of each item that the user selected
  foreach ($orders as $order) {

    echo "A/an " . $order['design'] . " cut which costs $" . $order['cost'];
    $total +=$order['cost'];
    echo "<br>";
  }

  echo "Your total amount comes out to $" . $total;



  ?>
  <!--two buttons send user to a fake loadbingbar-->
  <form action='loadingbar.php' id='drops' method='POST'>
    <input type='submit' name='buy' id='buy' value='BUY'>
    <a  href="pastorders.php">Previous Orders</a>
    <a  href="catalogue.php">Back?</a>

  </form>

</body>
</html>

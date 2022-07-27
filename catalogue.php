<?php
session_start();
require 'config.php';
if(!isset($_SESSION["valid"])){
  header('Location:https://atdpsites.berkeley.edu/skshastri/AIC/p2/signin.php');
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

echo "welcome to catalogue";
echo "<a href=logout.php>logout</a>";


$donut = $bush[0]['img'];
$spiral = $bush[1]['img'];
$maze = $bush[2]['img'];
$elephant = $bush[3]['img'];
$heart = $bush[4]['img'];
$tall = $bush[5]['img'];


echo "<form action='cart.php' id='bushoption' method='post'>";
echo "<div><input type='radio' value='{$donut}'><img src={$donut} alt='donut' width='400' height='400'></div>";
echo "<div><input type='radio' value='{$spiral}'><img src={$spiral} alt='spiral' width='400' height='400'></div>";
echo "<div><input type='radio' value='{$maze}'><img src={$maze} alt='maze' width='400' height='400'></div>";
echo "<div><input type='radio' value='{$spade}'><img src={$spade} alt='spade' width='400' height='400'></div>";
echo "<div><input type='radio' value='{$heart}'><img src={$heart} alt='donut' width='400' height='400'></div>";
echo "<div><input type='radio' value='{$tall}'><img src={$tall} alt='donut' width='400' height='400'></div>";


echo "<input type='submit' value='save selection'>";
echo "</form>";

?>

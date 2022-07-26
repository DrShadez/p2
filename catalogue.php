<?php
session_start();
if(!isset($_SESSION["valid"])){
  header('Location:https://atdpsites.berkeley.edu/skshastri/AIC/p2/signin.php');
}

$dbh = new PDO(DB_DSN, DB_USER, DB_PASSWORD);
$sth = $dbh -> prepare('SELECT * FROM `bushes`');
$sth -> execute();
$bush = $sth -> fetchAll();

echo "welcome to catalogue";
echo "<a href=logout.php>logout</a>";

$donut = $bush[0]['img'];
$spiral = $bush[1]['img'];
$maze = $bush[2]['img'];
$elephant = $bush[3]['img'];
$heart = $bush[4]['img'];
$tall = $bush[5]['img'];


echo "<form action='cart.php' id='bushoption' method='post'>";
echo "<div><input type='radio' value='{$donut}'></div>";
echo "<div><input type='radio' value='{$spiral}'></div>";
echo "<div><input type='radio' value='{$maze}'></div>";
echo "<div><input type='radio' value='{$spade}'></div>";
echo "<div><input type='radio' value='{$heart}'></div>";
echo "<div><input type='radio' value='{$tall}'></div>";


echo "<input type='submit' value='save selection'>";
echo "</form>";

?>

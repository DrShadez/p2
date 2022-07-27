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
?>
<html>
      <link rel="stylesheet" href="p2.css">
</head>
<body>

<ul class="nav">
  <li><a href="home.php">Home </a></li>
  <li><a class="current" href="catalogue.php">Cuts</a></li>
  <li><a href="#">Contact</a></li>
  <li><a href="#">About</a></li>
  <li class="logoish"><a  href="home.php">TheCuts</a></li>
</ul>

<div class="main">
  <h2>dingdong</h2>
  <p>Example wahter</p>




<a href=logout.php>logout</a>

<?php
$donut = $bush[0]['img'];
$spiral = $bush[1]['img'];
$maze = $bush[2]['img'];
$elephant = $bush[3]['img'];
$heart = $bush[4]['img'];
$tall = $bush[5]['img'];


// echo "<form action='cart.php' id='bushoption' method='post'>";
// echo "<div><input type='radio' value='{$donut}'><img src={$donut} alt='donut' width='400' height='400'></div>";
// echo "<div><input type='radio' value='{$spiral}'><img src={$spiral} alt='spiral' width='400' height='400'></div>";
// echo "<div><input type='radio' value='{$maze}'><img src={$maze} alt='maze' width='400' height='400'></div>";
// echo "<div><input type='radio' value='{$spade}'><img src={$spade} alt='spade' width='400' height='400'></div>";
// echo "<div><input type='radio' value='{$heart}'><img src={$heart} alt='donut' width='400' height='400'></div>";
// echo "<div><input type='radio' value='{$tall}'><img src={$tall} alt='donut' width='400' height='400'></div>";
//

// echo "<input type='submit' value='save selection'>";
// echo "</form>";
?>

<div class="optionl">

</div>
<div class="optionl">

</div>

</div>
</body>


<script
  src="https://code.jquery.com/jquery-3.3.1.js"
  integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
  crossorigin="anonymous"></script>
<script src="catalogue.js"></script>
</html>

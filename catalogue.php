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
  //accessing info from bushes table
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

<div class="main">
  <h2>Our Different Cuts</h2>
  <p>Each of our seperate bush cuts are tailored to our customers satisfactions<br>
  We have over 40+ years of experience, so we know what we are doing!</p>



<!--logout-->
<a href=logout.php>logout</a>

<?php
//displaying all the bushes with their corresponding images and values 
$donut = $bush[0]['img'];
$spiral = $bush[1]['img'];
$maze = $bush[2]['img'];
$elephant = $bush[3]['img'];
$heart = $bush[4]['img'];
$tall = $bush[5]['img'];

//very big form that essentially puts all the bushes in checkboxes
echo "<form action='cart.php' id='bushoption' method='post'>";
// echo "<div><input type='radio' value='{$donut}'><img src={$donut} alt='donut' width='400' height='400'></div>";
// echo "<div><input type='radio' value='{$spiral}'><img src={$spiral} alt='spiral' width='400' height='400'></div>";
// echo "<div><input type='radio' value='{$maze}'><img src={$maze} alt='maze' width='400' height='400'></div>";
// echo "<div><input type='radio' value='{$spade}'><img src={$spade} alt='spade' width='400' height='400'></div>";
// echo "<div><input type='radio' value='{$heart}'><img src={$heart} alt='donut' width='400' height='400'></div>";
// echo "<div><input type='radio' value='{$tall}'><img src={$tall} alt='donut' width='400' height='400'></div>";
//

// echo "<input type='submit' value='save selection'>";
 //defines session username
$username=$_SESSION["user"];
 //based on the user that logs in, greets them with their username
echo "<p class='welcome'>Welcome, {$username}</p>";
?>
<div class="choices">




  <div class="optionl">

  </br>
    <div id="content">
          <img src='linglong.jpg' alt='donut' width="300px" height="175px">
      <h3>The Sphere Cut</h3>

      <p>The sphere cut is a type of cut in which the bush is cut in a globe like shape. It truly is simpistic but beautiful.</p>
      <input type="checkbox" id="sphere" name="sphere" value="sphere">
      <label for="sphere"> Add to Cart?</label><br>
    </div>
  </div>



  <div class="optionl">

  </br>
    <div id="content">
          <img src='watersa.jpg' alt='donut' width="300px" height="175px">
      <h3>The Spiral Cut</h3>

      <p>The spiral cut is a type of cut that goes in spiral shape from the ground up. It is more elegant than the sphere cut.</p>
      <input type="checkbox" id="spiral" name="spiral" value="spiral">
      <label for="spiral"> Add to Cart?</label><br>
    </div>
  </div>

  <div class="optionl">

  </br>
    <div id="content">
          <img src='mazebsuh.jpg' alt='donut' width="300px" height="175px">
      <h3>The Maze Trim</h3>

      <p>The maze trim is a trim for a large amount of bushes of the same species. It adds mystery and fun to your garden.</p>
      <input type="checkbox" id="maze" name="maze" value="maze">
      <label for="maze"> Add to Cart?</label><br>
    </div>
  </div>

  <div class="optionl">

  </br>
    <div id="content">
          <img src='theelephants.jpg' alt='donut' width="300px" height="175px">
      <h3>The Elephant Cut</h3>

      <p>The elephant cut is a type of cut that as it says, makes your large bush and elephant. It is an eyecatcher for sure!</p>
      <input type="checkbox" id="elephant" name="elephant" value="elephant">
      <label for="elephant"> Add to Cart?</label><br>
    </div>
  </div>

  <div class="optionl">

  </br>
    <div id="content">
          <img src='heart.jpg' alt='donut' width="300px" height="175px">
      <h3>The Heart Cut</h3>

      <p>The heart cut represents and shows your love for your garden. It can be a beautiful centerpiece standing alone as well!</p>
      <input type="checkbox" id="heart" name="heart" value="heart">
      <label for="heart"> Add to Cart?</label><br>
    </div>
  </div>

    <div class="optionl">

    </br>
      <div id="content">
            <img src='long.jpg' alt='donut' width="300px" height="175px">
        <h3>The Tall Cut</h3>

        <p>The tall cut is a classic cut that is often used as background cut. It is nothing special, but adds a sense of cleanliness.</p>
        <input type="checkbox" id="tall" name="tall" value="tall">
        <label for="tall"> Add to Cart?</label><br>
      </div>
    </div>

<input type='submit' value='save selection'>
</form>





</div>
</div>
</body>
</html>

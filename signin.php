<html>
<head>    <link rel="stylesheet" href="p2.css">

</head>
<body class = 'haha2'>



<ul class="nav">
  <li><a href="home.php">Home </a></li>
  <li><a href="catalogue.php">Cuts</a></li>
  <li><a href="#">Contact</a></li>
  <li><a href="#">About</a></li>
  <li class="logoish"><a  href="home.php">TheCuts</a></li>
</ul>

<p> Explore our variety of bushes </p>
<table><tr><td>
<h1> Sign In </h1>
<?php
session_start();
require 'config.php';

try {
  //dbh configuration
    $dbh = new PDO(DB_DSN, DB_USER, DB_PASSWORD);

//seperate query for getting info from player table
  $sth1 = $dbh->prepare("SELECT * FROM user_info");

    $sth1->execute();
    $userinfo = $sth1->fetchAll();

  //form for first dropdown containing all trainers and catch button
    echo "<div><form action='logincheck.php' id='home' method='post'>";

echo "<div><input type='text' id='username' name='username' placeholder='username'></div>";

echo "<div><input type='password' id='pass' name='pass' placeholder='password'></div>";

echo "<div><input type='submit' class = 'sub' value='login'></div>";
  echo "</form><div>";




}
catch (PDOException $e) {
    echo "<p>Error connecting to database!</p>";
}

?>
</td></tr></table>
<p class = 'center'>Don't have an account? Click Here: <a href = 'signup.php' class = 'button'> SIGN UP </a></p>

</body>
</html>

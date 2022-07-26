<html>
<head>
    <link rel="stylesheet" href="p2.css">
</head>
<body>
    <a href = 'home.php' class = 'button'>Home</a>
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
    echo "<form action='logincheck.php' id='home' method='post'>";

echo "<div><input type='text' id='username' name='username' placeholder='username'></div>";

echo "<div><input type='password' id='pass' name='pass' placeholder='password'></div>";

echo "<div><input type='submit' value='login'></div>";
  echo "</form>";




}
catch (PDOException $e) {
    echo "<p>Error connecting to database!</p>";
}
?>
<p> Don't have an account? Click Here: <a href = 'signup.php' class = 'button'>Sign Up </a>

</body>
</html>

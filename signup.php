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

    echo "<form action='loginstore.php' id='home' method='post'>";

echo "<div><input type='text' id='usernamemake' name='usernamemake' placeholder='Create username'></div>";

echo "<div><input type='password' id='passmake' name='passmake' placeholder='Create password'></div>";

echo "<div><input type='password' id='confirmpass' name='confirmpass' placeholder='Retype password'></div>";

echo "<div><input type='submit' value='signup'></div>";
  echo "</form>";




}
catch (PDOException $e) {
    echo "<p>Error connecting to database!</p>";
}

?>
<p> Already have an account? Click Here: <a href = 'signin.php' class = 'button'>Sign In </a>
</body>
</html>

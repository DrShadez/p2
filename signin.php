<body>

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

echo "<input type='text' id='username' name='username' placeholder='username' required>";

echo "<input type='password' id='pass' name='pass' placeholder='password' required>";

echo "<input type='submit' value='login'>";
  echo "</form>";




}
catch (PDOException $e) {
    echo "<p>Error connecting to database!</p>";
}

?>

</body>

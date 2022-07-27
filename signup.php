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

    echo "<form action='loginstore.php' id='home' method='post'>";

echo "<input type='text' id='usernamemake' name='usernamemake' placeholder='Create username'>";

echo "<input type='password' id='passmake' name='passmake' placeholder='Create password'>";

echo "<input type='password' id='confirmpass' name='confirmpass' placeholder='Retype password'>";

echo "<input type='submit' value='signup'>";
  echo "</form>";

echo"<p> Already have an account? Click Here: <a href = 'signin.php' class = 'button'>Sign In </a>";


}
catch (PDOException $e) {
    echo "<p>Error connecting to database!</p>";
}

?>

</body>

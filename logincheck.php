<body>
<?php
session_start();

$sessionid = $_SESSION["seshid"];

require 'config.php';
try {
  //dbh configuration
    $dbh = new PDO(DB_DSN, DB_USER, DB_PASSWORD);

//seperate query for getting info from player table
  $sth1 = $dbh->prepare("SELECT passhash FROM user_info WHERE username=:enteredusername");
//query for joining all three tables and accessing all columns/rows in tables
    $sth1->bindValue(":enteredusername",$_POST['username']);
    $sth1->execute();
    $userinfo = $sth1->fetchAll();
    $realpass=($userinfo[0]["passhash"]);

    if (isset($userinfo)){
      if(password_verify($_POST['pass'],$realpass)){
        header('Location:https://atdpsites.berkeley.edu/skshastri/AIC/p2/catalogue.php');
      }
      elseif(!password_verify($_POST['pass'],$realpass)){
        echo "wrong username or password";
      }
    }
    else{
      echo "wrong username or password";
    }

echo "<a href='signin.php'>back</a>";


}
catch (PDOException $e) {
    echo "<p>Error connecting to database!</p>";
}

?>

</body>

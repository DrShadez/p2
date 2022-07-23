<body>

<?php
session_start();
require 'config.php';


try {
    $rowid=0;
    $isadmin=1;
    $newpass=password_hash($_POST['passmake'],PASSWORD_DEFAULT);
    var_dump($newpass);
    $newusername=$_POST['usernamemake'];
    var_dump($newusername);
  //dbh configuration
    $dbh = new PDO(DB_DSN, DB_USER, DB_PASSWORD);

//seperate query for getting info from player table
    $sth1 = $dbh->prepare("SELECT * FROM user_info");

    $sth1->execute();
    $userinfo = $sth1->fetchAll();

    $sth2 = $dbh->prepare("INSERT INTO user_info (id, is_admin, passhash, username) VALUES (:id,:is_admin,:passhash,:username)");
    $sth2->bindValue(":id",$rowid);
    $sth2->bindValue(":is_admin",$isadmin);
    $sth2->bindValue(":passhash",$newpass);
    $sth2->bindValue(":username",$newusername);
    $sth2->execute();
    $storeinfo=$sth2->fetchAll();
    
    if (empty($_POST['passmake'])){
      echo "please put a password";
    }
    elseif(empty($_POST['usernamemake'])){
      echo "please put a username";
    }

    elseif(empty($_POST['confirmpass'])){
      echo "please retype your password";
    }

    else{
        header('Location:https://atdpsites.berkeley.edu/skshastri/AIC/p2/catalogue.php');
    }







}
catch (PDOException $e) {
    echo "<p>Error connecting to database!</p>";
}

?>

</body>

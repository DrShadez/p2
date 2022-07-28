<body>
<?php
session_start();

$sessionid = $_SESSION["seshid"];

require 'config.php';



if(empty($_POST['username'])){
  echo "empty username";
  exit;
}

elseif(empty($_POST['pass'])){
  echo "empty password";
  exit;
}

try {
  //dbh configuration
    $dbh = new PDO(DB_DSN, DB_USER, DB_PASSWORD);

//seperate query for getting info from player table
  $sth1 = $dbh->prepare("SELECT * FROM user_info WHERE username=:enteredusername");
//query for joining all three tables and accessing all columns/rows in tables

    $sth1->bindValue(":enteredusername",$_POST['username']);
    $sth1->execute();
    $userinfo = $sth1->fetchAll();
    $realpass=($userinfo[0]["passhash"]);
    $adminuser='admin';
    $isadmin=1;

    $adminsth= $dbh->prepare("SELECT * FROM user_info WHERE `username`=:adminuser AND `is_admin`=:isadmin");
    $adminsth->bindValue(":adminuser",$adminuser);
    $adminsth->bindValue(":isadmin",$isadmin);
    $adminsth->execute();
    $admininfo=$adminsth->fetchColumn();



        if($_POST['username']==$adminuser){
          if(password_verify($_POST['pass'],$realpass)){
            header('Location:adminview.php');
            $_SESSION["adminvalid"]="valid";
        }
        else{
          echo "wrong username or password";
        }
    }




    elseif (isset($userinfo)){
          if(password_verify($_POST['pass'],$realpass)){
            header('Location:catalogue.php');
            $_SESSION["valid"]="valid";
            echo "everything worked";
          }
      elseif(!password_verify($_POST['pass'],$realpass)){
        echo "wrong username or password";
      }
    else{
      echo "wrong username or password";
    }
}

if (isset($_SESSION["user"])) {
  // code...
}
else {
  $_SESSION["user"] = $_POST['username'];
}

echo "<a href='signin.php'>back</a>";


}
catch (PDOException $e) {
    echo "<p>Error connecting to database!</p>";
}

?>

</body>

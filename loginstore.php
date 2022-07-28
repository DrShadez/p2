<body>

<?php
session_start();
require 'config.php';
if(!isset($_SESSION["valid"])){
  header('Location:signin.php');
}
if(empty(htmlspecialchars($_POST['usernamemake']))){
  echo "empty username";
  exit;
}

elseif(empty(htmlspecialchars($_POST['passmake']))){
  echo "empty password";
  exit;
}

elseif(empty(htmlspecialchars($_POST['confirmpass']))){
  echo "empty password";
  exit;
}
try {

  //dbh configuration
    $dbh = new PDO(DB_DSN, DB_USER, DB_PASSWORD);

    $newpass=password_hash(htmlspecialchars($_POST['passmake']),PASSWORD_DEFAULT);

    $newusername=htmlspecialchars($_POST['usernamemake']);




    $sth = $dbh->prepare("SELECT * FROM user_info WHERE username=:newuser");
    $sth->bindValue(":newuser",$newusername);
    $sth->execute();
    $count=$sth->fetchColumn();
    if ($count>1){
      echo "username already taken";
    }



    elseif(empty(htmlspecialchars($_POST['usernamemake']))){
      echo "please put a username";
    }

    elseif (empty(htmlspecialchars($_POST['passmake']))){
      echo "please put a password";
    }

    elseif(empty(htmlspecialchars($_POST['confirmpass']))){
      echo "please retype your password";
    }

    elseif(htmlspecialchars($_POST['passmake'])!=htmlspecialchars($_POST['confirmpass'])){
      echo "passwords don't match";
    }

    else{
      if (htmlspecialchars($_POST['usernamemake']=='admin')){
        $isadmin=1;
      }
      elseif(htmlspecialchars($_POST['usernamemake'])!=='admin'){

        $isadmin=0;
      }

        $sth2 = $dbh->prepare("INSERT INTO `user_info` (is_admin, passhash, username) VALUES (:is_admin,:passhash,:username)");
        $sth2->bindValue(":is_admin",$isadmin);
        $sth2->bindValue(":passhash",$newpass);
        $sth2->bindValue(":username",$newusername);

        $sth2->execute();
        $storeinfo=$sth2->fetchAll();
        header('location:signin.php');
      }









echo "<a href='signup.php'>back</a>";

}
catch (PDOException $e) {
    echo "<p>Error connecting to database!</p>";
}

?>

</body>

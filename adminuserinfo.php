<body>

<?php
session_start();
require 'config.php';
if(!isset($_SESSION["adminvalid"])){
  header('Location:signin.php');
}
if(isset($_SESSION["sessionid"])){

}
else{
  $_SESSION["sessionid"]= $_POST['renameindividual'];
}
try {
    $dbh = new PDO(DB_DSN, DB_USER, DB_PASSWORD);
    //getting multiple row


  $sth = $dbh->prepare("SELECT * FROM user_info");
  $sth->execute();
  $displayinfo=$sth->fetchAll();


  echo "<form action='updateuser.php' id='update' method='POST'>";
  echo "<select id='updateindividual' name='updateindividual'>";

  foreach($displayinfo as $info){
    // var_dump($info);
    $divid=$info['id'];
    // var_dump($divid);

      if($info['username']=='admin'){

      }
      else{
          echo "<option value='{$divid}'>{$info['username']}  . {$info['is_admin']}</option>";
      }

  };
echo "</select>";
echo "<input type='submit' name='deletebtn' id='deletebtn' value='delete '>";

echo "</form>";




echo "<form action='updateuser.php' id='update' method='POST'>";
echo "<select id='renameindividual' name='renameindividual'>";

foreach($displayinfo as $info){
  // var_dump($info);
  $divid=$info['id'];

    if($info['username']=='admin'){

    }
    else{
        echo "<option value='{$divid}'>{$info['username']}  . {$info['is_admin']}</option>";
    }

};
echo "</select>";
echo "<input type='text' name='renamevalue'>";

echo "<input type='submit' name='renamebtn' id='renamebtn' value='rename '>";
echo "</form>";



echo "<form action='updateuser.php' id='add' method='POST'>";

echo "<input type='text' name='adduservalue'>";
echo "<input type='password' name='addpassvalue'>";

echo "<input type='submit' name='addbtn' id='addbtn' value='add '>";
echo "</form>";

}
catch (PDOException $e) {
    echo "<p>Error connecting to database!</p>";
}

?>

</body>

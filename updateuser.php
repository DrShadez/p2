
<?php
//acceessing session info
session_start();
require 'config.php';

//if user isn't an admin, redirect to signin.php
if(!isset($_SESSION["adminvalid"])){
  header('Location:signin.php');
}
try {
    $dbh = new PDO(DB_DSN, DB_USER, DB_PASSWORD);




 //if the delete form is submitted, execute the delete query
if(isset(htmlspecialchars($_POST['deletebtn']))){
  $sth = $dbh->prepare("SELECT * FROM user_info ");
  $sth->execute();
  $information = $sth->fetchAll(); //an array of arrays
  $id=htmlspecialchars($_POST['updateindividual']);
  $sth=$dbh->prepare("DELETE FROM user_info WHERE id=:id ");
  $sth->bindValue(':id',$id);
  if ($sth->execute()==true){
    echo "successfully deleted";
  }

}


$usernameid=htmlspecialchars($_POST['renameindividual']);
$newusername=htmlspecialchars($_POST['renamevalue']);

  
   //if the rename form is submitted, execute the rename query
if (isset(htmlspecialchars($_POST["renameindividual"]))) {
$sth2=$dbh->prepare("UPDATE user_info SET username=:name WHERE id=:id");
  $sth2->bindValue(":name",$newusername );
  $sth2->bindValue(":id", "$usernameid");
  if ($sth2->execute()==true){
    echo "successfully renamed";
}
}

  //when adding a new password, hash the newpass and store the new username
$newpass=password_hash(htmlspecialchars($_POST['addpassvalue']),PASSWORD_DEFAULT);
$newusername=htmlspecialchars($_POST['adduservalue']);
$is_admin=0;
  
  //if the add form is submitted, execute the add query
if (isset(htmlspecialchars($_POST["addbtn"]))) {
$sth4=$dbh->prepare("INSERT INTO user_info (is_admin, passhash, username) VALUES (:is_admin,:passhash,:username)");
  $sth4->bindValue(":is_admin",$is_admin );
  $sth4->bindValue(":passhash",$newpass );
  $sth4->bindValue(":username", "$newusername");
  if ($sth4->execute()==true){
    echo "successfully added";
}
}


  echo "<a href='https://atdpsites.berkeley.edu/skshastri/AIC/p2/adminview.php'>back</a>";
}



catch (PDOException $e) {
    echo "<p>Error connecting to database!</p>";
}
?>

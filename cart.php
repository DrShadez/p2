<?php
session_start();
require 'config.php';

try {
  $dbh = new PDO(DB_DSN, DB_USER, DB_PASSWORD);
  $sth = $dbh -> prepare('SELECT * FROM `current_order`');
  $sth -> execute();
  $currentbush = $sth -> fetchAll();


  $design=$_POST['bushoption'];
  var_dump($design);
  $img=2;
  $sth1 = $dbh -> prepare('INSERT INTO `current_order` (design,img) VALUES(:design,:img) ');
  $sth1->bindValue(":design",$design);
    $sth1->bindValue(":img",$img);
}
catch (PDOException $e){
  echo "<p>Error: {$e->getMessage()}</p>";
}



?>


<?php
session_start();
require 'config.php';


try {
    $dbh = new PDO(DB_DSN, DB_USER, DB_PASSWORD);
    //getting multiple rows
    if(isset())
    $sth = $dbh->prepare("SELECT * FROM user_info ");
    $sth->execute();
    $information = $sth->fetchAll(); //an array of arrays
    $id=$_POST['updateindividual'];
    $sth3=$dbh->prepare("DELETE FROM user_info WHERE id=:id ");
    $sth3->bindValue(':id',$id);
    var_dump($id);

  if ($sth3->execute()==true){
    echo "successfully released :(";
  }


echo "</form>";
  echo "<a href='https://atdpsites.berkeley.edu/skshastri/AIC/p2/adminview.php'>back</a>";
}
catch (PDOException $e) {
    echo "<p>Error connecting to database!</p>";
}
?>

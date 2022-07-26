<body>

<?php
session_start();
require 'config.php';


try {

  //dbh configuration
    $dbh = new PDO(DB_DSN, DB_USER, DB_PASSWORD);

  $sth = $dbh->prepare("SELECT * FROM user_info");
  $sth->execute();
  $displayinfo=$sth->fetchAll();
  $divid=1;
  foreach($displayinfo as $info){
    echo "<br>";
    echo "<div class='div{$divid}'>";
    echo $info['username']  . $info['is_admin'];
    echo "</div>";
    $divid+=1;
  };

}
catch (PDOException $e) {
    echo "<p>Error connecting to database!</p>";
}

?>

</body>

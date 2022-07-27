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

  echo "<form action='updateuser.php' id='update' method='POST'>";
  echo "<select id='updateindividual' name='updateindividual'>";

  foreach($displayinfo as $info){
      if($info['username']=='admin'){

      }
      else{
          echo "<option value='{$divid}'>{$info['username']}  . {$info['is_admin']}</option>";
          $divid+=1;
      }

  };
echo "</select>";
echo "<input type='submit' value='delete '>";

echo "</form>";
}
catch (PDOException $e) {
    echo "<p>Error connecting to database!</p>";
}

?>

</body>

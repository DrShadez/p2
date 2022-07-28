<html>
<head>
</head>
 //navbar config
<body class = 'haha'>
<ul class="nav">
  <li><a href="home.php">Home </a></li>
  <li><a href="catalogue.php">Cuts</a></li>
  <li><a href="contact.php">Contact</a></li>
  <li><a href="about.php">About</a></li>
  <li class="logoish"><a  href="home.php">TheCuts</a></li>
</ul>
<body>

<?php
  
//session starting
session_start();
require 'config.php';
  
//if the user isn't an admin, relocate to signin
if(!isset($_SESSION["adminvalid"])){
  header('Location:signin.php');
}
//if the user has have a sessionid, proceed
if(isset($_SESSION["sessionid"])){

}
//if user doesn't have a sessionid, give them one
else{
  $_SESSION["sessionid"]= $_POST['renameindividual'];
}
try {
    $dbh = new PDO(DB_DSN, DB_USER, DB_PASSWORD);


//accessing all the information in user_info table
  $sth = $dbh->prepare("SELECT * FROM user_info");
  $sth->execute();
  $displayinfo=$sth->fetchAll();

//form for deleting user
  echo "<form action='updateuser.php' id='update' method='POST'>";
  echo "<select id='updateindividual' name='updateindividual'>";
  
  //foreach row in the table, if the user is an admin, don't show them in the dropdown
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



//form for renaming user, same dropdown code
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


//form for adding user, same dropdown code
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
</html>

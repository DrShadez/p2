<!DOCTYPE html>
<html>
<head>

<?php
session_start();

if(!isset($_SESSION["valid"])){
  header('Location:signin.php');



}


?>
</head>
<body>
<style>
#Progress {
  width: 100%;
  background-color: #ddd;
}

#Bar {
  width: 10%;
  height: 30px;
  background-color: #04AA6D;
  text-align: center;
  line-height: 30px;
  color: white;
}
</style>
<div id="Progress">
  <div id="Bar"></div>
</div>

<br>


<script src='loadingbar.js'></script>

</body>
</html>

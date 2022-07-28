<!DOCTYPE html>
<html>
<head>

</head>
<body>
 <!--same-file css to not mess with other css-->
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
 <!--where the "bar" element is defined-->
<div id="Progress">
  <div id="Bar"></div>
</div>

<br>

<!--calling js file to run-->
<script src='loadingbar.js'></script>

</body>
</html>

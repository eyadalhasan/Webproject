<?php
session_start();
if(isset($_POST['name'] )and isset($_POST['password'])){
$_SESSION['name']=$_POST['name'];
header("location:page2.php");
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
  <form action="page1.php" method="POST">
  name<input type="text" name="name">
  <br><br>
  password<input type="text" name="password">
  <button>Continue</button>

  </form>
</body>
</html>
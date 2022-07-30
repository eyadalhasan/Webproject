<?php
if(isset($_REQUEST['fname']) and isset($_REQUEST['lname']) and isset($_REQUEST['phone']) and isset($_REQUEST['email'])){
$db=mysqli_connect("localhost","root","","login");
$query="insert into account(Fname,Lname,email,phone) values(?,?,?,?)";
$fname=$_REQUEST['fname'];
$lname=$_REQUEST['lname'];
$phone=$_REQUEST['phone'];
$email=$_REQUEST['email'];
$statement=$db->prepare($query);
$statement->bind_param("ssss",$fname,$lname,$email,$phone);
$fname=$_REQUEST['fname'];
$lname=$_REQUEST['lname'];
$phone=$_REQUEST['phone'];
$email=$_REQUEST['email'];
$statement->execute();
$statement->close();
$db->close();
header("location:page1.php");
}
if(isset($_REQUEST['fname1']) and isset($_REQUEST['lname1'])){
    
    $db=mysqli_connect("localhost","root","","login");
    $query="select Fname,Lname from account";
    $result=$db->query($query);
    for($i=0;$i<$result->num_rows;$i++){
        $row=$result->fetch_assoc();
        if($_REQUEST['fname1']==$row['Fname'] and $_REQUEST['lname1']==$row['Lname'])
        header("location:page1.php");
    }
}
?>




<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=
    , initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="signup.php">
   <label for="">FirstName</label> <input type="text" name="fname" require>
    <br>
    <br>
    <label for="">LastName<input type="text" name="lname" require>  
    <br>
    <br>
    <label for="">phone<input type="text" name="phone" require>
    <br>
    <br>
    <label for="">email<input type="text" name="email" require> 
    <br><br>
    <button>Continue</button>  
    </form>
<br>
<br>
<form action="signup.php">
   <label for="">FirstName</label> <input type="text" name="fname1" require required>
    <br>
    <br>
    <label for="">LastName<input type="text" name="lname1" required >
    <br><br>
    <button>Continue</button>
     
</form>

</body>
</html>

<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body >
<p id="name">Names</p>
<script>
var x=0;
<?php
$db=mysqli_connect("localhost","root",'',"online_store");
$query="SELECT name FROM customers";     
$result=$db->query($query);
$arr=array();

for($i=0;$i<$result->num_rows;$i++){
$row= $result->fetch_array();
$arr[$i]=$row[$i];
}
?>
function f(){
    var x=<?php count($arr) ;?>;
alert(x); 
}
setInterval(f,1000);

</script>

</body>
</html>






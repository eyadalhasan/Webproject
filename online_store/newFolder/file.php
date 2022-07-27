
<?php
$file=fopen("file.txt","r");
$cotent=fgetcsv($file);
echo $cotent[0];




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
<form action="file.php" method="POST" enctype="multipart/form-data">
<input type="file" name="pic">
<button>Etad</button>


</form>   
</body>
</html>
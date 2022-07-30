<?php

$file=fopen('file.txt','r'); 
 echo fgetc($file) .'<br>';
 echo fgetc($file) .'<br>';

 fseek($file,0,SEEK_SET);
 echo fgets($file,4).'<br>';
 echo fgetcsv($file,',')[0].'<br>';
 fpassthru($file);

 fseek($file,0,SEEK_SET);
 

 
 while(!feof($file)){
    echo fgetc($file);
 }
 echo '<br>';


$file2=fopen('file2.txt','a');
fwrite($file2,'2222222');
fclose($file2);



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
    
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

</head>
<body style="display:grid ;gap: 10px;grid-template-columns: auto auto">
    
 <label for="">bayerName</label>   <input type="text" >
 <label for="">streedAddress</label>   <input type="text">
 <label for="">zip code</label>   <input type="text" onblur="loadDoc('this.value')" name="zip">
 <label for="">city</label>   <input type="text" id="city">
 <label for="">state</label>   <input type="text">

 <button style="width: 50%;">Submit</button>
 


    
</body>

<script>
function loadDoc(zip) {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("city").value =this.responseText;
      
      
      
    }
  };
  xhttp.open("GET", "open.php?zip="+zip, true);
  xhttp.send();
}
</script>


</html>
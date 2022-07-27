<?php

require("php/classes/City.php");

$cat = new City();

$result = $cat->getAll();

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo '<option value= "' . $row['id'] . '"> ' . $row['name'] . ' </option>';
    }
}




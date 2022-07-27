<?php

require('../../../php/classes/Category.php');

$cat = new Category();

$result = $cat->getAll();

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo '<li>  <a href="category.php?id='. $row['id'] .'" style="font-size: 1.77rem;">  ' . $row['name'] . '</a> </li>';
    }
}




<?php

require("../php/classes/Category.php");

$cat = new Category();

$result = $cat->getAll();

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $data = json_encode($row);

        echo '<tr data= "' .   htmlentities($data, ENT_QUOTES, 'UTF-8')  . '">
                    <td class="td_category_name"> ' . $row['name'] . ' </td>
                    <td> ' . $row['count_products'] . ' </td>
                    <td>
                        <a href="#"  class="text-info btn_edit_category"> <i class="fas fa-edit"></i> Edit </a>
                        <a href="#" class="text-danger btn_delete_category ml-3"> <i class="fas fa-trash"></i> Delete </a>
                    </td>
            </tr>';
    }
    echo "</table>";
} else {
    echo '<tr>  <td>  </td> <td> There is no any category </td> <td>  </td> </tr>';
}




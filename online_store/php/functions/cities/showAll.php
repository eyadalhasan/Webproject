<?php

require("../php/classes/City.php");

$cat = new City();

$result = $cat->getAll();

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $data = json_encode($row);

        echo '<tr data= "' .   htmlentities($data, ENT_QUOTES, 'UTF-8')  . '">
                    <td class="td_city_name"> ' . $row['name'] . ' </td>
                    <td>
                        <a href="#"  class="text-info btn_edit_city"> <i class="fas fa-edit"></i> Edit </a>
                        <a href="#" class="text-danger btn_delete_city ml-3"> <i class="fas fa-trash"></i> Delete </a>
                    </td>
            </tr>';
    }
    echo "</table>";
} else {
    echo '<tr>  <td>  </td> <td> There is no any city </td> <td>  </td> </tr>';
}




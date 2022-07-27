<?php

require("../php/classes/Employess.php");

$pro = new Employess();

$result = $pro->getAll();

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $data = json_encode($row);
        echo '<tr data= "' .   htmlentities($data, ENT_QUOTES, 'UTF-8')  . '">
                    <td> ' . $row['ssn'] . ' </td>
                    <td> ' . $row['phone_number'] . ' </td>
                    <td> ' . $row['name'] . ' </td>
                    <td> ' . $row['address'] . ' </td>
                    <td> ' . $row['role'] . ' </td>
                    <td> ' . $row['date_of_birth'] . ' </td>
                    <td>
                        <a href="#"  class="text-info btn_edit_employee"> <i class="fas fa-edit"></i> Edit </a>
                        <a href="#" class="text-danger btn_delete_employee ml-3"> <i class="fas fa-trash"></i> Delete </a>
                    </td>
            </tr>';
    }
    echo "</table>";
} else {
    echo '<tr>  <td>  </td> <td> There is no any employee </td> <td>  </td> </tr>';
}




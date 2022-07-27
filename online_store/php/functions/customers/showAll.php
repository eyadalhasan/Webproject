<?php

require("../php/classes/Customer.php");

$req = new Customer();

$result = $req->getAll();

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $data = json_encode($row);

        echo '<tr data= "' .   htmlentities($data, ENT_QUOTES, 'UTF-8')  . '">
                <td> ' . $row['customer_name'] . ' </td>
                <td> ' . $row['phone_number'] . ' </td>
                <td> ' . $row['name'] . ' </td>
                <td> ' . $row['address'] . ' </td>
                <td> ' . $row['creation_date'] . ' </td>
            </tr>';
    }
    echo "</table>";
} else {
    echo '<tr>  <td>  </td> <td> There is no any customer </td> <td>  </td> </tr>';
}




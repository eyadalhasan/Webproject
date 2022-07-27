<?php

require("../php/classes/Product.php");

$pro = new Product();

$result = $pro->getAll();

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $data = json_encode($row);
        echo '<tr data= "' .   htmlentities($data, ENT_QUOTES, 'UTF-8')  . '">
                    <td> ' . $row['name'] . ' </td>
                    <td> ' . $row['product_name'] . ' </td>
                    <td> ' . $row['description'] . ' </td>
                    <td> ' . $row['original_price'] . ' </td>
                    <td> ' . $row['selling_price'] . ' </td>
                    <td> ' . $row['quantity'] . ' </td>
                    <td> <img src="' . getUrl('images/products/' . $row['image']) . '" style="max-width: 90px;" /> </td>
                    <td> ' . $row['discount'] . ' </td>
                    <td> ' . $row['unit'] . ' </td>
                    <td>
                        <a href="#"  class="text-info btn_edit_product"> <i class="fas fa-edit"></i> Edit </a>
                        <a href="#" class="text-danger btn_delete_product ml-3"> <i class="fas fa-trash"></i> Delete </a>
                    </td>
            </tr>';
    }
    echo "</table>";
} else {
    echo '<tr>  <td>  </td> <td> There is no any category </td> <td>  </td> </tr>';
}




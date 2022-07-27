<?php

require("php/classes/Request.php");

$req = new Request();

$customer_id = $_SESSION['c_id'];
$result = $req->getAll("Where r.customer_id = $customer_id");

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $data = json_encode($row);

        $products = $req->getProducts( $row['id'] );
        $table = '';
        $total_price = 0;
        while($r = $products->fetch_assoc()) {
            $table .= '
                    <tr>
                        <td> ' . $r['name'] . ' </td>
                        <td> ' . $r['product_quantity'] . ' </td>
                        <td> ' . $r['price'] . ' </td>
                        <td> ' . $r['discount'] . '</td>
                        <td> ' . ( $r['price'] - $r['discount'] ) * $r['product_quantity'] . ' </td>
                    </tr>
            ';
            $total_price += ( $r['price'] - $r['discount'] ) * $r['product_quantity'];
        }

        $status = '';
        if ( $row['employee_name'] )
        {
            $status = '<i class="fas fa-check"></i> Recevied';
        }
        else
        {
            $status = 'Not received yet';
        }

        echo '<tr data= "' .   htmlentities($data, ENT_QUOTES, 'UTF-8')  . '">
                <td> ' . $row['customer_name'] . ' </td>
                <td>
                    <table class="table table-bordered bg-white text-black">
                        <tr>
                            <td> Product </td>
                            <td> Quantity </td>
                            <td> Price </td>
                            <td> Discount </td>
                            <td> Total </td>
                        </tr>
                        ' . $table . '
                        <tr>
                            <td></td><td>Total Price : </td> <td> ' . $total_price . ' <i class="fas fa-shekel-sign"></i> </td> <td></td>
                        </tr>
                    </table>
                </td>
                <td> ' . $row['date'] . ' ' . $row['time'] . ' </td>
                <td> ' . $row['note'] . ' </td>
                <td class="emplpyee_name"> ' . $row['employee_name'] . ' </td>
                <td class="status">
                    ' . $status . '
                </td>
            </tr>';
    }
    echo "</table>";
    echo ' <script> document.getElementById("count_requests").innerText = "'. $result->num_rows .'"; </script> ';
} else {
    echo '<tr>  <td>  </td> <td> There is no any request </td> <td>  </td> </tr>';
}




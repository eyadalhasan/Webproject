<?php

require_once("DB.php");

class Request extends DB{

    public $name;

    public function add($data)
    {
        date_default_timezone_set("Asia/Jerusalem");
        extract($data);
        $c_id = $_SESSION['c_id'];
        $date = date('Y-m-d');
        $time = date("h:i:s");
        $products = $_SESSION['cart'];
        $query = "INSERT INTO `online_store`.`requests` (`customer_id`, `date`, `time`,`note`) VALUES ($c_id, '$date', '$time','$note');";
        $this->con->query( $query );
        $req_id = mysqli_insert_id($this->con);

        foreach($products as $k => $v) {
            extract($v);
            $price = $selling_price;
            $query = "INSERT INTO `online_store`.`request_products` (`request_id`, `product_id`, `quantity`, `price`,`discount`) VALUES ($req_id, $id, $request_quantity ,$price , $discount )";
            $this->con->query( $query );
        }

        unset( $_SESSION['cart'] );

        return 1;
    }

    public function update($data)
    {
        header('Content-Type: application/json');
        extract($data);
        $result["type"] = "error";
        $emp_id = $_SESSION['id'];
        $query = "UPDATE `requests` SET `employee_id` = '$emp_id' WHERE `id` = $id";
        // to decrease quantity from products
        if ( $this->con->query( $query ) )
        {
            $query = "SELECT * FROM `request_products` WHERE request_id = $id";
            $r = $this->con->query( $query );
            while ( $row = $r->fetch_assoc()) {
                $product_id = $row['product_id'];
                $quantity = $row['quantity'];

                $qu = "SELECT quantity FROM `online_store`.`products` WHERE  `id`=$product_id";
                $current_quantity = $this->con->query( $qu )->fetch_assoc()['quantity'];

                $q = $current_quantity - $quantity;

                $qu = "UPDATE `online_store`.`products` SET `quantity`='$q' WHERE `id`=$product_id";
                $this->con->query($qu);
            }

            $result["type"] = "success";
            $result["text"] = $_SESSION['name'];
        }
        else
        {
            $result["text"] = "error";
        }
        return json_encode($result);
    }


    public function getAll($where = '')
    {

        $query = "SELECT e.name AS employee_name , c.name AS customer_name , r.id , r.note , r.date , r.time FROM requests r
                LEFT JOIN customers c ON r.`customer_id` = c.`id`   
                LEFT JOIN employees e ON r.`employee_id` = e.`id`
                $where
                ORDER BY r.id DESC";
        return $this->con->query( $query );
    }

    public function getProducts($request_id)
    {
        $query = "SELECT *,request_products.quantity as product_quantity FROM request_products LEFT JOIN products ON products.id = request_products.product_id WHERE request_id=$request_id";
        return $this->con->query( $query );
    }
    public function getNewRequests()
    {

        $query = "SELECT e.name AS employee_name , c.name AS customer_name , r.id , r.note , r.date , r.time FROM requests r
                LEFT JOIN customers c ON r.`customer_id` = c.`id`   
                LEFT JOIN employees e ON r.`employee_id` = e.`id`
                WHERE r.employee_id IS NULL
                ORDER BY r.id DESC";
        return mysqli_num_rows($this->con->query( $query ) );
    }


    public function count($where = 'WHERE 1')
    {
        $query = "SELECT * FROM `requests` $where";
        return mysqli_num_rows($this->con->query($query));
    }

}
<?php

require("DB.php");

class Product extends DB{

    public $name;
    private $result;

    public function add($data,$files)
    {
        header('Content-Type: application/json');

        extract($data);
        extract($files);

        $result["type"] = "error";

        $name = uniqid(rand(), true) . '_' . $image['name'];

        $target = $_SERVER['DOCUMENT_ROOT'] . "/online_store/images/products/" . basename($name);
        $imageTpye = strtolower(pathinfo($target,PATHINFO_EXTENSION));

        $extensions_arr = array("jpg","jpeg","png","gif");

        // Check extension
        if( in_array($imageTpye,$extensions_arr) ) {
            if (move_uploaded_file($image['tmp_name'], $target )) {
                $query = "INSERT INTO `products` (category_id,name,description,image,quantity,original_price,selling_price,discount,unit)
                        VALUES ( $category_id , '$product_name' , '$description' , '$name' , $quantity , $original_price, $selling_price , $discount , '$unit')";
                $this->con->query( $query );
                $result["type"] = "success";
                $result["text"] = mysqli_insert_id($this->con);
            } else {
                $result["text"] = "There is error in add image, please try again";
            }
        }
        else {
            $result["text"] = "You must select a image";
        }

        return json_encode($result);

    }

    public function add_to_cart($data)
    {
        extract($data);

        $query = "SELECT * FROM `products` WHERE id = $id";
        $result = $this->con->query($query);
        if ( $result->num_rows > 0 && isset($_SESSION['c_id']) )
        {
            $product_data = $result->fetch_assoc();
            if ( $quantity <= $product_data['quantity'] )
            {
                $cart;
                if ( isset($_SESSION['cart']) )
                    $cart = $_SESSION['cart'];

                $product_data['request_quantity'] = $quantity;
                $cart["$id"] = $product_data;
                $_SESSION['cart'] = $cart;
                return 1;
            }
        }

        return 0;
    }

    public function get_cart()
    {
        header('Content-Type: application/json');
        return json_encode( $_SESSION['cart'] );

    }

    public function delete_cart($data)
    {
        extract($data);
        $cart = $_SESSION['cart'];
        unset( $cart[$id] );
        $_SESSION['cart'] = $cart;
        return 1;
    }

    public function update($data,$files)
    {
        extract($data);
        extract($files);

        $img = "";
        //image
        if(file_exists($image['tmp_name']) || is_uploaded_file($image['tmp_name'])) {
            $name = uniqid(rand(), true) . '_' . $image['name'];

            $target = $_SERVER['DOCUMENT_ROOT'] . "/online_store/images/products/" . basename($name);
            $imageTpye = strtolower(pathinfo($target,PATHINFO_EXTENSION));

            $extensions_arr = array("jpg","jpeg","png","gif");

            if( in_array($imageTpye,$extensions_arr) ) {
                if (move_uploaded_file($image['tmp_name'], $target )) {
                    $img = ",`image` = '$name'";
                } else {
                    echo "There is error in add image, please try again";
                    return ;
                }
            }
            else {
                echo "You must select a image";
                return ;
            }
        }

        $query = "UPDATE `products` SET `category_id` = '$category_id',
                        `name` = '$product_name',
                        `description` = '$description',
                        `quantity` = $quantity,
                        `original_price` = $original_price,
                        `selling_price` = $selling_price,
                        `discount` = $discount,
                        `unit` = '$unit'
                        $img
                WHERE `id` = $product_id";
        return $this->con->query( $query );
    }

    public function delete($data)
    {
        extract($data);
        $query = "DELETE FROM `online_store`.`products` WHERE `id` = $product_id";
        return $this->con->query( $query );
    }

    public function getAll($limit = '',$where='')
    {
        $query = "SELECT *,`products`.`name` as product_name, `products`.`id` as product_id FROM `products` LEFT JOIN `categories` ON `products`.`category_id` = `categories`.`id` $where ORDER BY `products`.`id` DESC $limit";
        return $this->con->query( $query );
    }

    public function count()
    {
        $query = "SELECT * FROM `products` WHERE 1";
        return mysqli_num_rows($this->con->query($query));
    }


}
<?php

require_once("DB.php");

class Customer extends DB{

    public $name;

    public function add($data)
    {
        extract($data);

        $password = password_hash($password, PASSWORD_BCRYPT);
        $creation_date = date("y-m-d");

        $query = "INSERT INTO `customers` (name,phone_number,city,address,password,creation_date)
                VALUES ( '$name' , '$phone_number' , $city , '$address' , '$password' , '$creation_date')";
        echo $this->con->query( $query );
    }

    public function update($data)
    {
        extract($data);
        $id = $_SESSION['c_id'];
        $password_h = $_SESSION['c_password'];

        if (password_verify($password, $password_h))
        {
            if ( $type == "name" )
            {
                $query = "UPDATE `online_store`.`customers` SET `name`='$name' WHERE  `id`=$id;";
                $_SESSION['c_name'] = $name;
            }
            else if ( $type == "country" )
            {
                $query = "UPDATE `online_store`.`customers` SET `city`='$city' WHERE  `id`=$id;";
            }
            else if (  $type == "address" )
            {
                $_SESSION['c_address'] = $address;
                $query = "UPDATE `online_store`.`customers` SET `address`='$address' WHERE  `id`=$id;";
            }
            else if ($type == "password")
            {
                $new_password = password_hash($new_password, PASSWORD_BCRYPT);
                $query = "UPDATE `online_store`.`customers` SET `password`='$new_password' WHERE  `id`=$id;";
            }

            if ( $this->con->query($query) )
                return 1;
            else
                return "There is error in this operation";
        }
        else
        {
            return "Your password is invalid";
        }


    }

    public function login($data)
    {
        extract($data);
        $query = "SELECT password FROM customers WHERE phone_number = '$phone_number'";
        $result = $this->con->query( $query );

        if ( $result->num_rows )
        {
            $row = $result->fetch_assoc();
            $hashed_password = $row['password'];

            return (password_verify($password, $hashed_password));
        }
        else
        {
            return 0;
        }
    }

    public function getAll()
    {
        $query = "SELECT *,customers.name as customer_name FROM `customers` LEFT JOIN cities ON customers.city = cities.id";
        return $this->con->query( $query );
    }

    public function count()
    {
        $query = "SELECT * FROM `customers` WHERE 1";
        return mysqli_num_rows($this->con->query($query));
    }

    public function getID($phone_number)
    {
        $query = "SELECT customers.id,customers.name,customers.phone_number,customers.address,customers.password,customers.creation_date,cities.name as city_name FROM customers LEFT JOIN cities on cities.id = customers.city WHERE phone_number = $phone_number";
        $result = $this->con->query( $query );
        return $result;
    }



}
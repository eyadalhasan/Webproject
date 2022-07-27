<?php

require("DB.php");

class Employess extends DB{

    public $ssn;
    public $phone_number;
    public $name;
    public $password;
    public $address;
    public $role;
    public $date_of_birth;

    public function login($data)
    {
        extract($data);
        $query = "SELECT password FROM employees WHERE ssn = $ssn";
        $result = $this->con->query( $query );

        $row = $result->fetch_assoc();
        $hashed_password = $row['password'];

        return (password_verify($password, $hashed_password));
    }

    public function getID($ssn)
    {
        $query = "SELECT id,name,role FROM employees WHERE ssn = $ssn";
        $result = $this->con->query( $query );
        return $result;
    }

    public function add($data)
    {
        header('Content-Type: application/json');

        extract($data);

        $result["type"] = "error";

        $password = password_hash($password, PASSWORD_BCRYPT);

        $query = "INSERT INTO `employees` (ssn,phone_number,name,address,role,password,date_of_birth)
                VALUES ( $ssn , '$phone_number' , '$name' , '$address' , '$role' , '$password' , '$date_of_birth')";
//        echo $query;
        if ($this->con->query( $query ))
        {
            $result["type"] = "success";
            $result["text"] = mysqli_insert_id($this->con);
        }
        else
        {
            $result["text"] = "error";
        }
        return json_encode($result);
    }

    public function update($data)
    {
        extract($data);
        $password = password_hash($password, PASSWORD_BCRYPT);
        $query = "UPDATE `employees` SET
                        `ssn` = '$ssn',
                        `phone_number` = '$phone_number',
                        `name` = '$name',
                        `address` = '$address',
                        `role` = '$role',
                        `password` = '$password',
                        `date_of_birth` = '$date_of_birth'
                WHERE `id` = $id";
        return $this->con->query( $query );
    }

    public function delete($data)
    {
        extract($data);
        $query = "DELETE FROM `online_store`.`employees` WHERE `id` = $id";
        return $this->con->query( $query );
    }

    public function getAll()
    {
        $query = "SELECT * FROM employees WHERE 1";
        return $this->con->query( $query );
    }

    public function count()
    {
        $query = "SELECT * FROM `employees` WHERE 1";
        return mysqli_num_rows($this->con->query($query));
    }

}
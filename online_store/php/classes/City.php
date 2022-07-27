<?php

require_once("DB.php");

class City extends DB{

    public $name;

    public function add($data)
    {
        extract($data);
        $query = "INSERT INTO `online_store`.`cities` (`name`) VALUES ( '$name' );";
        $this->con->query( $query );
        return mysqli_insert_id($this->con);
    }

    public function update($data)
    {
        extract($data);
        $query = "UPDATE `cities` SET `name` = '$name' WHERE `id` = $id";
        return $this->con->query( $query );
    }

    public function delete($data)
    {
        extract($data);
        $query = "DELETE FROM `online_store`.`cities` WHERE `id` = $id";
        return $this->con->query( $query );
    }

    public function getAll()
    {
        $query = "SELECT * FROM cities ORDER BY id DESC";
        return $this->con->query( $query );
    }

    public function count()
    {
        $query = "SELECT * FROM `cities` WHERE 1";
        return mysqli_num_rows($this->con->query($query));
    }

}
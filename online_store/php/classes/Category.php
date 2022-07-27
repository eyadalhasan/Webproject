<?php

require_once("DB.php");

class Category extends DB{

    public $name;

    public function add($data)
    {
        extract($data);
        $query = "INSERT INTO `online_store`.`categories` (`name`) VALUES ( '$name' );";
        $this->con->query( $query );
        return mysqli_insert_id($this->con);
    }

    public function update($data)
    {
        extract($data);
        $query = "UPDATE `categories` SET `name` = '$name' WHERE `id` = $id";
        return $this->con->query( $query );
    }

    public function delete($data)
    {
        extract($data);
        $query = "DELETE FROM `online_store`.`categories` WHERE `id` = $id";
        return $this->con->query( $query );
    }

    public function getAll()
    {
        $query = "SELECT `categories`.`id`,`categories`.`name`, COUNT(`products`.`id`) AS count_products FROM `categories`
                    LEFT JOIN `products` ON `categories`.`id` = `products`.`category_id`
                    GROUP BY `categories`.`id`
                    ORDER BY `categories`.`id` DESC";
        return $this->con->query( $query );
    }

    public function count()
    {
        $query = "SELECT * FROM `categories` WHERE 1";
        return mysqli_num_rows($this->con->query($query));
    }

}
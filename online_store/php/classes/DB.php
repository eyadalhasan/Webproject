<?php
error_reporting(E_ERROR );
session_start();

class DB{

    private $server = "localhost";
    private $user = "root";
    private $pass = "";
    private $db = "online_store";
    public $con;

    function __construct(){
        $this->con = new mysqli($this->server , $this->user , $this->pass , $this->db);
        if ( $this->con->connect_error )
            die("Connection failed");
    }

}

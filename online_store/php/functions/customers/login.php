<?php

require("../../classes/Customer.php");

if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {

    $emp = new Customer();

    if ( $emp->login($_POST) )
    {
        $d = $emp->getID($_POST['phone_number'])->fetch_assoc();
        $_SESSION['c_id'] = $d['id'];
        $_SESSION['c_password'] = $d['password'];
        $_SESSION['c_phone_number'] = $_POST['phone_number'];
        $_SESSION['c_address'] = $d['address'];
        $_SESSION['c_creation_date'] = $d['creation_date'];
        $_SESSION['c_city'] = $d['city_name'];
        $_SESSION['c_name'] = $d['name'];
        echo 1;
    }
    else
    {
        echo 0;
    }


}
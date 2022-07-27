<?php

require("../../classes/Employess.php");

if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {

    $emp = new Employess();

    $data = array(
        'ssn' => $_POST['ssn'],
        'password' => $_POST['password']
    );

    if ( $emp->login($data) )
    {
        $d = $emp->getID($data['ssn'])->fetch_assoc();
        $_SESSION['id'] = $d['id'];
        $_SESSION['name'] = $d['name'];
        $_SESSION['role'] = $d['role'];
        $_SESSION['ssn'] = $data['ssn'];
        echo 1;
    }
    else
    {
        echo 0;
    }


}
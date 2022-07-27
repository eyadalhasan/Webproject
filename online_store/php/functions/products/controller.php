<?php
require("../../classes/Product.php");
require("../../classes/Request.php");


$pro = new Product();
$req = new Request();

if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
    // P O S T - Operations
    if ( $_POST['operation_type'] == 'add')
        echo $pro->add( $_POST , $_FILES );
    else if ($_POST['operation_type'] == 'update')
        echo $pro->update( $_POST , $_FILES );
    else if ($_POST['operation_type'] == 'delete')
        echo $pro->delete( $_POST );
    else if ($_POST['operation_type'] == 'add_to_cart')
        echo $pro->add_to_cart( $_POST );
    else if ($_POST['operation_type'] == 'get_cart')
        print_r( $pro->get_cart( $_POST ) );
    else if ($_POST['operation_type'] == 'delete_cart')
        echo ( $pro->delete_cart( $_POST ) );
    else if ($_POST['operation_type'] == 'add_order')
        echo ( $req->add( $_POST ) );
} else if ( $_SERVER['REQUEST_METHOD'] == 'GET' ) {
    // G E T - Operations
    if ($_GET['operation_type'] == 'count')
        echo $pro->count();
}
<?php
require("../../classes/Request.php");

$pro = new Request();
if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
    // P O S T - Operations
    if ( $_POST['operation_type'] == 'add')
        echo $pro->add( $_POST , $_FILES );
    else if ($_POST['operation_type'] == 'update')
        echo $pro->update( $_POST );
    else if ($_POST['operation_type'] == 'delete')
        echo $pro->delete( $_POST );
} else if ( $_SERVER['REQUEST_METHOD'] == 'GET' ) {
    // G E T - Operations
    if ($_GET['operation_type'] == 'count')
        echo $pro->count();
    if ($_GET['operation_type'] == 'count_customer')
        echo $pro->count('WHERE customer_id = ' . $_SESSION['c_id']);
    if ($_GET['operation_type'] == 'count_new')
        echo $pro->getNewRequests();
}
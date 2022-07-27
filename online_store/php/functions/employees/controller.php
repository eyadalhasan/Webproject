<?php
require("../../classes/Employess.php");

$cat = new Employess();

if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
    // P O S T - Operations
    if ( $_POST['operation_type'] == 'add')
        echo $cat->add( $_POST );
    else if ($_POST['operation_type'] == 'update')
        echo $cat->update( $_POST );
    else if ($_POST['operation_type'] == 'delete')
        echo $cat->delete( $_POST );
} else if ( $_SERVER['REQUEST_METHOD'] == 'GET' ) {
    // G E T - Operations
    if ($_GET['operation_type'] == 'count')
        echo $cat->count();
}
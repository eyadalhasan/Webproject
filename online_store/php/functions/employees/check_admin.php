<?php

if ( isset($_SESSION['ssn']) )
{
    if ( $_SESSION['role'] != 'admin' )
        echo "<script> window.location.assign('http://localhost/online_store/dashboard') </script>";

}

?>

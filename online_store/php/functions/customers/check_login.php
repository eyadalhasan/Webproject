<?php
session_start();
$page = basename($_SERVER['PHP_SELF']);

if ( !isset($_SESSION['c_phone_number']) && $page != "login.php" )
{
    header("location: http://localhost/online_store/login.php");
}
else if ( isset($_SESSION['c_phone_number']) && $page == "login.php" )
{
    header("location: http://localhost/online_store/");
}

?>

<?php
session_start();
$page = basename($_SERVER['PHP_SELF']);

if ( !isset($_SESSION['ssn']) && $page != "login.php" )
{
    header("location: http://localhost/online_store/dashboard/login.php");
}
else if ( isset($_SESSION['ssn']) && $page == "login.php" )
{
    header("location: http://localhost/online_store/dashboard/");
}

?>

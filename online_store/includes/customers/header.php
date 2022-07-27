<?php

if ( !isset( $_SESSION ) )
    session_start();
$page = basename($_SERVER['PHP_SELF']);
$list = ['','','','',''];

if ( isset($_SESSION['c_phone_number']) ) {

    $i = 0;
    if ( $page == 'profile.php' )
        $i = 1;
    else if ( $page == 'my_requests.php' )
        $i = 2;
    else if ( $page == 'settings.php' )
        $i = 3;

    $list[$i] = "style = 'border-bottom: 3px solid #17a2b8;'";

    echo '
    <style>

    .nav-item a:hover{
        background-color:#1111;
       color:white;
    }
 

    </style>
    <nav class="navbar navbar-expand-lg navbar-light  bg-white fixed-top" >
    <!--Customer Name -->
    <a class="navbar-brand text-primary" href = "#" >
        <i class="fas fa-user" ></i >
        ' . htmlspecialchars($_SESSION['c_name']) . '
    </a >
    <button class="navbar-toggler" type = "button" data-toggle = "collapse" data-target = "#navbar" >
        <span class="navbar-toggler-icon" ></span >
    </button >

    <div class="collapse navbar-collapse" id = "navbar" >
        <ul class="navbar-nav" >
            <li class="nav-item" >
                <a class="nav-link nav-link-header ml-5" ' . $list[0] . ' href = "index.php" > <i class="fas fa-home" ></i > Home </a >
            </li >
            <li class="nav-item ml-5" >
                <a class="nav-link nav-link-header" ' . $list[1] . ' href = "profile.php" > <i class="fas fa-address-card" ></i > My Profile </a >
            </li >
            <li class="nav-item ml-5" >
                <a class="nav-link nav-link-header" ' . $list[2] . ' href = "my_requests.php" > <i class="fas fa-truck-moving" ></i > My Requests </a >
            </li >
            <li class="nav-item ml-5" >
                <a class="nav-link nav-link-header" ' . $list[3] . ' href = "settings.php" > <i class="fas fa-user-cog" ></i > Settings </a >
            </li >
            <li class="nav-item ml-5" >
                <a class="nav-link nav-link-header" ' . $list[4] . ' href = "php/functions/customers/logout.php" > <i class="fas fa-sign-out-alt" ></i > Logout </a >
            </li >
        </ul >
    </div >

    <a class="nav-link text-primary btnShowCart" href = "" data-toggle = "modal" data-target = ".shopping-modal" >  <i class="fas fa-shopping-cart" ></i > My Cart </a >
</nav >
<br />
';
}
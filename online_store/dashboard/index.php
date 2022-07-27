<?php
    include('../php/functions/employees/check_login.php' );
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include "../includes/head.php"; ?>
    <link rel="stylesheet" href="<?php url('css/dashboard/dashboard.css') ?>">
    <title> Main Page </title>
</head>
<style>

.sidebar{
    background: cornflowerblue;
}
.cat:hover{
    transform: scale(1.05);
    transition: .3s;
}
</style>
<body style="background-color:#131313">

<?php require( _include('dashboard/header.php')); ?>
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="form">
            <h1 style="color:white">  Dashboard </h1>
            <hr>
            <div class="text-left">
                <label style="font-size: 20px;color:aliceblue"> <i class="fas fa-calendar-alt"></i> Date : <?php echo date("Y-m-d")?>  </label>
            </div>
            <div class="card-columns" style="display:grid ;">
                <div class="card bg-primary cat" >
                    <div class="card-body">
                        <div class="row text-white" style="font-size: 20px">
                            <div class="col-sm-4">
                                <i class="fas fa-bars" style="font-size: 35px"></i>
                            </div>
                            <div class="col-sm-8" >
                                Categories ( <?php include getUrl('php/functions/categories/controller.php?operation_type=count'); ?> )
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card bg-danger cat">
                    <div class="card-body">
                        <div class="row text-white" style="font-size: 20px">
                            <div class="col-sm-4">
                                <i class="fas fa-truck-loading" style="font-size: 35px"></i>
                            </div>
                            <div class="col-sm-8" >
                                Products ( <?php include getUrl('php/functions/products/controller.php?operation_type=count'); ?> )
                            </div>
                        </div>
                    </div>
                </div>

             

                <div class="card bg-warning cat" >
                    <div class="card-body">
                        <div class="row text-white" style="font-size: 20px">
                            <div class="col-sm-4">
                                <i class="fas fa-users" style="font-size: 35px"></i>
                            </div>
                            <div class="col-sm-8 " >
                                Customers ( <?php include getUrl('php/functions/customers/controller.php?operation_type=count'); ?> )
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card bg-success cat">
                    <div class="card-body">
                        <div class="row text-white" style="font-size: 20px">
                            <div class="col-sm-4">
                                <i class="fas fa-map-marked" style="font-size: 35px"></i>
                            </div>
                            <div class="col-sm-8" >
                                Cities ( <?php include getUrl('php/functions/cities/controller.php?operation_type=count'); ?> )
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card bg-info cat">
                    <div class="card-body">
                        <div class="row text-white" style="font-size: 20px">
                            <div class="col-sm-4">
                                <i class="fas fa-border-all" style="font-size: 35px"></i>
                            </div>
                            <div class="col-sm-8" >
                                New Requests ( <?php include getUrl('php/functions/requests/controller.php?operation_type=count_new'); ?> )
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card bg-dark cat">
                    <div class="card-body">
                        <div class="row text-white" style="font-size: 20px">
                            <div class="col-sm-4">
                                <i class="fas fa-user-tie" style="font-size: 35px"></i>
                            </div>
                            <div class="col-sm-8" >
                                Employees ( <?php include getUrl('php/functions/employees/controller.php?operation_type=count'); ?> )
                            </div>
                        </div>
                    </div>
                </div>
                

                <div class="card bg-secondary cat">
                    <div class="card-body">
                        <div class="row text-white" style="font-size: 20px">
                            <div class="col-sm-4">
                                <i class="fas fa-border-all" style="font-size: 35px"></i>
                            </div>
                            <div class="col-sm-8" >
                                All Requests ( <?php include getUrl('php/functions/requests/controller.php?operation_type=count'); ?> )
                            </div>
                        </div>
                    </div>
                </div>

          

             
                
            </div>
        </div>
    </div>
</div>

<?php include "../includes/footer.php"; ?>
<script src="<?php url('js/dashboard/dashboard.js') ?>"></script>
</body>
</html>
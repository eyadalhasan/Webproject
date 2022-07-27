<?php
include('../php/functions/employees/check_login.php' );
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include "../includes/head.php"; ?>
    <link rel="stylesheet" href="<?php url('css/dashboard/dashboard.css') ?>">
    <title> Customers - Dashboard</title>
</head>
<style>

.sidebar{
    background: cornflowerblue;
}
td{
    color:white;
}
</style>
<body style="background-color:#131313">

<?php require( _include('dashboard/header.php')); ?>

<div class="row justify-content-center">
    <div class="form">
        <div class="title">
            <h2 style="color:white;"> <i class="fas fa-users mt-3"></i> Customers </h2>
        </div>
        <hr>
        <div>
            <div class="text-left">
                <label class="font-weight-bold" style="color:white;">  Count Of Customers :
                    <span id="count_of_customers"><?php include getUrl('php/functions/customers/controller.php?operation_type=count'); ?></span>
                </label>
            </div>
            <hr>
            <div class="form-group row">
                <div class="col-sm-1">
                    <span style="color:white;"> <i class="fas fa-search"></i> Search : </span>
                </div>
                <div class="col-sm-11">
                    <input type="text" id="input_filter" class="form-control" placeholder="Enter here to search ..." />
                </div>
            </div>
            <hr>
            <div>
                <table class="table table-bordered">
                    <tr>
                        <td> Name </td>
                        <td> Phone number </td>
                        <td> city </td>
                        <td> address </td>
                        <td> creation date </td>
                    </tr>
                    <tbody>
                        <?php include('../php/functions/customers/showAll.php' ); ?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>

<?php include "../includes/footer.php"; ?>
<script src="<?php url('js/dashboard/dashboard.js') ?>"></script>
</body>
</html>
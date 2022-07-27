<?php
include('../php/functions/employees/check_login.php' );
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include "../includes/head.php"; ?>
    <link rel="stylesheet" href="<?php url('css/dashboard/dashboard.css') ?>">
    <title> Requests - Dashboard </title>
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
            <h2 style="color:white;"> <i class="fas fa-border-all mt-3"></i> Requests </h2>
        </div>
        <hr>
        <div>
            <div class="text-left">
                <label class="font-weight-bold" style="color:white;">  Count Of Requests :
                    <span id="count_of_products"><?php include getUrl('php/functions/requests/controller.php?operation_type=count'); ?></span>
                </label>
            </div>
            <hr>
            <div>
                <table class="table">
                    <tr>
                        <td> Customer Name </td>
                        <td> Request </td>
                        <td> Date and Time </td>
                        <td> Note </td>
                        <td> Employee </td>
                        <td> Actions </td>
                    </tr>
                    <tbody id="table_requests">
                        <?php include('../php/functions/requests/showAll.php' ); ?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>


<?php include "../includes/footer.php"; ?>
<script src="<?php url('js/dashboard/dashboard.js') ?>"></script>
<script src="<?php url('js/dashboard/requests.js') ?>"></script>
<script src="<?php url('js/requests/request_class.js') ?>"></script>
</body>
</html>
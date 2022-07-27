<?php include('php/functions/customers/check_login.php' );  ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include "includes/head.php"; ?>
    <link rel="stylesheet" href="css/customers/customer.css">
    <link rel="stylesheet" href="css/customers/product.css">
    <title> My Products </title>
    <style>
              body{
            background-image: url("images/pexels-photo-264502.jpeg");
    height: 100vh;
    display: flex;
    align-items: center;
    text-align: center;
        }

        .container{
            box-shadow: 0 0 12px #131313;

        }
    </style>
</head>
<body style="display: none">

<?php include("includes/customers/header.php"); ?>

<div class="container p-1 mt-5">
    <div class="text-center p-3">
        <h2> <i class="fas fa-truck-moving"></i> My Requests </h2>
        <hr>
        <div class="">
            <div class="float-left">
                <b> Number of Requests : <span id="count_requests"> 0 </span> </b>
            </div>
            <br/>
            <form class="mt-3">
                <div class="form-group row">
                    <div class="col-sm-1"> <b> <i class="fas fa-search"></i> Search </b> </div>
                    <div class="col-sm-11">
                        <input type="text" id="input_filter" class="form-control" placeholder="Search About Your Requests . . .">
                    </div>
                </div>
            </form>
        </div>
        <!-- Requests -->
        <div class="table-responsive">
            <table class="table text-white">
                <tr>
                    <td> Customer Name </td>
                    <td> Request </td>
                    <td> Date and Time </td>
                    <td> Note </td>
                    <td> Employee </td>
                    <td> Status </td>
                </tr>
                <tbody id="table_requests">
                <?php include('php/functions/requests/showCustomer.php' ); ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include "includes/customers/order_form.php"; ?>

<?php include "includes/footer.php"; ?>
<script src="js/customers/customer.js"></script>
<script src="js/products/product_class.js"></script>

</body>
</html>
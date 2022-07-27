<!DOCTYPE html>
<html lang="en">
<head>
    <?php include "includes/head.php"; ?>
    <link rel="stylesheet" href="<?php url('css/customers/customer.css') ?>">
    <link rel="stylesheet" href="<?php url('css/index.css') ?>">
    <title> Main Page </title>
</head>
<style>
    .container{
        margin-bottom: 20px;
        box-shadow: 0 0 10px #131313;
    }
    body{
    background-image: url("images/pexels-photo-264502.jpeg");
    height: 100vh;
    display: flex;
    align-items: center;
    
    }
</style>
<body>

<?php include("includes/customers/header.php"); ?>

<div class="container p-1 mt-5">

    <!-- Products -->
    <div class="products">
        <div class="title">
            <div class="row justify-content-center">
                <h2 id="category_name"> </h2> <br/>
            </div>

            <a class="btn btn-primary" href="index.php"> <i class="fas fa-home"></i> Home </a>

            <div class="form-group row mt-2">
                <div class="col-sm-12">
                </div>
            </div>
        </div>
        <hr>
        <div class="row mt-3">
            <?php include( getUrl("php/functions/categories/showProducts.php?id=".$_GET['id']."") ); ?>
        </div>

    </div>
</div>

<?php include( getUrl("includes/customers/order_form.php") ); ?>

<?php include("includes/footer.php"); ?>
<script src="js/customers/customer.js"></script>

<script src="js/products/product_class.js"></script>

</body>
</html>
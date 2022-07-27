<!DOCTYPE html>
<html lang="en">
<head>
    <?php include "includes/head.php"; ?>
    <link rel="stylesheet" href="css/customers/customer.css">
    <link rel="stylesheet" href="css/customers/product.css">
    <title> Product Name </title>
</head>
<style>
    .container{
        margin-bottom: 20px;
        box-shadow: 0 0 10px #131313;
    }
    body{
    background-image: url("images/pexels-photo-264502.jpeg");
    height: 100vh;
    
    }
    td:nth-child(odd){
        color:#131313;
        font-weight: bolder;
       
    }
    
</style>

<body style="display: none">

    <?php include("includes/customers/header.php"); ?>

    <?php
        require_once("php/classes/Product.php");

        $pro = new Product();
        $id = $_GET['id'];
        $result = $pro->getAll('',"WHERE products.id=$id");
        if ( $result->num_rows < 1 )
            header('location: index.php');
        $result = $result->fetch_assoc();

    ?>

    <div class="container p-1 mt-5">
        <div class="float-left">
            <a href="#" onclick="history.back()" class="btn btn-danger"  style="background:red"> <i class="fas fa-arrow-left"></i> Back </a>
        </div>
        <div class="text-center p-3">
            <img class="btn_show_image" src="images/products/<?php echo $result['image'] ?>">
            <br/>
            <h2> <?php echo $result['product_name'] ?> </h2>
            <hr>
            <table class="table table-bordered bg-white">
                <tr>
                    <td>  Category </td>
                    <td> <?php echo $result['name']; ?> </td>
                </tr>
                <tr>
                    <td class="w-50">  Price </td>
                    <td> <?php echo $result['selling_price'] - $result['discount']; ?> <i class="fas fa-shekel-sign"></i> </td>
                </tr>
                <tr>
                    <td>  Unit </td>
                    <td> <?php echo $result['unit']; ?> </td>
                </tr>
                <tr>
                    <td>  Quantity </td>
                    <td> <?php echo $result['quantity']; ?> </td>
                </tr>
                <tr>
                    <td>  Description </td>
                    <td> <?php echo $result['description']; ?> </td>
                </tr>
            </table>
            <div>
                <!-- Form Add Product To Cart -->
                <form action="<?php echo $_GET['id']; ?>" method="POST" id="form_add_to_cart">
                    <div class="form-group row">
                        <div class="col-sm-2">
                            <span> Quantity : </span><input type="number" class="form-control" id="quantity" name="quantity" value="1" placeholder="Quantity" min="1" max="<?php echo $result['quantity']; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <?php

                            if ( isset($_SESSION['c_phone_number']) )
                            {
                                if ( $result['quantity'] > 0 )
                                    echo '<button class="btn btn-info form-control"> <i class="fas fa-cart-plus"></i> Add To My Cart </button>';
                                else
                                    echo '<b class="text-warning"> There is no quantity available at the moment </b>';
                            }
                            else
                                echo '<p class="text-danger bg-white">You must be logged in first to be able to add to cart</p>';
                        ?>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Zoom Image -->
    <div class="show-image">
        <div class="text-center">
            <img id="show-image" style="max-width: 900px" src="images/product.jfif" />
        </div>
    </div>

    <?php include "includes/customers/order_form.php"; ?>

    <?php include "includes/footer.php"; ?>
    <script src="js/customers/customer.js"></script>
    <script src="js/products/product_class.js"></script>
    <script src="js/products/add_to_cart.js"></script>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include "includes/head.php"; ?>
    <link rel="stylesheet" href="<?php url('css/customers/customer.css') ?>">
    <link rel="stylesheet" href="<?php url('css/index.css') ?>">
    <title>Smart store </title>
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
</style>
<body>
    
    <?php
        include("includes/customers/header.php");
  
    ?>
    <div class="container p-1 mt-5" style="border-radius:5%;">
    
        <div class="title">
            <div class="row">
                <div class="col-sm-5">
                    <h1 style="margin-left: 20px;margin-top: 10px;"> <b> <img src="images/home.gif" width="90" style="border-radius: 10px;"> <span style="font-size: 32px;text-align: center;"> Smart Store</b> </h1>
                </div>
                <div class="col-sm-5"></div>
                <div class="col-sm-2">
                    <?php
                    if ( ! isset($_SESSION['c_phone_number']) )
                        echo ' <a href="login.php" class="text-white"> <b> Login / Register </b> </a> ';
                    ?>

                </div>
            </div>
            <div class="mt-2">
        
            </div>
            <ul class="mt-3">
                <?php include( getUrl('php/functions/categories/showList.php') ); ?>
            </ul>
            <hr>
        </div>

        <!-- Products -->
        <div class="products" >
<!--            <marquee class="ads" direction="left" behavior="" onmouseover="this.stop();" onmouseout="this.start();" style="font-size: 20px; border-bottom: 1px dashed #fff">-->
<!--                <a href="product.php"> <img class="card-img-top img-fluid" src="images/product.jfif" alt="Card image cap"> </a>-->
<!--                <a href="product.php"> <img class="card-img-top img-fluid" src="images/product.jfif" alt="Card image cap"> </a>-->
<!--            </marquee>-->
            <img src="images/n.gif" width="100" style="border-radius:5% ;"> <span style="font-size: 25px"> <b>Last Products : </b> </span>
            <div class="row justify-content-center mt-3">
                <?php include( getUrl('php/functions/products/carousel.php') ); ?>
            </div>

            <div class="mt-5">
                <img src="images/7S7F.gif" style="border-radius: 12px" width="100"> <span style="font-size: 25px"> <b>Products : </b> </span>
            </div>
            <div class="row mt-3">
                <?php include( getUrl('php/functions/products/showRows.php') ); ?>
            </div>
        </div>
        <hr>
        <div class="row justify-content-center mt-3 p-3">
            <p>
                <a href="https://www.facebook.com/Smart-Store-769076626474934/" target="_blank" class="btn btn-primary btn-lg"> <i class="fab fa-facebook"></i> </a>
                <a href="https://instagram.com/smart_store.ps?igshid=YmMyMTA2M2Y=" target="_blank" class="btn btn-warning btn-lg ml-4"> <i class="fab fa-instagram"></i> </a>
                <a href="https://www.youtube.com" target="_blank" class="btn btn-danger btn-lg ml-4"> <i class="fab fa-youtube"></i> </a>
                <a href="https://www.twitter.com" target="_blank" class="btn btn-info btn-lg ml-4" style="background-color: rgb(29, 155, 240)"> <i class="fab fa-twitter-square"></i> </a>
                <br/><br/>
                <label class="text-center" style="font-size: 20px"><i class="fas fa-copyright"></i> <?php echo date('Y'); ?> Smart Store <i class="fas fa-store"></i> </label>
            </p>
        </div>
    </div>

    <?php
        if ( !isset($_SESSION['c_phone_number']) )
        {
            echo
            '
                <!-- Msg Modal -->
                <div id="msg_modal" class="modal fade msg_modal" tabindex="-1" role="dialog">
                    <div class="modal-dialog modal-xl" role="document">
                        <div class="modal-content">
                            <div class="modal-body">
                                <div class="row justify-content-center">
                                    <img src="images/store.gif" width="650">
                                </div>
                                <p">
                                    <p class="text-primary p1" style="display: none; font-size: 33px;"> <b> - Welcome to Palestine Online Store :)</p> </b> 
                                    <p class="text-info p2" style="display: none; font-size: 33px;"> - Login or create an account to order your products </p>
                                </p>
                            </div>
                            <div class="modal-footer msg_footer text-center" style="display: none">
                                <div class="w-100 text-center">
                                    <a href="login.php" class="btn btn-primary w-25">Login/Register</a>
                                    <button type="button" class="btn btn-secondary w-25" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            ';
        }
    ?>

    <?php
        if ( isset($_SESSION['c_phone_number']) )
        {
            include( getUrl("includes/customers/order_form.php") );
        }
    ?>


    <?php include("includes/footer.php"); ?>
    <script>
        $("#msg_modal").modal("show");

        let i = 0;
        a = setInterval(function() {
            if ( i == 1 ){
                $(".p1").show(250);
            } else if ( i == 4 ) {
                $(".p2").show(250);
            } else if ( i == 6) {
                $(".msg_footer").show(250);
                clearInterval(a);
            }
            i++;
        }, 1000);
    </script>
    <script src="js/customers/customer.js"></script>
    <script src="js/products/product_class.js"></script>
</body>
</html>
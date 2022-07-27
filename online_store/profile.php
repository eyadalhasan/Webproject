<?php include('php/functions/customers/check_login.php' );  ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include "includes/head.php"; ?>
    <link rel="stylesheet" href="css/customers/customer.css">
    <link rel="stylesheet" href="css/customers/settings.css">
    <title> My Profile </title>
    <style>
        body{
            background-image: url("images/pexels-photo-264502.jpeg");
    height: 100vh;
    display: flex;
    align-items: center;
        }

        .container{
            box-shadow: 0 0 12px #131313;

        }

    </style>
</head>
<body style="display: none" >

<?php include("includes/customers/header.php"); ?>

<div class="container p-1 mt-5">
    <div class="text-center mt-2">
        <h2> <i class="fas fa-address-card"></i> My Profile </h2>
    </div>
    <div style="border-top: dotted 1px white" ></div>
    <div class="text-center p-5">
        <div class="row">
            <table class="table table-bordered text-white p-5" style="font-size: 20px; font-family: 'Bold Italic Art';">
                <tr>
                    <td class="w-25"> <i class="fas fa-user"></i> Name  </td>
                    <td> <?php echo htmlspecialchars($_SESSION['c_name']) ?> </td>
                </tr>
                <tr>
                    <td class="w-25"> <i class="fas fa-mobile-alt"></i> Phone Number  </td>
                    <td> <?php echo htmlspecialchars($_SESSION['c_phone_number']) ?> </td>
                </tr>
                <tr>
                    <td class="w-25"> <i class="fas fa-map-marked-alt"></i> City  </td>
                    <td> <?php echo htmlspecialchars($_SESSION['c_city']) ?> </td>
                </tr>
                <tr>
                <i class="fas fa-map-marked-alt"></i>
                    <td class="w-25"> <i class="fas fa-map-marked-alt"></i> Address /Location </td>
                    <td> <?php echo htmlspecialchars($_SESSION['c_address']) ?> </td>
                </tr>
                <tr>
                    <td class="w-25"> <i class="fas fa-calendar-alt"></i> Creation Date  </td>
                    <td> <?php echo htmlspecialchars($_SESSION['c_creation_date']) ?> </td>
                </tr>
            </table>
        </div>
    </div>
</div>

<?php include "includes/customers/order_form.php"; ?>

<?php include "includes/footer.php"; ?>
<script src="js/customers/customer.js"></script>
<script src="js/products/product_class.js"></script>
<script src="js/customers/customer_class.js"></script>
</body>
</html>
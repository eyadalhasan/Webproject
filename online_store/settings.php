<?php include('php/functions/customers/check_login.php' );  ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include "includes/head.php"; ?>
    <link rel="stylesheet" href="css/customers/customer.css">
    <link rel="stylesheet" href="css/customers/settings.css">
    <title> Settings </title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
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
    <div class="text-center mt-2">
        <h2> <i class="fas fa-user-cog"></i> Settings </h2>
    </div>
    <hr>
    <div class="text-center p-5">
        <div class="row">
            <div class="col-3">
                <!-- Tab navs -->
                <div class="nav flex-column nav-tabs text-center" id="v-tabs-tab" role="tablist">
                    <a class="nav-link active" id="name-tab" data-toggle="pill"  href="#v-tabs-name"><i class="fas fa-address-card"></i> Username</a>
                    <a class="nav-link mt-4" id="city-tab" data-toggle="pill"  href="#v-tabs-city"><i class="fas fa-map-marker-alt"></i> City</a>
                    <a class="nav-link mt-4" id="address-tab" data-toggle="pill"  href="#v-tabs-address"><i class="fas fa-map-marked-alt"></i> Address</a>
                    <a class="nav-link mt-4" id="password-tab" data-toggle="pill"  href="#v-tabs-password"><i class="fas fa-lock"></i> Password</a>
                </div>
                <!-- Tab navs -->
            </div>

            <div class="col-9">
                <!-- Tab content -->
                <div class="tab-content" id="v-tabs-tabContent">
                    <div class="tab-pane fade show active" id="v-tabs-name" role="tabpanel" >
                        <form action="" method="POST" id="form_update_name">
                            <div class="form-group row">
                                <div class="col-sm-2">
                                    New name
                                </div>
                                <div class="col-sm-10">
                                    <input type="text" name="name" class="form-control" placeholder="Enter new name" required minlength="3">
                                </div>
                            </div>
                            <div class="form-group row mt-4">
                                <div class="col-sm-2">
                                    Your password
                                    
                                </div>
                                <div class="col-sm-10">
                                    
                                <input type="password" name="password" class="form-control" placeholder="Enter your password" required style="display: inline-block;" >
                                <img src="images/2767146.png" alt="" width="20" header="10" style="display:inline-block ;position: relative;top:-31px;float:right;right:20px;cursor: pointer;" onclick="tooglePass(this,1)" >
                                  
                                </div>
                            </div>
                            <div class="form-group  mt-4">
                                <button class="btn btn-success w-25"> <i class="fas fa-save"></i> Save </button>
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane fade show" id="v-tabs-city" role="tabpanel" >
                        <form method="POST" id="form_update_country">
                            <div class="form-group row">
                                <div class="col-sm-2">
                                    New City
                                </div>
                                <div class="col-sm-10">
                                    <select name="city" class="form-control" required>
                                        <?php include('php/functions/cities/showAsOptions.php'); ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row mt-4">
                                <div class="col-sm-2">
                                           Your password
                                </div>
                                <div class="col-sm-10">
                                    <input type="password" name="password" class="form-control" placeholder="Enter your password" required >
                                    <img src="images/2767146.png" alt="" width="20" header="10" style="display:inline-block ;position: relative;top:-31px;float:right;right:20px;cursor: pointer;" onclick="tooglePass(this,3)" >

                                </div>
                            </div>
                            <div class="form-group mt-4">
                                <button class="btn btn-success w-25"> <i class="fas fa-save"></i> Save </button>
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane fade show" id="v-tabs-address" role="tabpanel" >
                        <form id="form_update_address">
                            <div class="form-group row">
                                <div class="col-sm-2">
                                    New Address
                                </div>
                                <div class="col-sm-10">
                                    <textarea class="form-control" name="address" placeholder="Enter new address" required></textarea>
                                </div>
                            </div>
                            <div class="form-group row mt-4">
                                <div class="col-sm-2">
                                    Your password
                                </div>
                                <div class="col-sm-10">
                                    <input type="password" name="password" class="form-control" placeholder="Enter your password" required>
                                    <img src="images/2767146.png" alt="" width="20" header="10" style="display:inline-block ;position: relative;top:-31px;float:right;right:20px;cursor: pointer;" onclick="tooglePass(this,5)" >

                                </div>
                            </div>
                            <div class="form-group mt-4">
                                <button class="btn btn-success w-25"> <i class="fas fa-save"></i> Save </button>
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane fade show" id="v-tabs-password" role="tabpanel" >
                        <form id="form_update_password">
                            <div class="form-group row">
                                <div class="col-sm-2">
                                    Current password
                                </div>
                                <div class="col-sm-10">
                                    <input type="password" name="password" class="form-control" placeholder="Enter current password" required>
                                    <img src="images/2767146.png" alt="" width="20" header="10" style="display:inline-block ;position: relative;top:-31px;float:right;right:20px;cursor: pointer;" onclick="tooglePass(this,6)" >

                                </div>
                            </div>
                            <div class="form-group row mt-4">
                                <div class="col-sm-2">
                                    New password
                                </div>
                                <div class="col-sm-10">
                                    <input type="password" name="new_password" class="form-control" placeholder="Enter new password" minlength="8" required>
                                    <img src="images/2767146.png" alt="" width="20" header="10" style="display:inline-block ;position: relative;top:-31px;float:right;right:20px;cursor: pointer;" onclick="tooglePass(this,7)"  >

                                </div>
                            </div>
                            <div class="form-group mt-4">
                                <button class="btn btn-success w-25"> <i class="fas fa-save"></i> Save </button>
                            </div>
                        </form>
                    </div>
                </div>
                <div id="result">
                </div>
            </div>
        </div>
    </div>
</div>

<?php include "includes/customers/order_form.php"; ?>

<?php include "includes/footer.php"; ?>
<script src="js/customers/customer.js"></script>
<script src="js/products/product_class.js"></script>
<script src="js/customers/customer_class.js"></script>
<script>
      var i=0;
      document.getElementById("image").src="images/2767146.png";
    function tooglePass(x,w){
      i=!i;
      if(i==1){
        x.src="images/2767146.png";
        
        document.getElementsByClassName("form-control")[w].type="password";
      }
      else {
      x.src="images/2767194.png";
      document.getElementsByClassName("form-control")[w].type="text";

    }}
</script>
</body>
</html>
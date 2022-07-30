<?php include('php/functions/customers/check_login.php' );  ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include "includes/head.php"; ?>
    <link rel="stylesheet" href="css/customers/login.css">
    <title> Smart Store </title>
    <style>
                body{
            background-image: url("images/log.jpg");
    height: 100vh;
    display: flex;
    align-items: center;
        }
    </style>
</head>
<body style="display: none">
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="card signup mt-5 mb-30">
            <div class="card-body">
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item" role="presentation"> <a class="nav-link active" id="login-tab" data-toggle="tab" href="#login" role="tab" aria-controls="login" aria-selected="true"><i class="fas fa-sign-in-alt"></i> Login</a> </li>
                    <li class="nav-item" role="presentation"> <a class="nav-link" id="register-tab" data-toggle="tab" href="#register" role="tab" aria-controls="register" aria-selected="false"><i class="fas fa-user-plus"></i> Register</a> </li>
                </ul>

                <div class="tab-content">
                    <!-- Form Login -->
                    <div class="tab-pane fade show active" id="login" role="tabpanel" aria-labelledby="login-tab">
                        <h4 class="mt-4 mb-4">Login</h4>
                        <form method="POST">
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="phone_number">Number Phone</label>
                                    <input type="text" id="phone_number" class="form-control" placeholder="Enter your number phone" required>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="password">Password</label>
                                    <input type="password" id="password" class="form-control" placeholder="Enter your password" required>
                                    <img src="images/2767194.png" alt="" width="20" header="10" style="display:inline-block ;position: relative;top:-31px;float:right;right:20px;cursor: pointer;" onclick="tooglePass(this,1)" id="image" >

                                </div>
                                <div class="form-group col-md-12">
                                    <div class="d-flex flex-wrap justify-content-between align-items-center">
                                        <div class="custom-checkbox d-block"> <label class="custom-control custom-checkbox checkbox-lg"> <input type="checkbox" class="custom-control-input" id="customCheck1">
                                                <div class="custom-control-label" for="customCheck1">Remember Password</div>
                                            </label> </div> 
                                    </div>
                                </div>
                                <div class="w-100" id="result_login"></div>
                            </div>
                            <div class="mt-2 mb-3" > <button class="btn btn-primary full-width ml-14" type="submit" style="text-align: center;">Continue</button> </div>
                        </form>
                    </div>
                    <!-- Form Sign up -->
                    <div class="tab-pane fade" id="register" role="tabpanel" aria-labelledby="register-tab">
                        <h4 class=" mt-4 mb-4">Register</h4>
                        <form action="" method="post">
                            <div class="form-group">
                                <label for="c_name">Name</label>
                                <input type="text" class="form-control" id="c_name" placeholder="Enter your name" required>
                            </div>
                            <div class="form-group">
                                <label for="c_phone_number">Number Phone</label>
                                <input type="text" class="form-control" id="c_phone_number" placeholder="Enter your phone number" required>
                            </div>
                            <div class="form-group">
                                <label for="c_password">Password</label>
                                <input type="password" class="form-control" id="c_password" placeholder="Enter your password" required>
                            </div>
                            <div class="form-group">
                                <label for="c_confirm_password"> Confirm your Password</label>
                                <input type="password" class="form-control" id="c_confirm_password" placeholder="Enter your confirm password" required>
                            </div>
                            <div class="form-group">
                               <label for="c_city">City</label>
                                <select id="c_city" class="form-control" required>
                                    <option value="0" selected="">Choose City</option>
                                    <?php include('php/functions/cities/showAsOptions.php'); ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="c_address">Address</label>
                                <textarea class="form-control" id="c_address" placeholder="Your address"></textarea>
                            </div>

                            <div id="result_register"></div>

                            <hr class="mt-3 mb-4">

                            <div class="col-12">
                                <button class="btn btn-primary mt-3 mt-sm-0" type="submit">Continue</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include "includes/footer.php"; ?>
<script src="js/customers/customer.js"></script>
<script src="js/customers/customer_class.js"></script>
<script src="js/customers/login.js"></script>
<script src="js/customers/register.js"></script>
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
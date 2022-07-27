<?php include('../php/functions/employees/check_login.php' );  ?>
<!DOCTYPE html>
<html lang="en">
<head>
    
    <?php include "../includes/head.php"; ?>
    <link rel="stylesheet" href="<?php url('css/dashboard/dashboard.css') ?>">
    <link rel="stylesheet" href="<?php url('css/dashboard/login.css') ?>">
    <title> Login - Dashboard </title>
</head>
<style>
    body{
        background-image: url("login.jpg");
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
    }
</style>
<body >

<div class="container">
    <div class="row justify-content-center">
        <!-- Form Login -->
        <div class="login mt-5">
            <h4 class="text-center mt-4 mb-4">  LOGIN - DASHBOARD</h4>
            <form action="" method="post" id="login">
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="ssn"> SSN</label>
                        <input type="text" id="ssn" class="form-control" placeholder="Enter your social security number" required>
                    </div>
                    <div class="form-group col-md-12">
                        <label for="password">Password</label>
                        <input type="password" id="password" class="form-control" placeholder="Enter your password" required>
                    </div>
                    <div class="form-group col-md-12">
                        <div class="d-flex flex-wrap justify-content-between align-items-center">
                            <div class="custom-checkbox d-block"> <label class="custom-control custom-checkbox checkbox-lg"> <input type="checkbox" class="custom-control-input" id="customCheck1">
                                    <div class="custom-control-label" for="customCheck1">Remember Password</div>
                        </div>
                    </div>
                    <div class="form-group col-md-12" id="result_login">
                    </div>
                </div>
                <div class="mt-2 mb-3"> <button class="btn btn-primary full-width" type="submit">Continue</button> </div>
            </form>
        </div>
    </div>
</div>

</div>

<?php include "../includes/footer.php"; ?>
<script src="<?php url('js/dashboard/dashboard.js') ?>"></script>
<script src="<?php url('js/employees/employee_class.js') ?>"></script>
<script src="<?php url('js/employees/login.js') ?>"></script>
</body>
</html>
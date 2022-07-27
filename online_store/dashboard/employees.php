<?php include('../php/functions/employees/check_login.php' );  ?>
<?php include('../php/functions/employees/check_admin.php' );  ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include "../includes/head.php"; ?>
    <link rel="stylesheet" href="<?php url('css/dashboard/dashboard.css') ?>">
    <title> Employees - Dashboard </title>
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
<div class="container">
    <div class="row justify-content-center">
        <div class="form">
            <div class="title">
                <h2 style="color:white;"> <i class="fas fa-truck-loading mt-3" ></i> Employees </h2>
            </div>
            <hr>
            <div>
                <div class="text-left">
                    <label class="font-weight-bold" style="color:white;">
                        Count Of Products :
                        <span id="count_of_employees"><?php include getUrl('php/functions/employees/controller.php?operation_type=count'); ?></span>
                    </label>
                    <br/>
                    <a href="#" id="btn_add_new_employee" data-target="#modal_employee" data-toggle="modal" class="text-primary"> <i class="fas fa-plus"></i> Add New Employee </a>
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
                        <thead>
                        <tr>
                            <td> SSN </td>
                            <td> Phone Number </td>
                            <td> Name </td>
                            <td> Address </td>
                            <td> Role </td>
                            <td> Date of birth </td>
                            <td> Actions </td>
                        </tr>
                        </thead>
                        <tbody id="table_employees">
                            <?php include('../php/functions/employees/showAll.php' ); ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</div>


<div class="modal fade" id="modal_employee" tabindex="-1" role="dialog" >
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"> Add / Edit Employee </h4>
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" id="form_employee" method="POST">

                    <div class="form-group">
                        <label for="ssn">SSN : </label>
                        <input type="text" class="form-control" name="ssn" id="ssn" required>
                    </div>

                    <div class="form-group">
                        <label for="phone_number">Phone Number : </label>
                        <input type="text" class="form-control" name="phone_number" id="phone_number">
                    </div>

                    <div class="form-group">
                        <label for="name">Name : </label>
                        <input type="text" class="form-control" name="name" id="name" required>
                    </div>

                    <div class="form-group">
                        <label for="address">Address : </label>
                        <input type="text" class="form-control" name="address" id="address">
                    </div>

                    <div class="form-group">
                        <label for="role">Role : </label>
                        <select class="form-control" name="role" id="role" required>
                            <option value="employee">employee</option>
                            <option value="admin">admin</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="date_of_birth">Date of birth : </label>
                        <input type="date" class="form-control" name="date_of_birth" id="date_of_birth" required>
                    </div>

                    <div class="form-group">
                        <label for="date_of_birth">Password : </label>
                        <input type="password" class="form-control" name="password" id="password" required>
                    </div>

                    <div class="form-group">
                        <button class="btn btn-success w-100"> <i class="fas fa-save"></i> Save </button>
                    </div>


                    <div class="form-group" id="result_form">
                    </div>

                    <input type="reset" id="btn_reset" class="d-none">
                </form>
            </div>
        </div>
    </div>
</div>

<?php include "../includes/footer.php"; ?>
<script src="<?php url('js/dashboard/dashboard.js') ?>"></script>
<script src="<?php url('js/dashboard/employees.js') ?>"></script>
<script src="<?php url('js/employees/employee_class.js') ?>"></script>
</body>
</html>
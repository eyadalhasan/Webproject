<?php include('../php/functions/employees/check_login.php' );  ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include "../includes/head.php"; ?>
    <link rel="stylesheet" href="<?php url('css/dashboard/dashboard.css') ?>">
    <title> Categories - Dashboard </title>
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
                <h2 style="color:white;"> <i class="fas fa-map-marked mt-3" ></i> Cities </h2>
            </div>
            <hr>
            <div>
                <div class="text-left">
                    <label class="font-weight-bold" style="color:white;">  Count Of Cities :
                        <span id="count_of_cities"><?php include getUrl('php/functions/cities/controller.php?operation_type=count'); ?></span>
                    </label>
                    <br/>
                    <a href="#" id="btn_add_new_city" data-target="#modal_city" data-toggle="modal" class="text-primary"> <i class="fas fa-plus"></i> Add New City </a>
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
                            <td> City Name </td>
                            <td> Actions </td>
                        </tr>
                        </thead>
                        <tbody id="table_cities">
                        <?php include('../php/functions/cities/showAll.php' ); ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</div>


<div class="modal fade" id="modal_city" tabindex="-1" role="dialog" >
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">  </h4>
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" id="form_city">
                    <div class="form-group">
                        <label for="category_name">City Name : </label>
                        <input type="text" class="form-control" id="city_name" required>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-success w-100"> <i class="fas fa-save"></i> Save </button>
                        <input type="reset" id="btn_reset" class="d-none">
                    </div>
                    <div class="form-group" id="result_form">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include "../includes/footer.php"; ?>
<script src="<?php url('js/dashboard/dashboard.js') ?>"></script>
<script src="<?php url('js/dashboard/cities.js') ?>"></script>
<script src="<?php url('js/cities/city_class.js') ?>"></script>
</body>
</html>
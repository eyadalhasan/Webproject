<?php include('../php/functions/employees/check_login.php' );  ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include "../includes/head.php"; ?>
    <link rel="stylesheet" href="<?php url('css/dashboard/dashboard.css') ?>">
    <title> Products - Dashboard</title>
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
                <h2 style="color:white;"> <i class="fas fa-truck-loading mt-3"></i> Products </h2>
            </div>
            <hr>
            <div>
                <div class="text-left">
                    <label class="font-weight-bold" style="color:white;">
                        Count Of Products :
                        <span id="count_of_products"><?php include getUrl('php/functions/categories/controller.php?operation_type=count'); ?></span>
                    </label>
                    <br/>
                    <a href="#" id="btn_add_new_product" data-target="#modal_product" data-toggle="modal" class="text-primary"> <i class="fas fa-plus"></i> Add New Product </a>
                </div>
                <hr>
                <div class="form-group row">
                    <div class="col-sm-1">
                        <span style="color:white;"> <i class="fas fa-search"></i> Search: </span>
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
                                <td> Category </td>
                                <td> Product Name </td>
                                <td> Description </td>
                                <td> original_price </td>
                                <td> Selling Price </td>
                                <td> Quantity </td>
                                <td> Image </td>
                                <td> Discount </td>
                                <td> Unit </td>
                                <td> Actions </td>
                            </tr>
                        </thead>
                        <tbody id="table_products">
                            <?php include('../php/functions/products/showAll.php' ); ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</div>


<div class="modal fade" id="modal_product" tabindex="-1" role="dialog" >
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"> Add / Edit Product </h4>
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" id="form_product" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="category_product">Category : </label>
                        <select type="text" class="form-control" name="category_id" id="category_product" required>
                            <?php include('../php/functions/categories/showAsOptions.php'); ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="product_name">Product Name : </label>
                        <input type="text" class="form-control" name="product_name" id="product_name" required>
                    </div>
                    <div class="form-group">
                        <label for="description">Description : </label>
                        <textarea class="form-control" placeholder="" name="description" id="description"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="original_price">Original Price : </label>
                        <input type="number" class="form-control" name="original_price" id="original_price" required>
                    </div>
                    <div class="form-group">
                        <label for="selling_price">Selling Price : </label>
                        <input type="number" class="form-control" name="selling_price" id="selling_price" required>
                    </div>
                    <div class="form-group">
                        <label for="quantity">Quantity : </label>
                        <input type="number" class="form-control" name="quantity" id="quantity" required>
                    </div>
                    <div class="form-group">
                        <label for="product_image">Image : </label>
                        <input type="file" class="form-control" name="image" id="product_image" onchange="loadFile(event)">
                    </div>
                    <div class="form-group">
                        <label for="discount">Discount : </label>
                        <input type="number" class="form-control" name="discount" id="discount">
                    </div>
                    <div class="form-group">
                        <label for="discount">Unit : </label>
                        <input type="text" class="form-control" name="unit" id="unit">
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
<script src="<?php url('js/dashboard/products.js') ?>"></script>
<script src="<?php url('js/products/product_class.js') ?>"></script>
</body>
</html>
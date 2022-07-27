<?php

require("../../../php/classes/Product.php");

$pro = new Product();

$id = $_GET['id'];
$result = $pro->getAll('', "WHERE categories.id=$id");

if ($result->num_rows > 0) {
    $name = '';
    while ($row = $result->fetch_assoc()) {
        $name = $row['name'];
        $discount = $row['selling_price'] . ' <i class="fas fa-shekel-sign"></i>';
        if ( $row['discount'] != 0 )
        {
            $new_price = $row['selling_price'] - $row['discount'];
            $discount = '<del>' . $row['selling_price'] . ' </del> ' . $new_price . ' <i class="fas fa-shekel-sign"></i>';
        }
        echo '
        <style>
.card{
    box-shadow:0 0 12px red;
}
.card:hover{
    transform:scale(1.1);}

        </style>
        <div class="col-sm-3">
            <div class="card product p-3">
                <img class="card-img-top img-fluid" src="images/products/'. $row['image'] .'" alt="Card image cap">
                <div class="card-block mt-3">
                    <h5 class="card-title"> <label> ' . $row['product_name'] . ' </label> </h5>
                    <hr>
                    <p class="card-text">
                        <label class="text-danger">Price: ' . $discount . '</label> <br/>
                        <label class="text-info">Quantity Available:  '. $row['quantity'] . '</label>
                    </p>
                    <div class="text-center">
                        <a href="product.php?id='. $row['product_id'] .'" class="btn btn-success" style="background:red;"> <i class="fas fa-external-link-square-alt" ></i> Show More  </a>
                    </div>
                </div>
            </div>
        </div>
        ';
    }

    echo '<script> document.getElementById("category_name").innerText = "' . $name . '"; </script>';
}
else
{
    echo '
        <div class="col-sm-2"></div>
        <div class="col-sm-8">
            <div class="alert alert-danger w-100"> There is no any products in this category </div>
        </div>
    ';
}


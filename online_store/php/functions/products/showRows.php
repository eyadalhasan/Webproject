<?php

require("../../../php/classes/Product.php");

$pro = new Product();

$result = $pro->getAll();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $discount = $row['selling_price'] . ' <i class="fas fa-shekel-sign"></i>';
        if ( $row['discount'] != 0 )
        {
            $new_price = $row['selling_price'] - $row['discount'];
            $discount = '<del>' . $row['selling_price'] . ' </del> ' . $new_price . ' <i class="fas fa-shekel-sign"></i>';
        }
        echo '
        <style>
        .card{

            border-radius:6.666%;
            box-shadow:0 0 12px red;
        }
        .card:hover{
            transform:scale(1.1);
            box-shadow:0 0 12px black;
        }
      
        </style>
        <div class="col-sm-3">
            <div class="card p-3">
                <img class="card-img-top img-fluid" src="images/products/'. $row['image'] .'" alt="Card image cap">
                <div class="card-block mt-3">
                    <h5 class="card-title"> <label> ' . $row['product_name'] . ' </label> </h5>
                    <hr>
                    <p class="card-text">
                        <label class="text-danger">Price: ' . $discount . '</label> <br/>
                        <label class="text-info" > Available Quantity:  '. $row['quantity'] . '</label>
                    </p>
                    <div class="text-center">
                        <a href="product.php?id='. $row['product_id'] .'" class="btn btn-success" style="background-color:red;"> <i class="fas fa-external-link-square-alt" style=""></i> More Info </a>
                    </div>
                </div>
            </div>
        </div>
        ';
    }
}


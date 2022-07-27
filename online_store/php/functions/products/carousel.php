<div id="carouse" class="carousel slide" data-ride="carousel">

<?php

require("../../../php/classes/Product.php");

$pro = new Product();

$result = $pro->getAll('LIMIT 0,5');
$i = 1;
if ($result->num_rows > 0) {
    echo '<ol class="carousel-indicators"> <li data-target="#carouse" data-slide-to="0" class="active"></li>';
    while ($row = $result->fetch_assoc()) {
        echo '
            <li data-target="#carouse" data-slide-to="' . ( $i++ ) . '"></li>
        ';
    }
    echo '</ol>';

    $result = $pro->getAll('LIMIT 0,5');
    $first = $result->fetch_assoc();
    $discount = $first['selling_price'] . ' <i class="fas fa-shekel-sign"></i>';
    if ( $row['discount'] != 0 )
    {
        $new_price = $first['selling_price'] - $first['discount'];
        $discount = '<del>' . $row['selling_price'] . ' </del> ' . $new_price . ' <i class="fas fa-shekel-sign"></i>';
    }
    echo '<div class="carousel-inner">';
    echo '
            <div class="carousel-item active">
                <img class="d-block w-100" src="images/products/' . $first['image'] . '" height="500" alt="First slide">
                <div class="carousel-caption d-none d-md-block">
                    <h5> ' . $first['product_name'] . ' </h5>
                    <p>
                        ' . $discount . '
                        <br/>
                        <a href="product.php?id='. $first['product_id'] .'" class="btn btn-info btn-sm mt-3"> More Information </a>
                    </p>
                </div>
            </div>
        ';


    while ($row = $result->fetch_assoc()) {
        $discount = $row['selling_price'] . ' <i class="fas fa-shekel-sign"></i>';
        if ( $row['discount'] != 0 )
        {
            $new_price = $row['selling_price'] - $row['discount'];
            $discount = '<del>' . $row['selling_price'] . ' </del> ' . $new_price . ' <i class="fas fa-shekel-sign"></i>';
        }
        echo '
            <div class="carousel-item">
                <img class="d-block w-100" src="images/products/' . $row['image'] . '" height="500" alt="First slide">
                <div class="carousel-caption d-none d-md-block">
                    <h5> ' . $row['product_name'] . ' </h5>
                    <p>
                        ' . $discount . '
                        <br/>
                        <a href="product.php?id='. $row['product_id'] .'" class="btn btn-info btn-sm mt-3"> More Information </a>
                    </p>
                </div>
            </div>
        ';
    }
    echo '</div>';
}
?>

 
    <a class="carousel-control-prev" href="#carouse" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouse" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>

</div>

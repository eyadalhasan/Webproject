<!-- Shopping Cart -->

<div class="modal fade shopping-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content p-3">
            <div>
                <h4> <i class="fas fa-shopping-cart"></i> Shopping Cart </h4>
            </div>
            <hr>
            <div class="w-100">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th> Product</th>
                        <th> Picture</th>
                        <th> Quantity </th>
                        <th> Price </th>
                        <th> Total Price </th>
                        <th>  </th>
                    </tr>
                    </thead>
                    <tbody id="cart">

                    </tbody>
                </table>
                <hr>
                <div class="row">
                    <div class="col-sm-3">
                        <b> Total Price : <span id="total_price"></span> <i class="fas fa-shekel-sign"></i> </b>
                    </div>
                    <div class="col-sm-3">
                        <a href="#" class="btn btn-success" data-toggle="modal" data-target=".order-modal"> <i class="fas fa-cart-arrow-down"></i> Order Now </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Order Form -->
<div class="modal fade order-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content p-3">
            <div>
                <h4> <i class="fas fa-cart-arrow-down"></i> Order Form </h4>
            </div>
            <hr>
            <div class="w-100">
                <form action="" method="POST" id="form_order">
                    <div class="form-group row">
                        <div class="col-sm-2">
                            <i class="fas fa-sticky-note"></i> Notes :
                        </div>
                        <div class="col-sm-10">
                            <textarea name="note" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <ul style="list-style-type: square;">
                            <li> We will contact you within 24 hours to confirm the order</li>
                            <li> Paiement will be cash when recieving </li>
                            <li> 2-7 days for receving your order and we will call you before</li>
                            <li> The request cannot be undone </li>
                        </ul>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-info w-100" style="background-color:green ;"> <i class="fas fa-truck-moving"></i> Order Now </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
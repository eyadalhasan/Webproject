$(document).ready(function (){
      $("body").show(600);

      $(".btnShowCart").on('click', function (e){
            e.preventDefault();
            getProducts();
      });

      $("body").on('click', '.btnDeleteCartRow' ,function (e){
            e.preventDefault();

            let data = new FormData();
            let id = $(this).attr('href');
            let cart = $(this).closest('.cart_row');
            p = new Product(data);
            data.append('id',id);
            let result = p.request("delete_cart").then(result => {
                  if ( result == '1')
                  {
                        getProducts();
                        cart.hide();
                  }
                  else
                        alert("There is error in this operation");
            });

      })

      $("#form_order").on('submit', function (e){
            e.preventDefault();
            let data = new FormData(this);
            p = new Product(data);
            let result = p.request("add_order").then(result => {
                  if ( result == '1')
                  {
                        window.location.assign('my_requests.php');
                  }
                  else
                        alert("There is error in this operation");
            });
      });

      $("#input_filter_product").keyup(function () {
            let value = this.value.toLowerCase().trim();
            $(".card").each(function (index) {
                  if (!index) return;
                  $(this).find(".card-title").each(function () {
                        var id = $(this).text().toLowerCase().trim();
                        var not_found = (id.indexOf(value) == -1);
                        $(this).closest('.card').toggle(!not_found);
                        return not_found;
                  });
            });
      });

      $("#form_update_name").on('submit', function (e){
         e.preventDefault();
         let data = new FormData(this);
         update(data,"name");
      });
      $("#form_update_country").on('submit', function (e){
            e.preventDefault();
            let data = new FormData(this);
            update(data,"country");
      });
      $("#form_update_address").on('submit', function (e){
            e.preventDefault();
            let data = new FormData(this);
            update(data,"address");
      });
      $("#form_update_password").on('submit', function (e){
            e.preventDefault();
            let data = new FormData(this);
            update(data,"password");
      });



      function getProducts()
      {
            let data = new FormData();
            p = new Product(data);
            $("#cart").html('');

            let result = p.request("get_cart").then(result => {
                  if ( result )
                  {
                        let total_price = 0;
                        Object.keys(result).forEach(key => {
                              let price = result[key].selling_price - result[key].discount;
                              total_price += price * result[key].request_quantity;
                              $("#cart").append(`
                              <tr class="cart_row">
                                    <td> ${ result[key].name } </td>
                                    <td> <img class="card-img-top img-fluid" src="images/products/${ result[key].image }" style="max-width: 90px"> </td>
                                    <td> ${ result[key].request_quantity } </td>
                                    <td> ${ price } </td>
                                    <td> ${ price * result[key].request_quantity } </td>
                                    <td>
                                        <a href="${ result[key].id }" class="text-danger btnDeleteCartRow"> <i class="fas fa-trash"></i> Delete </a>
                                    </td>
                               </tr>
                              `);
                        });
                        $("#total_price").text( total_price );
                  }
            });
      }

      function update(data , type)
      {
            c = new Customer(data);
            data.append("type", type);
            let result = c.request("update").then(result => {
                  if ( result == '1')
                  {
                        window.location.reload();
                  }
                  else
                        $("#result").html(` <div class="alert alert-danger"> ${result} </div> `);
            });
      }
});
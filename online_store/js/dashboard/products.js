$(document).ready(function (){

    let type; // type of operation in form [ add , edit ]
    let tr; // tr that processing currently

    let img;

    $("#btn_add_new_product").on('click', function (e){
        e.preventDefault();
        $("#btn_reset").click();
        type = "add";
        $(".modal-title").text('Add New Product');
    });

    $("body").on('click', '.btn_edit_product' , function (e){
        e.preventDefault();
        $("#btn_reset").click();
        type = "update";

        tr = $(this).closest('tr');
        let data = JSON.parse($(this).closest('tr').attr('data'));

        img = (data.image);

        //put data in form
        $(".modal-title").text('Edit Product - ' + data.product_name);
        $("#form_product").attr('action', data.product_id);
        fillForm(data);
        $('.modal').modal('show');
    });

    $("#form_product").on('submit', function (e) {
        e.preventDefault();
        let form = $(this);
        let data = new FormData(this);

        data.append('name', $("#category_product option:selected").text());

        let c;
        //add operation
        if (type == "add") {
            pro = new Product( data );
            pro.request(type).then(result => {
                if ( result.type === 'success' ){
                    data.append('product_id',result.text);
                    data.image = '';
                    data.append('image',url_image);
                    img = url_image;
                    $("#table_products").prepend( makeRow( conv_formData_object(data) ));
                    $("#count_of_products").text( parseInt($("#count_of_products").text()) + 1 );

                    $('.modal').modal('hide');
                    $("#btn_reset").click();
                } else {
                    $("#result_form").html(`<div class="alert alert-danger"> ${ result.text } </div>`);
                }
            });
        //edit operation
        } else if (type == "update") {
            data.append('product_id',form.attr('action'));
            pro = new Product( data );
            pro.request(type).then(result => {
                if ( result === '1' ){
                    if ($('#product_image').val() != '')
                    {
                        img = url_image
                    }
                    console.log(img);
                    data.append('image', img);
                    tr.replaceWith( makeRow( conv_formData_object(data) ) );
                    $('.modal').modal('hide');
                    $("#btn_reset").click();
                } else {
                    $("#result_form").html(`<div class="alert alert-danger">There is error in edit operation</div>`);
                }
            });
        }


    });

    //delete category
    $("body").on('click', '.btn_delete_product' , function (e){
        e.preventDefault();
        if ( confirm("Are you sure delete this ? ") ) {
            tr = $(this).closest('tr');
            let data = JSON.parse($(this).closest('tr').attr('data'));
            var form_data = new FormData();
            for ( var key in data ) {
                form_data.append(key, data[key]);
            }
            let c = new Product(form_data);
            c.request('delete').then(result => {
                if (result === '1') {
                    $("#count_of_products").text( parseInt($("#count_of_products").text()) - 1 )
                    tr.remove();
                } else {
                    alert("There is error in delete operation, please try again :) ");
                }
            });
        }
    });

    //row product
    function makeRow(data){
        let start = '';
        if ( ! img.startsWith("blob") )
            start = base_url + 'images/products/';

        return`
        <tr data = "${ htmlEntities(JSON.stringify(data)) }">
            <td> ${ data['name'] } </td>
            <td> ${ data['product_name'] } </td>
            <td> ${ data['description'] } </td>
            <td> ${ data['original_price'] } </td>
            <td> ${ data['selling_price'] }  </td>
            <td> ${ data['quantity'] } </td>
            <td> <img src="${start}${ img }" style="max-width: 90px" />  </td>
            <td> ${ data['discount'] } </td>
            <td> ${ data['unit'] }  </td>
            <td>
                <a href="#"  class="text-info btn_edit_product"> <i class="fas fa-edit"></i> Edit </a>
                <a href="#" class="text-danger btn_delete_product ml-3"> <i class="fas fa-trash"></i> Delete </a>
            </td>
        </tr>
        `
    }

    //put data
    function fillForm(data){
        $("#category_product").val(data.category_id);
        $("#product_name").val( data.product_name );
        $("#description").val( data.description );
        $("#original_price").val( data.original_price );
        $("#selling_price").val( data.selling_price );
        $("#quantity").val( data.quantity );
        $("#discount").val( data.discount );
        $("#unit").val( data.unit );
    }

});
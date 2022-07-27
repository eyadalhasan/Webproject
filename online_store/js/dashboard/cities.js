$(document).ready(function (){

    let type; // type of operation in form [ add , edit ]
    let tr; // tr that processing currently

    $("#btn_add_new_city").on('click', function (e){
        e.preventDefault();
        $("#btn_reset").click();
        type = "add";
        $(".modal-title").text('Add New City');
    });

    $("body").on('click', '.btn_edit_city' , function (e){
        e.preventDefault();
        $("#btn_reset").click();
        type = "update";

        tr = $(this).closest('tr');
        let data = JSON.parse($(this).closest('tr').attr('data'));

        //put data in form
        $(".modal-title").text('Edit City - ' + data.name);
        $("#form_city").attr('action', data.id);
        $("#city_name").val( data.name );
        $('.modal').modal('show');
    });

    $("#form_city").on('submit', function (e) {
        e.preventDefault();
        let form = $(this);
        let data = {
            name: form.find('#city_name').val(),
        }

        let c;
        //add operation
        if (type == "add") {
            c = new City( data );
            c.request(type).then(result => {
                if ( result ){
                    data.id = result;
                    $("#table_cities").prepend( makeRow( data ) );
                    $('.modal').modal('hide');
                    $("#btn_reset").click();
                    $("#count_of_cities").text( parseInt($("#count_of_cities").text()) + 1 );
                } else {
                    $("#result_form").html(`<div class="alert alert-danger">There is error in your data</div>`);
                }
            });
            //edit operation
        } else if (type == "update"){
            data.id = form.attr('action');
            c = new City( data );
            c.request(type).then(result => {
                if ( result === '1' ){
                    tr.replaceWith( makeRow( data ) );
                    $('.modal').modal('hide');
                    $("#btn_reset").click();
                } else {
                    $("#result_form").html(`<div class="alert alert-danger">There is error in edit operation</div>`);
                }
            });
        }


    });

    //delete city
    $("body").on('click', '.btn_delete_city' , function (e){
        e.preventDefault();
        if ( confirm("Are you sure delete this ? ") ) {
            tr = $(this).closest('tr');
            let data = JSON.parse($(this).closest('tr').attr('data'));
            let c = new City(data);
            c.request('delete').then(result => {
                if (result === '1') {
                    $("#count_of_cities").text( parseInt($("#count_of_cities").text()) - 1 )
                    tr.remove();
                } else {
                    alert("There is error in delete operation, please try again :) ");
                }
            });
        }
    });

    //row category
    function makeRow(data){
        return`
        <tr data = "${ htmlEntities(JSON.stringify(data)) }">
            <td class="td_city_name"> ${ data.name } </td>
            <td>
                <a href="#" class="text-info btn_edit_city"> <i class="fas fa-edit"></i> Edit </a>
                <a href="#" class="text-danger btn_delete_city ml-3"> <i class="fas fa-trash"></i> Delete </a>
            </td>
        </tr>
        `
    }

    function htmlEntities(str) {
        return String(str).replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;').replace(/"/g, '&quot;');
    }
});
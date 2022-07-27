$(document).ready(function (){

    let type; // type of operation in form [ add , edit ]
    let tr; // tr that processing currently

    $("#btn_add_new_employee").on('click', function (e){
        e.preventDefault();
        $("#btn_reset").click();
        type = "add";
        $(".modal-title").text('Add New Employee');
    });

    $("body").on('click', '.btn_edit_employee' , function (e){
        e.preventDefault();
        $("#btn_reset").click();
        type = "update";

        tr = $(this).closest('tr');
        let data = JSON.parse($(this).closest('tr').attr('data'));

        //put data in form
        $(".modal-title").text('Edit Employee - ' + data.name);
        $("#form_employee").attr('action', data.id);
        fillForm(data);
        $('.modal').modal('show');
    });

    $("#form_employee").on('submit', function (e) {
        e.preventDefault();
        let form = $(this);
        let data = new FormData(this);

        let c;
        //add operation
        if (type == "add") {
            pro = new Employee( data );
            pro.request(type).then(result => {
                if ( result.type === 'success' ){
                    data.append('id',result.text);
                    $("#table_employees").prepend( makeRow( conv_formData_object(data) ));
                    $("#count_of_employees").text( parseInt($("#count_of_employees").text()) + 1 );

                    $('.modal').modal('hide');
                    $("#btn_reset").click();
                } else {
                    $("#result_form").html(`<div class="alert alert-danger"> ${ result.text } </div>`);
                }
            });
            //edit operation
        } else if (type == "update") {
            data.append('id',form.attr('action'));
            pro = new Employee( data );
            pro.request(type).then(result => {
                if ( result === '1' ){
                    tr.replaceWith( makeRow( conv_formData_object(data) ) );
                    $('.modal').modal('hide');
                    $("#btn_reset").click();
                } else {
                    $("#result_form").html(`<div class="alert alert-danger">There is error in edit operation</div>`);
                }
            });
        }


    });

    //delete employee
    $("body").on('click', '.btn_delete_employee' , function (e){
        e.preventDefault();
        if ( confirm("Are you sure delete this ? ") ) {
            tr = $(this).closest('tr');
            let data = JSON.parse($(this).closest('tr').attr('data'));
            var form_data = new FormData();
            for ( var key in data ) {
                form_data.append(key, data[key]);
            }
            let c = new Employee(form_data);
            c.request('delete').then(result => {
                if (result === '1') {
                    $("#count_of_employees").text( parseInt($("#count_of_employees").text()) - 1 )
                    tr.remove();
                } else {
                    alert("There is error in delete operation, please try again :) ");
                }
            });
        }
    });

    //row product
    function makeRow(data){
        return`
        <tr data = "${ htmlEntities(JSON.stringify(data)) }">
            <td> ${ data['ssn'] } </td>
            <td> ${ data['phone_number'] } </td>
            <td> ${ data['name'] } </td>
            <td> ${ data['address'] } </td>
            <td> ${ data['role'] }  </td>
            <td> ${ data['date_of_birth'] } </td>
            <td>
                <a href="#"  class="text-info btn_edit_employee"> <i class="fas fa-edit"></i> Edit </a>
                <a href="#" class="text-danger btn_delete_employee ml-3"> <i class="fas fa-trash"></i> Delete </a>
            </td>
        </tr>
        `
    }

    //put data
    function fillForm(data){
        $("#ssn").val(data.ssn);
        $("#phone_number").val( data.phone_number );
        $("#name").val( data.name );
        $("#address").val( data.address );
        $("#role").val( data.role );
        $("#date_of_birth").val( data.date_of_birth );
    }

});
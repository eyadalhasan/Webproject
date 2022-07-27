$(document).ready(function (){

    $("#register").on('submit', function (e){
        e.preventDefault();

        let form = $(this);
        let data = {
            name: form.find('#c_name').val(),
            phone_number: form.find('#c_phone_number').val(),
            password: form.find('#c_password').val(),
            confirm_password: form.find('#c_confirm_password').val(),
            city: form.find('#c_city').val(),
            address: form.find('#c_address').val(),
        }

        let customer = new Customer(data);
        customer.register().then(result => {
            if ( result === '1' )
            {
                $("#result_register").html(`<div class="alert alert-success"> <b> successfully registered </b> </div>`);
                window.location.reload();
            }
            else
                $("#result_register").html(`<div class="alert alert-danger"> <b> ${ result } </b> </div>`);
        });

    });

});
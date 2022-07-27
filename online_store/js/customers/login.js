$(document).ready(function (){

    $("#login").on('submit', function (e){
        e.preventDefault();

        let form = $(this);
        let data = {
            phone_number: form.find('#phone_number').val(),
            password: form.find('#password').val(),
        }

        let result = Customer.login(data).then(result => {
            if ( result === '1' )
            {
                $("#result_login").html(`<div class="alert alert-success"> <b> welcome :) </b> </div>`);
                window.location.assign('index.php');
            }
            else
                $("#result_login").html(`<div class="alert alert-danger"> <b> There is error in your data -_- </b> </div>`);
        });

    });

});
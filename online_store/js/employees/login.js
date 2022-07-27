$(document).ready(function (){

    $("#login").on('submit', function (e){
        e.preventDefault();

        let form = $(this);
        let data = {
            ssn: form.find('#ssn').val(),
            password: form.find('#password').val(),
        }

        Employee.login(data).then(result => {
            if ( result === '1' ){
                $("#result_login").html(`<div class="alert alert-success"> <b> welcome :) </b> </div>`);
                window.location.assign("/online_store/dashboard/index.php");
            } else {
                $("#result_login").html(`<div class="alert alert-danger">There is error in your data, please try again</div>`);
            }
        });


    });

});
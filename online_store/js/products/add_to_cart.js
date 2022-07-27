$(document).ready(function (){

    $("#form_add_to_cart").on('submit', function (e){
        e.preventDefault();

        let data = new FormData(this);
        let id = $(this).attr('action');
        data.append('id', id);

        p = new Product(data);

        let result = p.request("add_to_cart").then(result => {
            if ( result === '1' )
            {
                alert("added done");
            }
            else
                alert("There is error in add this product -_-, please try again");
        });

    });

});
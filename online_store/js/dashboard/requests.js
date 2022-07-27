$(document).ready(function (){


    $("body").on('click', '.btnMakeReceived' , function (e){
        e.preventDefault();
        if ( confirm("Are you sure to make this ? ") ) {
            let tr = $(this).closest('tr');
            let data = JSON.parse($(this).closest('tr').attr('data'));
            let c = new Request(data);
            c.request('update').then(result => {
                if (result.type === 'success') {
                    tr.closest('tr').find('.status').html( ' <i class="fas fa-check"></i> Recevied ' );
                    tr.closest('tr').find('.emplpyee_name').text( result.text ) ;
                } else {
                    alert("There is error in this operation, please try again :) ");
                }
            });
        }
    });


});
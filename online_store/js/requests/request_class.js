class Request {

    constructor(data) {
        this.data = data;
    }

    request( operation_type ) {
        let d = this.data;
        d.operation_type = operation_type;
        return new Promise(function (resolve, reject){
            $.ajax({
                type: "POST",
                url: base_url + "php/functions/requests/controller.php",
                data: d,
                success: function (res){
                    resolve(res)
                },
                error: function (res){
                    resolve(res)
                }
            });
        });
    }
}
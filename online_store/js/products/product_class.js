class Product {

    constructor(data) {
        this.data = data;
        // this.name = data.name;
    }

    request( operation_type ) {
        let d = this.data;
        d.append("operation_type", operation_type);
        return new Promise(function (resolve, reject){
            $.ajax({
                type: "POST",
                url: base_url + "php/functions/products/controller.php",
                data: d,
                success: function (res){
                    resolve(res)
                },
                error: function (res){
                    resolve(res)
                },
                cache: false,
                processData: false,
                contentType: false
            });
        });
    }
}
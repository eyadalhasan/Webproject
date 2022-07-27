class Employee {

    constructor(data) {
        this.data = data;
        this.ssn = data.ssn;
        this.phone_number = data.phone_number;
        this.name = data.name;
        this.address = data.address;
        this.password = data.password;
        this.role = data.role;
        this.date_of_birth = data.date_of_birth;
    }

    static login(data) {
        return new Promise(function (resolve, reject){
            $.ajax({
                type: "POST",
                url: base_url + "php/functions/employees/login.php",
                data: data,
                success: function (res){
                    resolve(res)
                },
                error: function (res){
                    resolve(res)
                }
            });
        });
    }

    request( operation_type ) {
        let d = this.data;
        d.append("operation_type", operation_type);
        return new Promise(function (resolve, reject){
            $.ajax({
                type: "POST",
                url: "http://localhost/online_store/php/functions/employees/controller.php",
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
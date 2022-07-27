class Customer {

    constructor(data) {
        this.name = data.name;
        this.phone_number = data.phone_number;
        this.city = data.city;
        this.address = data.address;
        this.password = data.password;
        this.confirm_password = data.confirm_password;
        this.data = data;
    }

    static login(data){
        return new Promise(function (resolve, reject){
            $.ajax({
                type: "POST",
                url: base_url + "php/functions/customers/login.php",
                data: data,
                success: function (res){ resolve(res) },
                error: function (res){ resolve(res) }
            });
        });
    }

    register() {
        let validate = this.validate();
        let d = this.data;
        d.operation_type = 'add';

        return new Promise(function(resolve, reject) {
            if ( validate === true )
            {
                $.ajax({
                    type: "POST",
                    url: base_url + "php/functions/customers/controller.php",
                    data: d,
                    success: function (res) {
                        resolve(res);
                    },
                    error: function (res) {
                        resolve(res);
                    }
                });
            }
            else
            {
                resolve(validate);
            }
        });
    }

    request( operation_type ) {
        let d = this.data;
        d.append("operation_type", operation_type);
        return new Promise(function (resolve, reject){
            $.ajax({
                type: "POST",
                url: base_url + "php/functions/customers/controller.php",
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

    validate() {
        if ( this.name.match(/[A-z]{3,}/) ){
            if ( this.phone_number.match(/[0-9]{9,}/) ) {
                if (this.password.length >= 8) {
                    if (this.password === this.confirm_password) {
                        if (this.city != 0){
                            return  true;
                        } else {
                            return "select your city";
                        }
                    } else {
                        return  "passwords do not match";
                    }
                } else {
                    return "your password must be at least 8 character";
                }
            } else {
                return "your phone number must be numbers and at least 9 numbers";
            }
        } else  {
            return "your name must be at least 3 letters";
        }
    }

}
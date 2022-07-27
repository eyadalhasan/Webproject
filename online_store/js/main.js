//P U B L I C => available for all pages

var base_url = "http://localhost/online_store/"; // public url for website

function htmlEntities(str) {
    return String(str).replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;').replace(/"/g, '&quot;');
}

var url_image;
function loadFile(event) {
    url_image = URL.createObjectURL(event.target.files[0]);
}

//convert form data to object
function conv_formData_object(data)
{
    let object = {};
    data.forEach(function(value, key){object[key] = value;});
    return object;
}

//show image in full size
$("body").on('click', '.btn_show_image', function (e){
    e.preventDefault();
    $("#show-image").attr('src',$(this).attr('src'));
    $(".show-image").show();
});
$(".show-image").on('click', function (e){
   e.preventDefault();
    $(".show-image").hide();
});

//local filter
$("#input_filter").keyup(function () {
    let value = this.value.toLowerCase().trim();
    $("table tr").each(function (index) {
        if (!index) return;
        $(this).find("td").each(function () {
            var id = $(this).text().toLowerCase().trim();
            var not_found = (id.indexOf(value) == -1);
            $(this).closest('tr').toggle(!not_found);
            return not_found;
        });
    });
});

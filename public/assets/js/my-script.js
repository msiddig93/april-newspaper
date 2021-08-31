$(function(){

})

function clickImg(selector){
    $(selector).click();
}

function readUrl(input,img = '.user-photo') {

    if (input.files && input.files[0]) {
        file = input.files[0];
        reader = new FileReader();

        console.log(file.type.toString());
        if (file.type.toString() == 'image/png' || file.type.toString() == 'image/jgp' || file.type.toString() == 'image/jpeg') {
            reader.readAsDataURL(file);
            reader.onload = function (e) {
                $(img).attr('src', e.target.result);
                // $('.thumb-reset').show();
                // $('#type-error').hide();
            }
        } else {
            $(input).val(null);
            // $('#type-error').slideToggle();
        }
    }
}

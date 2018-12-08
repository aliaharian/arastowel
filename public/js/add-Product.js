function showOff() {
    if($('#off').prop('checked')===true){
        $('#offDetails').removeClass('display-none');
    }
    else {
        $('#offDetails').addClass('display-none');

    }
}

function colorVariable() {
    if ($('#colorvariable').prop('checked')===true) {
        $('#colorstab').removeClass('hidden');
        $('.color-box-body').removeClass('hidden');
        $('.color-accept').addClass('hidden');
        $('#mainprice').prop('disabled', false);

    }
    else {
        $('#colorstab').addClass('hidden');
        $('#sizetab').addClass('hidden');
        $('#sizevariable').prop('checked', false);
        $('.color-box-body').addClass('hidden');
        $('.color-accept').addClass('hidden');
        $('#mainprice').prop('disabled', false);

    }

}
function sizeVariable() {
    if ($('#sizevariable').prop('checked')===true) {
        $('#mainprice').prop('disabled', true);
        $('#colorstab').removeClass('hidden');
        $('#sizetab').removeClass('hidden');
        $('#colorvariable').prop('checked', true);
        $('.color-box-body').removeClass('hidden');
        $('.color-accept').addClass('hidden');


    }
    else {
        if ($('#colorvariable').prop('checked')===true) {
            $('#mainprice').prop('disabled', false);
            $('#colorstab').removeClass('hidden');
            $('#sizetab').addClass('hidden');
            $('.color-box-body').removeClass('hidden');
            $('.color-accept').addClass('hidden');

        }
        else {
            $('#mainprice').prop('disabled', false);
            $('#colorstab').addClass('hidden');
            $('#sizetab').addClass('hidden');
            $('.color-box-body').addClass('hidden');
            $('.color-accept').addClass('hidden');


        }
    }

}



function productvalidate() {

        var flag = 1;
        $('#category_title').html('دسته بندی ها');
        $('#image_title').html('تصویر کالا ');
        $('input').removeClass('wronginput');
        $('#colorstab').html('رنگ ها');
        $('#pricetab').html(' قیمت');
        $('#sizetab').html(' سایز ها');
        $('a').removeClass('fa fa-exclamation-triangle text-danger');
    if($('#draft').prop('checked')===false) {
        var catCount = $('input.categories:checked').length;
        if (catCount === 0) {
            $('#category_title').html('<span style="color:red">دسته بندی ها <i class="fa fa-exclamation-triangle"></i></span>');
            flag = 0;
        }
        if ($('#featured_image').val() === '') {
            $('#image_title').html('<span style="color:red">تصویر کالا <i class="fa fa-exclamation-triangle"></i></span>');
            flag = 0;
        }
        if ($('#title').val() === '') {
            $('#title').addClass('wronginput');
            flag = 0;
        }
        if ($('#sizevariable').prop('checked') === false && $('#mainprice').val()==='' ) {
            $('#mainprice').addClass('wronginput');
            $('#pricetab').html('<span style="color:red">قیمت <i class="fa fa-exclamation-triangle"></i></span>');

            flag = 0;
        }
        if ($('#colorvariable').prop('checked') === true) {
            var colorCount = $('input.colors:checked').length;
            if (colorCount === 0) {
                $('#colorstab').html('<span style="color:red">رنگ ها <i class="fa fa-exclamation-triangle"></i></span>');
                flag = 0;
            }
            else if ($('#sizevariable').prop('checked') === true) {
                var sizeCount = $('input.sizes:checked').length;
                if (sizeCount === 0) {
                    $('#sizetab').html('<span style="color:red">سایز ها <i class="fa fa-exclamation-triangle"></i></span>');
                    flag = 0;
                }
                $('input:checkbox.sizes').each(function () {
                    if ($(this).prop("checked") === true) {
                        if ($('#price' + this.id).val() === '') {
                            $('#sizetab').html('<span style="color:red">سایز ها <i class="fa fa-exclamation-triangle"></i></span>');
                            $('#price' + this.id).addClass('wronginput');
                            $('#title' + this.id).addClass('fa fa-exclamation-triangle text-danger');
                            flag=0;

                        }
                    }
                });
            }
        }

    }
    else if($('#draft').prop('checked')===true){
        if ($('#title').val() === '') {
            $('#title').addClass('wronginput');
            flag = 0;
        }
    }

    if (flag === 0) {
        return false;
    }
    else if (flag === 1) {
        return true;
    }

}
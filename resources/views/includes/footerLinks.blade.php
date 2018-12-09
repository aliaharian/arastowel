

<!--===============================================================================================-->
<script type="text/javascript" src="https://statics.arastowel.com/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
<script type="text/javascript" src="https://statics.arastowel.com/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
<script type="text/javascript" src="https://statics.arastowel.com/vendor/bootstrap/js/popper.js"></script>
<script type="text/javascript" src="https://statics.arastowel.com/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
<script type="text/javascript" src="https://statics.arastowel.com/vendor/select2/select2.min.js"></script>
<script type="text/javascript">
    $(".selection-1").select2({
        minimumResultsForSearch: 20,
        dropdownParent: $('#dropDownSelect1')
    });
</script>
<!--===============================================================================================-->
<script type="text/javascript" src="https://statics.arastowel.com/vendor/slick/slick.min.js"></script>
<script type="text/javascript" src="https://statics.arastowel.com/js/slick-custom.js"></script>
<!--===============================================================================================-->

<script type="text/javascript" src="/vendor/countdowntime/jquery.countdown.js"></script>
<!--===============================================================================================-->
<script type="text/javascript" src="https://statics.arastowel.com/vendor/lightbox2/js/lightbox.min.js"></script>
<!--===============================================================================================-->
<script type="text/javascript" src="https://statics.arastowel.com/vendor/sweetalert/sweetalert.min.js"></script>
<script type="text/javascript" src="https://statics.arastowel.com/js/main.js"></script>
<script type="text/javascript">
    $('.addtocart').each(function(){
        $(this).on('click', function(){
            swal("محصول مورد نظر", "به سبد خرید افزوده شد", "success");
        });
    });

    $('.addtocartfake').each(function(){
        $(this).on('click', function(){
            swal("ابتدا رنگ و سایز", "مورد نظر خود را انتخاب کنید", "error");
        });
    });

    $('.block2-btn-addwishlist').each(function(){
        var nameProduct = $(this).parent().parent().parent().find('.block2-name').html();
        $(this).on('click', function(){
            swal({
                title: nameProduct,
                text: "به لیست علاقمندی های شما اضافه شد",
                icon: "success",
                button: "تایید"
            });
        });
    });

</script>

<script>
    {{--delete pre order--}}
    jQuery(document).ready(function () {
        jQuery('.header-cart-item-delete').click(function (e) {
            $body = $("body");
            var pre_order_id=this.id;
            $(document).on({
                ajaxStart: function() { $body.addClass("loading");  },
                ajaxStop: function() { $body.removeClass("loading"); }
            });

            jQuery.ajax({

                    url: "{{ route('deleteFromCart') }}",
                    method: 'get',
                    data: {
                        pre_order_id: pre_order_id
                    },
                    success: function (response) {
                        // What to do if we succeed
                        $('.header-wrapicon2 ').html(response);
                    }
                }
            )
        });
    });


    $('.header-cart-item-delete').each(function(){
        $(this).on('click', function(){
            swal("محصول مورد نظر", "با موفقیت از سبد خرید حذف شد", "warning");
        });
    });


</script>


<script>
    {{--add to wishlist--}}
    jQuery(document).ready(function () {
        jQuery('.block2-btn-addwishlist').click(function (e) {
            $body = $("body");
            var product_id=this.id;
            $(document).on({
                ajaxStart: function() { $body.addClass("loading");  },
                ajaxStop: function() { $body.removeClass("loading"); }
            });

            jQuery.ajax({

                    url: "{{ route('addToWishlist') }}",
                    method: 'get',
                    data: {
                        product_id: product_id
                    },
                    success: function (response) {
                        // What to do if we succeed
                        console.log('added to wishlist');
                    }
                }
            )
        });
    });

</script>




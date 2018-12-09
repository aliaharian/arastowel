<!DOCTYPE html>
<html lang="fa">
<head>
    <title>ایجاد آدرس - حوله ارس</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://statics.arastowel.com/css/profile.css">

    @include('includes.headLinks')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

    <style>
        .select2-container {
            display: block;
            max-width: 100% !important;
            width: 100% !important;
            text-align: right;
        }
        .select2-container--default .select2-selection--single .select2-selection__arrow {
            height: 26px;
            position: absolute;
            top: 12px;
            right: 1px;
            width: 20px;
        }
        .topbar-language{
            display: none!important;
        }
    </style>
</head>
<body>

@include('includes.header')


<!-- Title Page -->
<section class="bg-title-page p-t-40 p-b-50 flex-col-c-m" style="background-color: #c8c8c8;padding-bottom: 0px;padding-top: 0px;min-height: 2px;">
</section>

<!-- content page -->
<section class="bgwhite p-t-40 p-b-38">

    <div class="container" style="max-width: 98%">
        <div class="row" style="direction: rtl">
            <div class="col-md-3 ">
                @include('profile.includes.header')

            </div>
            <div class="col-md-9">

            <main id="main">
                <div id="HomePageTopBanner">

                </div>
                <div id="content">
                    <div class="container c-checkout-add-address" style="margin: 0;padding: 0">
                        <section class="o-page">
                            <div class="o-page__row">
                                <section class="o-page__content">
                                    <div class="c-checkout-box">
                                        @if ($errors->any())
                                            <div class="alert alert-danger" style="text-align: right">
                                                <ul>
                                                    @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif
                                        <form class="c-form-checkout" action="{{route('profile.address.store',[$_GET['callback']])}}" method="post" id="addAddressForm" style="direction: rtl">
                                           @csrf
                                            <div class="c-form-checkout__row">
                                                <div class="c-form-checkout__col c-form-checkout__col--fields">
                                                    <div class="c-form-checkout__headline" style="text-align: right">افزودن آدرس جدید</div>
                                                    <div class="c-form-checkout__row">
                                                        <div class="c-form-checkout__col js-valid-row c-form-checkout__col--half">
                                                            <div class="c-form-checkout__title">نام و نام خانوادگی تحویل گیرنده
<span class="c-form-checkout__required--star">*</span>
                                                            </div>
                                                            <label class="c-ui-input">
                                                                <input required class="c-ui-input__field" name="full_name" type="text" placeholder="نام تحویل گیرنده را وارد نمایید" value="" maxlength="50">
                                                            </label>
                                                        </div>
                                                        <div class="c-form-checkout__col js-valid-row c-form-checkout__col--half">
                                                            <div class="c-form-checkout__title">شماره موبایل
<span class="c-form-checkout__required--star">*</span>
                                                            </div>
                                                            <label class="c-ui-input">
                                                                <input required class="c-ui-input__field c-ui-input__field--ltr" style="text-align: left;" name="mobile" id="mobile" type="text" placeholder="09xxxxxxxxxxxx" value="">
                                                            </label>
                                                        </div>
                                                    </div>
                                                   <div class="alert alert-info text-right">ثبت آدرس و سفارش اینترنتی فقط در استان تهران امکان پذیر است.<br>برای ثبت سفارش از استان های دیگر لطفا با شماره تلفن های درج شده در بخش تماس با ما یا پایین سایت تماس بگیرید</div>
                                                    <div class="c-form-checkout__row">
                                                        <div class="c-form-checkout__col c-form-checkout__col--half">
                                                            <div class="c-form-checkout__title">شهرستان
                                                <span class="c-form-checkout__required--star">*</span>
                                                            </div>

                                                            <div class="selectric-wrapper selectric-c-ui-select selectric-js-ui-select-search selectric-js-select-state">
                                                                <div class="selectric-hide-select">
                                                                    <select required class="countries" name="country" id="country" style="width: 100%!important;text-align-all: right">
                                                                        @foreach($countries as $country)
                                                                            <option value="{{$country->id}}" style="text-align:right ">{{$country->name}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <div class="c-form-checkout__col c-form-checkout__col--half">
                                                            <div class="c-form-checkout__title">شهر
                                                <span class="c-form-checkout__required--star">*</span>
                                                            </div>
                                                            <div class="selectric-wrapper selectric-c-ui-select selectric-js-ui-select-search selectric-js-select-city">
                                                                <div class="selectric-hide-select">
                                                                    <select required class="cities" name="city" id="city" style="width: 100%!important;">

                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="c-form-checkout__row js-valid-row"><div class="c-form-checkout__col">
                                                            <div class="c-form-checkout__title">آدرس پستی
                                                            <span class="c-form-checkout__required--star">*</span>
                                                            </div>
                                                            <label class="c-ui-textarea">
                                                                <textarea required class="c-ui-textarea__field" name="address" placeholder="آدرس تحویل گیرنده را وارد نمایید" maxlength="300"></textarea>
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="c-form-checkout__row js-valid-row">
                                                        <div class="c-form-checkout__col c-form-checkout__col--half">
                                                            <div class="c-form-checkout__title">کدپستی
                                                    <span class="c-form-checkout__required--star">*</span>
                                                            </div>
                                                            <label class="c-ui-input">
                                                                <input required class="c-ui-input__field c-ui-input__field--right-placeholder text-left" style="text-align: left;" id="postal_code" name="postal_code" type="text" maxlength="10" placeholder="کد پستی را بدون خط تیره بنویسید" value=""></label>
                                                        </div>
                                                    </div>
                                                    <div class="c-form-checkout__row">
                                                        <div class="c-form-checkout__col c-form-checkout__col--submit">
                                                            <button class="btn-checked" type="submit">ثبت آدرس</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </section>
                            </div>
                        </section>
                    </div>
                </div>
            </main>




            </div>


        </div>
    </div>
</section>


<!-- Footer -->
@include('includes.footer')
@include('includes.footerLinks')
<script type='text/javascript' src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/3/jquery.inputmask.bundle.js"></script>

<script>
    $(":input").inputmask();

    $("#postal_code").inputmask({"mask": "9999999999"});
    $("#mobile").inputmask({"mask": "09999999999"});
    // In your Javascript (external .js resource or <script> tag)

/////////////////select city cenario
    jQuery(document).ready(function () {
        jQuery('select.countries').change(function (e) {
            var selectedCountry = $(this).children("option:selected").val();

            $body = $("body");

            $(document).on({
                ajaxStart: function() { $body.addClass("loading");  },
                ajaxStop: function() { $body.removeClass("loading"); }
            });

            jQuery.ajax({

                    url: "{{ route('selectCity') }}",
                    method: 'get',
                    data: {
                        selectedCountry: selectedCountry

                    },
                    success: function (response) {
                        // What to do if we succeed
                        $('#city').html(response);
                    }
                }
            )
        });
    });
    $(document).ready(function() {
        $('.countries').select2();
    });
    $(".cities").select2({
        placeholder: "ابتدا شهرستان خود را انتخاب کنید",
        allowClear: true
    });
</script>

</body>
</html>

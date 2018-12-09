<!DOCTYPE html>
<html lang="fa">
<head>
    <title>پیگیری خرید - حوله ارس</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://statics.arastowel.com/css/profile.css">

    @include('includes.headLinks')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

@include('includes.header')


<!-- Title Page -->
<section class="bg-title-page p-t-40 p-b-50 flex-col-c-m" style="background-color: #c8c8c8;    padding-bottom: 0px;
    padding-top: 0px;
min-height: 2px;
">
</section>
<!-- content page -->
<section class="bgwhite p-t-40 p-b-38">

    <div class="container" style="max-width: 98%">
        <div class="row" style="direction: rtl">
            <div class="col-md-3 ">
                @include('profile.includes.header')

            </div>
            <div class="col-md-9">
                    <div class="c-profile-navbar">
                        <h4>پیگیری خرید</h4>
                    </div>
                    <div class="c-profile-return">
                        <div class="c-profile-return__box c-profile-return__box--pad-20">
                            <form method="get" action="{{route('send-orderTrack')}}" class="c-profile-return-request-form" id="search-order-form">
                                <p> برای پیگیری خرید خود، شماره سفارش را در زیر وارد نمایید.</p>
                                <div class="c-profile-return-request-form__row">
                                    <div class="c-profile-return-request-form__field js-valid-row">
                                        <label class="c-ui-input">
                                            <input class="c-ui-input__field" value="" name="order" type="text" required placeholder="مثلا 765301" autocomplete="off">
                                        </label>
                                    </div>
                                    <div class="c-profile-return-request-form__button c-profile-return-request-form__button--top-btn">
                                        <button type="submit" class="btn-primary" style="padding: 0px;height: 33px;border-bottom-width: 7px;">بررسی سفارش</button>
                                </div>
                                </div>
                            </form>
                        </div>
                    </div>
            </div>


        </div>
    </div>
</section>


<!-- Footer -->
@include('includes.footer')
@include('includes.footerLinks')

</body>
</html>

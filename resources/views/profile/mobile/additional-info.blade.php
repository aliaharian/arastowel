<!DOCTYPE html>
<html lang="fa">
<head>
    <title>اطلاعات فردی - حوله ارس</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://arastowel.com/css/profile.css">

    @include('includes.headLinks')
    <script defer src="/js/jquery-bootstrap.js"></script>

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
                <div class="o-page">
                    <div class="o-page-navigation">
                        <div class="o-page-navigation__title">ویرایش اطلاعات شخصی</div>
                        <a href="{{route('profile.personal-info')}}" class="o-page-navigation__btn-back fa fa-arrow-left">بازگشت</a>
                    </div>
                    <div class="c-profile-edit">
                        <div class="o-collapse">
                            <div class="o-round-cart">
                                <div class="o-cart-header">مشخصات شما</div>
                                <form class="c-form-legal text-right" action="{{route('edit-personal-info')}}" id="additionalInfoForm" method="post" >
                                    {{csrf_field()}}
                                    {{method_field('put')}}
                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                    <label class="c-profile-edit__label js-valid-row">
                                        <span class="is-required">نام شما</span>
                                        <input class="c-ui-input__field" type="text" name="name" value="{{\Illuminate\Support\Facades\Auth::user()->name}}" placeholder="نام خود را وارد کنید">
                                    </label>
                                    <label class="c-profile-edit__label js-valid-row">
                                        <span class="is-required">نام خانوادگی شما</span>
                                        <input required class="c-ui-input__field" type="text" name="last_name" value="{{\Illuminate\Support\Facades\Auth::user()->last_name}}" placeholder="نام خانوادگی خود را وارد نمایید">
                                    </label>
                                        <label class="c-profile-edit__label js-foreigner js-valid-row">
                                        <span class="is-required">کد ملی</span>
                                        <input class="c-ui-input__field c-ui-input__field--right-placeholder text-left" id="national_code" style="font-family: Arial!important;" type="text" required name="national_code"
                                               @if($additional_information->value('national_number')!='') value="{{$additional_information->value('national_number')}}" @endif placeholder="کد ملی خود را وارد نمایید">                                    </label>

                                    <div class="c-message c-message--info js-bank-card-message u-hidden">
                                        <ul>
                                            <li>شماره کارت بانکی که حساب آن به نام صاحب پروفایل میباشد را در حساب کاربری
                                                حوله ارس خود ثبت نماید.
                                            </li>
                                            <li>در خصوص افراد زیر 18 سال فاقد کارت بانکی، شماره کارت یکی از والدین ایشان با
                                                اولویت پدر، کفایت میکند.
                                            </li>
                                        </ul>
                                    </div>
                                    <label class="c-profile-edit__label js-valid-row">
                                        <span>شماره کارت</span>
                                        <input required class="c-ui-input__field c-ui-input__field--right-placeholder js-bank-card-num text-left" style="font-family: Arial!important;direction: ltr;text-align: left" type="text" id="card-number" name="card_number"

                                               value="{{$additional_information->value('card_number')}}"
                                               placeholder="شماره کارت خود را وارد نمایید.">                                    </label>
                                    <label class="c-profile-edit__label js-valid-row">
                                        <span class="is-required">شماره تلفن همراه</span>
                                        <input required class="c-ui-input__field c-ui-input__field--right-placeholder text-left" style="font-family: Arial!important;" type="text" id="mobile" name="phone_number" @if($additional_information->value('phone_number')!='') value="{{$additional_information->value('phone_number')}}" @endif placeholder="شماره موبایل خود را وارد نمایید.">
                                    </label>
                                    <label class="c-ui-checkbox">
                                        <input type="checkbox" value="1" id="newsletter" name="additionalinfo[newsletter]" checked="checked">
                                        <span class="c-ui-checkbox__check"></span>
                                    </label><label class="c-profile-edit__checkbox" for="newsletter">
                                        <span>اشتراک در خبرنامه حوله ارس</span>
                                    </label>

                                    <button class="c-btn-primary">ثبت اطلاعات</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>



            </div>


        </div>
    </div>
</section>


<!-- Footer -->
@include('includes.footer')
@include('includes.footerLinks')
<script type='text/javascript' src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/3/jquery.inputmask.bundle.js"></script>

<script>

    $("#card-number").inputmask({"mask": "9999999999999999","placeholder": ""});

    $("#national_code").inputmask({"mask": "9999999999","placeholder": ""});

    $("#mobile").inputmask({"mask": "09999999999","placeholder": ""});

</script>
</body>
</html>

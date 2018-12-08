<!DOCTYPE html>
<html lang="fa">
<head>
    <title>تکمیل اطلاعات فردی - فروشگاه اینترنتی حوله ارس</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://statics.arastowel.com/css/profile.css">

    @include('includes.headLinks')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body class="animsition">

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
                    <div class="c-profile-navbar">
                        <a href="{{route('profile.personal-info')}}" class="c-profile-navbar__btn-back fa fa-arrow-right">بازگشت</a>
                        <h4>ویرایش اطلاعات شخصی</h4>
                    </div>
                    <div class="c-profile-legal">
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
                            <div class="c-form-legal__row">
                                <div class="c-form-legal__col">
                                    <fieldset class="c-form-legal__fieldset">
                                        <h4 class="c-form-legal__headline">حساب شخصی</h4>
                                        <div class="c-form-legal__item"><div class="c-form-legal__label">
                                                <label>نام</label>
                                            </div>
                                            <div class="c-form-legal__field js-valid-row">
                                                <label class="c-ui-input">
                                                    <input class="c-ui-input__field" type="text" name="name" value="{{\Illuminate\Support\Facades\Auth::user()->name}}" placeholder="نام خود را وارد کنید">
                                                </label>
                                            </div>
                                        </div>
                                        <div class="c-form-legal__item">
                                            <div class="c-form-legal__label">
                                                <label>نام خانوادگی</label>
                                            </div>
                                            <div class="c-form-legal__field js-valid-row">
                                                <label class="c-ui-input">
                                                    <input required class="c-ui-input__field" type="text" name="last_name" value="{{\Illuminate\Support\Facades\Auth::user()->last_name}}" placeholder="نام خانوادگی خود را وارد نمایید">
                                                </label>
                                            </div>
                                        </div>
                                        <div class="c-form-legal__item js-foreigner">
                                            <div class="c-form-legal__label">
                                                <label>کدملی</label>
                                            </div>
                                            <div class="c-form-legal__field js-valid-row">
                                                <label class="c-ui-input">
                                                    <input class="c-ui-input__field c-ui-input__field--right-placeholder text-left" id="national_code" style="font-family: Arial!important;" type="text" required name="national_code"
                                                    @if($additional_information->value('national_number')!='') value="{{$additional_information->value('national_number')}}" @endif placeholder="کد ملی خود را وارد نمایید">
                                                </label>
                                            </div>
                                        </div>

                                        <div class="c-form-legal__item">
                                            <div class="c-form-legal__label">
                                                <label>شماره موبایل</label>
                                            </div>
                                            <div class="c-form-legal__field js-valid-row">
                                                <label class="c-ui-input">
                                                    <input required class="c-ui-input__field c-ui-input__field--right-placeholder text-left" style="font-family: Arial!important;" type="text" id="mobile" name="phone_number" @if($additional_information->value('phone_number')!='') value="{{$additional_information->value('phone_number')}}" @endif placeholder="شماره موبایل خود را وارد نمایید.">
                                                </label>
                                            </div>
                                        </div>
                                        <div class="c-form-legal__item">
                                            <div class="c-message-light c-message-light--info js-bank-card-message u-hidden">
                                                <ul>
                                                    <li>شماره کارت بانکی که حساب آن به نام صاحب پروفایل میباشد را در حساب کاربری
                                                        حوله ارس خود ثبت نماید.
                                                    </li>
                                                    <li>در خصوص افراد زیر 18 سال فاقد کارت بانکی، شماره کارت یکی از والدین ایشان با
                                                        اولویت پدر، کفایت میکند.
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="c-form-legal__label">
                                                <label>شماره کارت</label>
                                            </div>
                                            <div class="c-form-legal__field js-valid-row">
                                                <label class="c-ui-input">
                                                    <input required class="c-ui-input__field c-ui-input__field--right-placeholder js-bank-card-num text-left" style="font-family: Arial!important;direction: ltr;text-align: left" type="text" id="card-number" name="card_number"

                                                           value="{{$additional_information->value('card_number')}}"
                                                           placeholder="شماره کارت خود را وارد نمایید.">
                                                </label></div>
                                        </div>

                                        <div class="c-form-legal__item">
                                            <div class="c-form-legal__label"></div>
                                            <div class="c-form-legal__field">
                                                <label class="c-ui-checkbox">
                                                    <input type="checkbox" value="1" id="checkbox_2" name="newsletter" checked="checked">
                                                    <span class="c-ui-checkbox__check"></span>
                                                </label>
                                                <label for="checkbox_2">اشتراک در خبرنامه حوله ارس</label>
                                            </div>
                                        </div>
                                    </fieldset>
                                </div>

                            </div>
                            <div class="c-form-legal__row c-form-legal__row--submit">
                                <div class="c-form-legal__col" style="flex: 0 0 50%;">
                                    <button class="btn-default btn-default--success">ثبت اطلاعات کاربری</button>
                                </div>
                                <div class="c-form-legal__col" style="flex: 0 0 50%;">
                                    <a href="{{route('profile.personal-info')}}" class="btn-default btn-default--gray">انصراف</a>
                                </div>
                            </div>
                        </form>
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

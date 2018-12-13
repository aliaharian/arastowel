<!DOCTYPE html>
<html lang="fa">
<head>
    <title>تغییر کلمه عبور - حوله ارس</title>
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
            <div class="col-md-9 text-right">
                @if ($errors->has('newPassword'))
                    <div class="alert alert-danger text-center" role="alert">
                        <strong>{{ $errors->first('newPassword') }}</strong>
                    </div>
                @endif
                    @if ($errors->has('oldPassword'))
                        <div class="alert alert-danger text-center" role="alert">
                            <strong>{{ $errors->first('oldPassword') }}</strong>
                        </div>
                    @endif

                    @if (isset($pm))
                        <div class="alert alert-warning text-center" role="alert">
                            <strong>{{$pm}}</strong>
                        </div>
                    @endif
                  <div class="containpass">
                    <div class="c-account-box__headline">تغییر رمز عبور</div>
                    <div class="c-account-box__content">
                        <form class="c-form-account" action="{{route('profile.changepass')}}" id="changepasswordForm" method="post">
                          {{csrf_field()}}
                            {{method_field('put')}}
                            <div class="c-form-account__fieldset">
                                <div class="c-form-account__title">رمز عبور قبلی</div>
                                <div class="c-form-account__row">
                                    <div class="c-form-account__col">
                                        <label class="c-ui-input c-ui-input--account-password">
                                            <input class="c-ui-input__field c-ui-input__field--right-placeholder" type="password" name="oldPassword" id="oldPassword" placeholder=" رمز عبور قبلی خود را وارد نمایید" required autocomplete="off">
                                        </label>
                                    </div>
                                </div>
                                <div class="c-form-account__title">رمز عبور جدید</div>
                                <div class="c-form-account__row">
                                    <div class="c-form-account__col">
                                        <label class="c-ui-input c-ui-input--account-password">
                                            <input class="c-ui-input__field c-ui-input__field--right-placeholder" type="password" name="newPassword" id="newPassword" placeholder=" رمز عبور جدید خود را وارد نمایید" required aria-autocomplete="list">
                                        </label>
                                    </div>
                                </div>
                                <div class="c-form-account__title">تکرار رمز عبور جدید</div>
                                <div class="c-form-account__row">
                                    <div class="c-form-account__col">
                                        <label class="c-ui-input c-ui-input--account-password">
                                            <input class="c-ui-input__field c-ui-input__field--right-placeholder" type="password" name="newPassword_confirmation" id="newPassword_confirmation" required placeholder=" رمز عبور جدید خود را مجددا وارد کنید">
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="c-form-account__row c-form-account__row--submit">
                                <div class="c-form-account__col">
                                    <button class="btn-password-change" id="btnSubmit">تغییر رمز عبور</button>
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

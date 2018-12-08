
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name=”robots” content=”noindex,nofollow”>

    <title>فراموشی کلمه عبور</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

    <link rel="stylesheet" href="https://statics.arastowel.com/css/material-design.css">

    <!-- Main css -->
    <link rel="stylesheet" href="/css/login.css">
</head>
<body>

<div class="main">


    <!-- Sing in  Form -->
    <section class="sign-in" >
        <div class="container">
            <div class="signin-content">
                <div class="signin-image">
                    <figure><img src="https://statics.arastowel.com/images/104.jpg" alt="فراموشی کلمه عبور"></figure>
                    <a href="{{route('index')}}" class="signup-image-link">بازگشت به صفحه اصلی</a>
                    <a href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" class="signup-image-link">خروج از حساب کاربری</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
                <div class="signin-form" style="    margin-top: 16px;">
                    <h2 class="form-title text-md-center" style="    font-size: 24px;
    width: 240px;
    height: 40px;">لطفا ایمیل خود را تایید کنید</h2>
                    @if (session('resent'))
                        <div class="alert alert-success" style="direction: rtl" role="alert">
                            {{ __('لینک جدید به آدرس ایمیل شما ارسال شد') }}
                        </div>
                    @endif
                    <p style="text-align: right">یک لینک تاییدیه برای ایمیل شما ارسال شد، لطفا از طریق آن ایمیل خود را تایید کنید</p>
                    <p style="direction: rtl;text-align: right;">این ایمیل ممکن است در فولدر spam شما باشد</p>
                    <p style="direction: rtl;text-align: right;">در صورتی که ایمیلی دریافت نکردید روی دکمه زیر کلیک کنید</p>

                        <div class="form-group form-button">
                            <button type="submit" name="signin" id="signin" style="padding: 0!important;" class="form-submit"><a href="{{ route('verification.resend') }}" style="line-height: 34px;
    z-index: 999999;
    color: #fff;
    display: block;
    width: 200px;
    height: 33px;"> ارسال مجدد لینک تاییدیه</a></button>
                        </div>
                    {{--<div class="social-login">--}}
                    {{--<span class="social-label">یا از این طریق وارد شوید: </span>--}}
                    {{--<ul class="socials">--}}
                    {{--<li><a href="#"><i class="display-flex-center zmdi zmdi-facebook"></i></a></li>--}}
                    {{--<li><a href="#"><i class="display-flex-center zmdi zmdi-twitter"></i></a></li>--}}
                    {{--<li><a href="#"><i class="display-flex-center zmdi zmdi-google"></i></a></li>--}}
                    {{--</ul>--}}
                    {{--</div>--}}
                </div>
            </div>
        </div>
    </section>

</div>

<!-- JS -->
<script src="https://statics.arastowel.com/js/login.js"></script>

</body>
</html>
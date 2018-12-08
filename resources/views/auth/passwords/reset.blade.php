
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
                    <figure><img src="https://statics.arastowel.com/images/104.jpg" alt="sing up image"></figure>
                    <a href="{{route('index')}}" class="signup-image-link">بازگشت به صفحه اصلی</a>
                </div>

                <div class="signin-form" style="    margin-top: 16px;">
                    <h2 class="form-title text-md-center" style="    font-size: 24px;
    width: 200px;
    height: 40px;">تغییر کلمه عبور</h2>
                    <form method="POST" action="{{ route('password.update') }}" class="register-form" id="login-form">
                        @csrf
                        <input type="hidden" name="token" value="{{ $token }}">

                        @if ($errors->has('email'))
                            <div class="alert alert-danger text-center" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </div>
                        @endif
                        @if ($errors->has('password'))
                            <div class="alert alert-danger text-center" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </div>
                        @endif
                        <div class="form-group">
                            <label for="email" ><i class="fa fa-user material-icons-name"></i></label>
                            <input type="text" name="email"  id="email" placeholder="ایمیل" value="{{ $email ?? old('email') }}" required autofocus/>
                        </div>


                        <div class="form-group">
                            <label for="password"><i class="fa fa-lock"></i></label>
                            <input type="password" value="" name="password" id="password" required placeholder="کلمه عبور جدید"/>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm"><i class="fa fa-lock"></i></label>
                            <input type="password" value="" id="password-confirm" name="password_confirmation"  required placeholder="تکرار کلمه عبور جدید"/>
                        </div>


                        <div class="form-group form-button">
                            <input type="submit" name="signin" id="signin" class="form-submit" value="تغییر کلمه عبور"/>
                        </div>
                    </form>
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
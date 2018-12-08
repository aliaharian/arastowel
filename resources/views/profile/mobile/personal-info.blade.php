<!DOCTYPE html>
<html lang="fa">
<head>
    <title>اطلاعات فردی - حوله ارس</title>
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
                <div class="c-profile-info">
                    <div class="o-headline o-headline--profile">
                        <span>اطلاعات شخصی</span>
                    </div>
                    <div class="o-collapse">

                        <div class="o-round-cart c-profile-info__box">
                            <section class="c-profile-info__box-section">
                                <div class="c-profile-info__row">
                                    <div class="c-profile-info__label">تصویر پروفایل:</div>
                                    <div class="c-profile-info__value">
                                        <img class="c-profile-info__image" src="{{\Illuminate\Support\Facades\Auth::user()->avatar}}">
                                    </div>
                                </div>
                                <div class="c-profile-info__row">
                                    <div class="c-profile-info__label">نام و نام خانوادگی:</div>
                                    <div class="c-profile-info__value">{{\Illuminate\Support\Facades\Auth::user()->name}} {{\Illuminate\Support\Facades\Auth::user()->last_name}}</div>
                                </div>
                                <div class="c-profile-info__row">
                                    <div class="c-profile-info__label">شماره تلفن همراه:</div>
                                    <div class="c-profile-info__value">{{$additional_information->value('phone_number')}}
                                        @if($additional_information->value('phone_number')=='') - @endif
                                    </div>
                                </div>
                                <div class="c-profile-info__row">
                                    <div class="c-profile-info__label">پست الکترونیک:</div>
                                    <div class="c-profile-info__value">
                                        {{\Illuminate\Support\Facades\Auth::user()->email}}
                                    </div>
                                </div><div class="c-profile-info__row">
                                    <div class="c-profile-info__label">کد ملی:</div>
                                    <div class="c-profile-info__value">{{$additional_information->value('national_number')}}
                                        @if($additional_information->value('national_number')=='') - @endif
                                    </div>
                                </div>
                                <div class="c-profile-info__row c-profile-info__row--no-border">
                                    <div class="c-profile-info__label">شماره کارت:</div>
                                    <div class="c-profile-info__value c-profile-info__value--ltr"> @php
                                            $newcard='-';
                                            if (strlen($additional_information->value('card_number'))==16){
                                            $card=str_split($additional_information->value('card_number'),4);
                                            $newcard=$card[0].'-'.$card[1].'-'.$card[2].'-'.$card[3];
                                            }
                                        @endphp

                                        {{$newcard}}
                                    </div>
                                </div>
                            </section>
                            <div class="c-profile-info__actions">
                                <a href="/profile/additional-info/" class="c-profile-info__action js-edit-profile-button">ویرایش</a>
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

</body>
</html>

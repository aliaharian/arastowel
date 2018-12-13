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
                    <div class="o-grid">
                        <div class="row">
                            <div class="col-12">
                                <div class="o-headline o-headline--profile">
                                    <span>اطلاعات شخصی</span>
                                </div>
                                <div class="c-profile-stats" style="    padding-bottom: 5px;
">
                                    <div class="c-profile-stats__row">
                                        <div class="c-profile-stats__col">
                                            <p>
                                                <span>نام و نام خانوادگی:</span>
                                                {{\Illuminate\Support\Facades\Auth::user()->name}} {{\Illuminate\Support\Facades\Auth::user()->last_name}}
                                            </p>
                                        </div>
                                        <div class="c-profile-stats__col">
                                            <p>
                                                <span>پست الکترونیک :</span>
                                                <span class="c-profile-stats__value">
                                                    {{\Illuminate\Support\Facades\Auth::user()->email}}
                                                </span>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="c-profile-stats__row">
                                        <div class="c-profile-stats__col">
                                            <p>
                                                <span>شماره تلفن همراه:</span>
                                                {{$additional_information->value('phone_number')}}
                                                @if($additional_information->value('phone_number')=='') - @endif
                                            </p>
                                        </div>
                                        <div class="c-profile-stats__col">
                                            <p>
                                                <span>کد ملی:</span>
                                                {{$additional_information->value('national_number')}}
                                                @if($additional_information->value('national_number')=='') - @endif
                                            </p>
                                        </div>
                                    </div>
                                    <div class="c-profile-stats__row">
                                        <div class="c-profile-stats__col">
                                            <p>
                                                <span>دریافت خبرنامه:</span>
                                                @if($additional_information->value('newsletter')==1)
                                                    بله
                                                    @else
                                                    خیر
                                                @endif
                                            </p>
                                        </div>
                                        <div class="c-profile-stats__col">
                                            <p>
                                                <span>شماره کارت:</span>
                                                <span class="c-profile-stats__value">

                                                    @php
                                                    $newcard='-';
                                                    if (strlen($additional_information->value('card_number'))==16){
                                                    $card=str_split($additional_information->value('card_number'),4);
                                                    $newcard=$card[0].'-'.$card[1].'-'.$card[2].'-'.$card[3];
                                                    }
                                                    @endphp

                                                {{$newcard}}

                                                </span>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="c-profile-stats__action" style="    padding-bottom: 0px;">
                                        <a href="/profile/additional-info/" class="btn-link-spoiler btn-link-spoiler--edit fa fa-pencil">   ویرایش
                                            اطلاعات شخصی</a>
                                    </div>
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

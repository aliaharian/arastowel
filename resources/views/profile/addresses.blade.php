<!DOCTYPE html>
<html lang="fa">
<head>
    <title>آدرس های شما - فروشگاه اینترنتی حوله ارس</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://arastowel.com/css/profile.css">

    @include('includes.headLinks')
    <script defer src="/js/jquery-bootstrap.js"></script>

</head>
<body >

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
                {{--<div class="c-profile-empty">--}}
                    {{--<i class="fa fa-exclamation-circle fa-2x"></i>--}}
                    {{--موردی برای نمایش وجود ندارد!--}}
                {{--</div>--}}




                <section class="c-profile-wishlist">
                    <div class="c-profile-navbar">
                        <h4>آدرس</h4>
                    </div>
                    <div class="o-grid">
                        <div id="address-section">
                            <div class="row">
                               @if(count($addresses)==0)
                                <a href="/profile/addresses/add?callback=profile" class="c-profile-address-container">
                                    <button class="c-profile-address-add js-add-address-btn">
                                        <i class="fa fa-map-marker fa-2x"></i>
                                        افزودن آدرس جدید</button>
                                </a>
                                @else
                                <div class="c-profile-address-container js-user-address-container">
                                    <div class="c-profile-address-card">
                                        @foreach($addresses as $address)
                                        <div class="c-profile-address-card__desc">
                                            <h4 class="js-address-full_name">{{$address->name}} {{$address->last_name}}</h4>
                                            <p class="c-checkout-address__text js-user-address">
                                                استان <span  class="js-address-state">تهران</span>، شهرستان <span  class="js-address-city">{{\App\country::where('id',$address->country_id)->value('name')}}</span>،
                                                شهر <span  class="js-address-district">{{\App\city::where('id',$address->city_id)->value('name')}}</span>،
                                                <span class="js-address-address-part">{{$address->address}}</span>
                                            </p>
                                        </div>

                                        <div class="c-profile-address-card__data">
                                            <ul class="c-profile-address-card__methods">
                                                <li class="c-profile-address-card__method c-profile-address-card__method--post">کدپستی : <span class="js-address-post_code">{{$address->postal_code}}</span>
                                                </li>
                                                <li class="c-profile-address-card__method c-profile-address-card__method--mobile">تلفن همراه : <span class="js-address-mobile_phone" >{{$address->phone_number}}</span>
                                                </li>
                                            </ul>
                                            <div class="c-profile-address-card__actions">
                                                <a href="{{route('profile.address.edit')}}" class="btn-note js-edit-address-btn">ویرایش</a>
                                                <form action="{{route('profile.address.destroy')}}" method="post">
                                                    {{method_field('delete')}}
                                                    {{csrf_field()}}
                                                    <button class="btn-note js-remove-address-btn" type="submit">حذف</button>
                                                </form>

                                            </div>
                                        </div>

                                            @endforeach
                                    </div>
                                </div>
                                        @endif

                            </div>
                        </div>
                    </div>
                </section>
            </div>


        </div>
    </div>
</section>


<!-- Footer -->
@include('includes.footer')
@include('includes.footerLinks')

</body>
</html>

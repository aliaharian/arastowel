<!DOCTYPE html>
<html lang="fa">
<head>
    <title>آدرس ها - حوله ارس</title>
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
                {{--<div class="c-profile-empty">--}}
                {{--<i class="fa fa-exclamation-circle fa-2x"></i>--}}
                {{--موردی برای نمایش وجود ندارد!--}}
                {{--</div>--}}
                <div class="c-profile-address">
                    @if(count($addresses)==0)


                    <div class="o-collapse">
                        <div class="o-round-cart c-profile-address__headline">
                            <span>آدرس جدید</span>
                            <a href="/profile/addresses/add?callback=profile" class="c-profile-address__add-address js-add-address-btn">
                                <i class="fa fa-plus" style="padding-left: 10px"></i>
                                افزودن آدرس
                            </a>
                        </div>
                    </div>
                    @else
                    <div id="address-section">
                        <div class="o-collapse js-user-address-container">
                            @foreach($addresses as $address)

                            <div class="o-round-cart c-profile-address__item">
                                <div class="o-cart-header">{{$address->name}} {{$address->last_name}}</div>
                                <p class="c-checkout-address__text js-user-address">
                                    استان <span  class="js-address-state">تهران</span>، شهرستان <span class="js-address-city">{{\App\country::where('id',$address->country_id)->value('name')}}</span>،
                                    شهر <span class="js-address-district">{{\App\city::where('id',$address->city_id)->value('name')}}</span>،
                                    <span class="js-address-address-part">{{$address->address}}</span>
                                </p>
                                <div class="c-profile-address__item-contacts">
                                    <p class="c-profile-address__item-contact c-profile-address__item-contact--message">
                                        <span>کد پستی :</span>
                                        <span>{{$address->postal_code}}</span>
                                    </p>
                                    <p class="c-profile-address__item-contact c-profile-address__item-contact--phone">
                                        <span>تلفن همراه :</span>
                                        <span>{{$address->phone_number}}</span>
                                    </p>
                                </div>
                                <div class="c-profile-address__item-actions">
                                    <a href="{{route('profile.address.edit')}}" class="c-profile-address__item-action js-edit-address-btn">
                                        ویرایش
                                    </a>
                                    <form action="{{route('profile.address.destroy')}}" method="post">
                                        {{method_field('delete')}}
                                        {{csrf_field()}}
                                    <button type="submit" class="c-profile-address__item-action c-profile-address__item-action--remove js-remove-address-btn" >حذف
                                    </button>
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
    </div>
</section>


<!-- Footer -->
@include('includes.footer')
@include('includes.footerLinks')

</body>
</html>

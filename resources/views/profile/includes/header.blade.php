<div class="c-profile-box">
                    <div class="c-profile-box__header">
                        <div class="c-profile-box__avatar js-user-avatar" style=""></div>
                        <button class="c-profile-box__btn-edit js-change-avatar fa fa-edit"></button>
                    </div>
                    <div class="c-profile-box__username">{{\Illuminate\Support\Facades\Auth::user()->name}} {{\Illuminate\Support\Facades\Auth::user()->last_name}}</div>
<div class="c-profile-box__tabs"><a href="{{route('profile.reset-password')}}" class="c-profile-box__tab c-profile-box__tab--access fa fa-key">تغییر رمز</a>
    <a class="c-profile-box__tab c-profile-box__tab--sign-out fa fa-sign-out" href="{{ route('logout') }}"
       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
        خروج از حساب
    </a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
</div>
</div>
@php
    $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
@endphp
<div class="c-profile-menu">
    <div class="c-profile-menu__header">حساب کاربری شما</div>
    <ul class="c-profile-menu__items">
        <li>
            <a href="{{route('profile.index')}}" class="@if($actual_link==route('profile.index')) is-active @endif c-profile-menu__url c-profile-menu__url--dashboard fa-user">پروفایل</a>
        </li>
        <li>
            <a href="{{route('profile.orders')}}" class="@if($actual_link==route('profile.orders')) is-active @endif c-profile-menu__url c-profile-menu__url--dashboard  fa-shopping-basket">همه سفارش‌ها</a>
        </li>
        <li>
            <a href="{{route('profile.favorites')}}" class="@if($actual_link==route('profile.favorites')) is-active @endif c-profile-menu__url c-profile-menu__url--dashboard fa-heart-o"> لیست علاقه‌مندی‌ها </a>
        </li>
        <li>
            <a href="{{route('profile.giftcards')}}" class="@if($actual_link==route('profile.giftcards')) is-active @endif c-profile-menu__url c-profile-menu__url--dashboard fa-gift">کارت‌های هدیه</a>
        </li>
        <li>
            <a href="{{route('profile.order-tracking')}}" class="@if($actual_link==route('profile.order-tracking')) is-active @endif c-profile-menu__url c-profile-menu__url--dashboard fa-search">پیگیری خرید</a>
        </li>
        <li>
            <a href="{{route('profile.addresses')}}" class="@if($actual_link==route('profile.addresses')) is-active @endif c-profile-menu__url c-profile-menu__url--dashboard fa-map-marker">آدرس‌</a>
        </li>
        <li>
            <a href="{{route('profile.personal-info')}}" class="@if($actual_link==route('profile.personal-info')) is-active @endif c-profile-menu__url c-profile-menu__url--dashboard fa-user-circle-o">اطلاعات شخصی</a>
        </li>
    </ul>
</div>
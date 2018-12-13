@php
    $agent=new \Jenssegers\Agent\Agent();
@endphp
@if($agent->isMobile() || $agent->isTablet())
    <div class="t-center s-text8 p-t-15" style="font-family: Montserrat-Regular!important;font-size: 14px;padding-bottom: 15px;background: #222;text-align: center">
        Copyright 2019 © All Rights Reserved for Arastowel.com
        <div style="text-align: center">
            <a  title="موسسه نصیرزاده" href="https://nasirzadeh.com"   target="_blank" class="fs-18 color1 p-l-20 nsfooter" style="display: inline-block;width: 30px;height: 30px;background-position: center;background-size: contain;background-repeat: no-repeat;"></a>
            <a  title="موسسه نصیرزاده" href="https://nasirzadeh.com" target="_blank" style="font-size: 8px!important;display: inline-block;transform: translateY(-10px);">Graphic Design/H.Nasirzadeh <span style="font-size: 14px;">&#8226;</span>  Developed By A. Aharian</a>
        </div>
    </div>

@else
    <div class="t-center s-text8 p-t-15" style="font-family: Montserrat-Regular!important;font-size: 14px;padding-bottom: 15px;background: #222;">
        Copyright 2019 © All Rights Reserved for ARASTOWEL.COM
        <div class="pull-left" style="position: relative">
            <a  title="موسسه نصیرزاده" href="https://nasirzadeh.com"   target="_blank" class="fs-18 color1 p-l-20 nsfooter" style="bottom: -33px;left: 66px;position: absolute;display: block; width: 30px;height: 30px;background-position: center;background-size: contain;background-repeat: no-repeat;padding-left: 45px;padding-bottom: 15px;"></a>
            <a  title="موسسه نصیرزاده" href="https://nasirzadeh.com" target="_blank" style="float: right;position: absolute;left: 100px;width:232px;text-align:left;font-size: 8px!important;line-height:30px!important;padding-top: 3px;">Graphic Design/H.Nasirzadeh <span style="font-size: 14px;line-height: 30px!important;">&#8226;</span>  Developed By A. Aharian</a>
        </div>
    </div>

@endif
<!-- Back to top -->
<div class="btn-back-to-top bg0-hov" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="fa fa-angle-double-up" aria-hidden="true"></i>
		</span>
</div>

<!-- Container Selection1 -->
<div id="dropDownSelect1"></div>

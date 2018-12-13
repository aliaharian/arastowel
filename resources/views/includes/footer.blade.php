<footer class="bg6 p-b-43 p-l-45 p-r-45" style="background-color: #323232;padding-top: 13px;">
    <div class="flex-w p-b-10" style="direction: rtl!important;">
        <div class="w-size8 p-t-30 p-l-15 p-r-15 respon3">
            <h4 class="s-text12 m-b-30" style="direction: rtl;text-align: right;">با ما در ارتباط باشید</h4>

            <div>

                <div class="s-text7 w-size27" itemscope itemtype="https://schema.org/Organization" style="direction: rtl;font-size: 16px;" >
                    <p style="color: #ccc" itemprop="telephone fa-2x"><i class="fa fa-phone"></i> ۰۲۱-۸۸۹۳۲۷۶۸ &nbsp;<br />
                        <i class="fa fa-mobile fa-2x"></i> ۰۹۱۲-۷۲۵۷۹۶۲&zwnj;&nbsp;</p>

                    <p style="color: #ccc"><i class="fa fa-envelope-o"></i><a itemprop="email" title="ایمیل حوله ارس" href="mailto:info@arastowel.com" style="color: #ccc"> info[at]arastowel[dot]com </a></p>


                </div>

                <div class="flex-m p-t-30">
                    <a title="فیسبوک" href="https://www.facebook.com/Arastowel/" style="border: none;" target="_blank" class="fs-18 color1 p-l-20 fa fa-facebook footerlinks"></a>
                    <a title="اینستاگرام" href="https://www.instagram.com/arastowel/" target="_blank" class="fs-18 color1 p-l-20 fa fa-instagram footerlinks"></a>
                    <a title="پینترست" href="https://www.pinterest.com/arastowel/" class="fs-18 color1 p-l-20 fa fa-pinterest-p footerlinks" target="_blank"></a>
                    <a title="لینکدین" href="https://www.linkedin.com/in/arastowel?trk=hp-identity-name" target="_blank" class="fs-18 color1 p-l-20 fa fa-linkedin footerlinks"></a>
                    <a title="توییتر" href="https://twitter.com/ArasTowel" class="fs-18 color1 p-l-20 fa fa-twitter footerlinks" target="_blank"></a>
                    <a title="یوتوب" href="https://www.youtube.com/channel/UCbPadIvVrH0MIciIZz52SGA"  target="_blank" class="fs-18 color1 p-l-20 fa fa-youtube footerlinks"></a>

                </div>
            </div>
        </div>

        <div class="w-size8 p-t-30 p-l-15 p-r-15 respon4 ">
            <h4 class="s-text12 m-b-30" style="direction: rtl;text-align: right;">
                دسته بندی ها
            </h4>

            <ul style="direction: rtl;text-align: right;">
                <li class="p-b-9">
                    <a title="حوله تن پوش" href="{{route('shop.category', ['category' => 'bathrobe-towel'])}}" class="s-text7">
                        حوله تن پوش
                    </a>
                </li>

                <li class="p-b-9">
                    <a title="تن پوش کودک" href="{{route('shop.category', ['category' => 'kids-towel'])}}" class="s-text7">
                         تن پوش کودک
                    </a>
                </li>

                <li class="p-b-9">
                    <a title="حوله دست و صورت" href="{{route('shop.category', ['category' => 'hands-towel'])}}" class="s-text7">
                        حوله دست و صورت
                    </a>
                </li>

                <li class="p-b-9">
                    <a title="حوله هدیه" href="{{route('gift-pack')}}" class="s-text7">
                        حوله هدیه
                    </a>
                </li>

                <li class="p-b-9">
                    <a title="حوله تبلیغاتی" href="{{route('promotional-towels')}}" class="s-text7">
                        حوله تبلیغاتی
                    </a>
                </li>
            </ul>
        </div>



        <div class="w-size8 p-t-30 p-l-15 p-r-15 respon4">
            <h4 class="s-text12 m-b-30" style="direction: rtl;text-align: right;">
                راهنمای خرید

            </h4>

            <ul style="direction: rtl;text-align: right;">
                <li class="p-b-9">
                    <a title="مراحل خرید اینترنتی" href="{{route('shopping-steps')}}" class="s-text7">
                        مراحل خرید اینترنتی
                    </a>
                </li>

                <li class="p-b-9">
                    <a title="بازگشت کالا" href="{{route('product-return')}}" class="s-text7">
                        بازگشت کالا
                    </a>
                </li>

                <li class="p-b-9">
                    <a title="چگونگی هزینه ارسال" href="{{route('freeshipping')}}" class="s-text7">
                        چگونگی هزینه ی ارسال
                    </a>
                </li>
            </ul>
        </div>

        <div class="w-size8 p-t-30 p-l-15 p-r-15 respon3">
            <h4 class="s-text12 m-b-30" style="direction: rtl;text-align: right;">بلاگ</h4>
            <div class="blog row" style="margin-right: 0">
                <ul style="direction: rtl;text-align: right;">
                    @php
                        $posts=\App\blog::where('published',1)->orderBy('updated_at', 'desc')->limit(3)->get();
                    @endphp
                    @foreach($posts as $post)
                        @if($post->published==1)
                    <li class="p-b-9">
                        <a title="{{$post->title}}" href="{{route('blog.post',['blog_id'=>$post->id,'blog_title'=>str_replace(' ','-',$post->title)])}}" class="s-text7">
                            {{$post->title}}
                        </a>
                    </li>


                        @endif
                    @endforeach
                </ul>


            </div>
        </div>
    </div>

    <div class="t-center p-l-15 p-r-15" >


    </div>
</footer>

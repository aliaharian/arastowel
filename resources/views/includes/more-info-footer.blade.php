<div class="c-footer__more-info">
    <div class="container">
        <div class="c-footer__description-content">
            <div class="c-footer__content">
                <article class="c-footer__seo">
                    <h1>برند حوله ارس ، تولیدکننده انواع حوله تن پوش ، حوله دست و صورت ، حوله حمام، حوله استخری ، پالتویی و ...</h1>
                    {{--<h2>حوله های زیبا و باکیفیت ارس، در رنگ بندی های متنوع </h2>--}}
                    <p>
                        <span class="c-footer__seo--content" id="seo-main-content">
                    <p>حوله ارس با بیش از پنجاه سال سابقهٔ تولید انواع
                        محصولات حوله
                        از جمله :
                        <a title="حوله های تن پوش" href="{{route('shop.category',['category'=>'bathrobe-towel'])}}">
                            حوله های تن پوش
                        </a>
                        ،
                        <a title="حوله پالتویی" href="{{route('shop.category',['category'=>'bathrobe-towel'])}}">
                            حوله پالتویی
                        </a>
                        ،
                        <a title="حوله هدیه" href="{{route('gift-pack')}}">
                            حوله هدیه
                        </a>
                        ،
                        <a title="حوله های تبلیغاتی" href="{{route('promotional-towels')}}">
                            حوله تبلیغاتی
                        </a>
                        ،
                        <a title="حوله کودک" href="{{route('shop.category',['category'=>'kids-towel'])}}">
                            حوله کودک
                        </a>
                        ،
                        <a title="حوله حمام" href="{{route('shop.category',['category'=>'hands-towel'])}}">
                            حوله حمام
                        </a>
                        ،
                        <a title="حوله استخری" href="{{route('shop.category',['category'=>'hands-towel'])}}">
                            حوله استخری
                        </a>
                        ،
                        <a title="حوله دست و صورت و آشپرخانه" href="{{route('shop.category',['category'=>'hands-towel'])}}">
                            حوله دست و صورت و حوله آشپزخانه
                        </a>
                        افتخار دارد تا با تلفیق هنر ، تخصص ، لطافت ، آرامش ، مسئولیت و تعهد اجتماعی ، اقتصاد و احترام به محیط زیست ، فرایند تولید حوله را با بهترین کیفیت به انجام برساند.</p>

                            </span>
                        <span class="c-footer__seo-readmore" id="js-footer-readmore-content">
                    <p>اکنون نیز جهت رفاه حال مشتریان عزیز و آسان نمودن خرید و مشاهده ی تمام تولیدات با رنگ ها و طرح های متنوع خدمت دیگری ارائه نموده است به این ترتیب که علاوه بر خرید های حضوری ؛ فروشگاه اینترنتی حوله ارس امکان خرید اینترنتی را نیز برای شما عزیزان فراهم نموده است. شما می توانید حوله انتخابی خود در طرح و رنگ دلخواه را با بهترین کیفیت تصویر و نزدیک به حولهٔ واقعی ، در وب سایت ما مشاهده نموده و با خاطری آسوده اقدام به خرید نمایید.</p>

                        </span>
                        <a title="مشاهده بیشتر" style="cursor: pointer" id="js-footer-readmore" onclick="show()">مشاهده بیشتر</a>
                        <br>


                    </p>
                </article>

                <article class="c-footer__seo" style="width: 40%!important;">
                    <div class="flex-w p-l-15 p-r-15 " style="padding-top: 35px;padding-bottom: 35px;" id="index-newsletter">
                        <div class="container">
                            <h2 class="title">عضویت در خبرنامه</h2>
                            <p>ثبت نام کنید و از جدید ترین اخبار و تخفیف های حوله ارس با خبر شوید</p>
                            <form id="form-bulten">
                                <input type="email" id="email-news" required name="email" placeholder="آدرس ایمیل">
                                <button type="button" id="newsletter">ثبت نام</button>
                            </form>
                        </div>
                    </div>
                </article>
            </div>
            </div>

    </div>
</div>
<script>
    var a=0;
    function show() {
        $('#js-footer-readmore-content').toggleClass('c-footer__seo-readmore');
        if(a===0){
            $('#js-footer-readmore').html('بستن');

            a=1;
        }else{
            $('#js-footer-readmore').html('مشاهده بیشتر');

            a=0;
        }

    }
</script>
<!DOCTYPE html>
<html lang="en-US" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--  
    Document Title
    =============================================
    -->
    <title>Roza Towel - buy the best towels - the most thirsty towel in the world !</title>
    <style>
      @media (max-width:640px) {
        #home {
          background-attachment:initial!important;
          background-position: center!important;
          background-repeat: no-repeat!important;
          background-size: cover!important;
        }
      }
      </style>
    <!--  
    Favicons
    =============================================
    -->
      <link rel="icon" href="https://statics.arastowel.com/images/rozafooter.jpg">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta name="msapplication-TileColor" content="#ffffff">

    <meta name="theme-color" content="#ffffff">
    <!--  
    Stylesheets
    =============================================
    
    -->
    <!-- Default stylesheets-->
    <link href="https://statics.arastowel.com/roza/css/bootstrap.min.css" rel="stylesheet">
    <!-- Template specific stylesheets-->
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Volkhov:400i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
    <link href="https://statics.arastowel.com/roza/css/animate.css" rel="stylesheet">
    <link href="https://statics.arastowel.com/roza/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://statics.arastowel.com/roza/css/et-line-font.css" rel="stylesheet">
    <link href="https://statics.arastowel.com/roza/css/flexslider.css" rel="stylesheet">
    <link href="https://statics.arastowel.com/roza/css/owl.carousel.min.css" rel="stylesheet">
    <link href="https://statics.arastowel.com/roza/css/owl.theme.default.min.css" rel="stylesheet">
    <link href="https://statics.arastowel.com/roza/css/magnific-popup.css" rel="stylesheet">
    <link href="https://statics.arastowel.com/roza/css/simpletextrotator.css" rel="stylesheet">
    <!-- Main stylesheet and color file-->
    <link href="https://statics.arastowel.com/roza/css/style.css" rel="stylesheet">
    <link id="color-scheme" href="https://statics.arastowel.com/roza/css/default.css" rel="stylesheet">

    <style>
      .displayblock{
        display: block;
      }
    </style>
  </head>
  <body data-spy="scroll" data-target=".onpage-navigation" data-offset="60">
    <main>
      <div class="page-loader">
        <div class="loader">Loading...</div>
      </div>
      <nav class="navbar navbar-custom navbar-fixed-top navbar-transparent" role="navigation">
        <div class="container">
          <div class="navbar-header">
            <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#custom-collapse" onclick="menu()"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button><a class="navbar-brand"><img alt="حوله رزا" src="https://statics.arastowel.com/roza/images/roza.png" style="width: 78px;"></a>
          </div>
          <div class="collapse navbar-collapse" id="custom-collapse">
            <ul class="nav navbar-nav navbar-right">
              <li><a class="section-scroll" href="#home" onclick="menu()">Home</a></li>
              <li><a class="section-scroll" href="#portfolio" onclick="menu()">Our Works</a></li>
              <li><a class="section-scroll" href="#about" onclick="menu()">About Us</a></li>
              <li><a class="section-scroll" href="#contact" onclick="menu()">Contact Us</a></li>
            </ul>
          </div>
        </div>
      </nav>
      @foreach($roza as $roza_content)
        @if($roza_content->position=='main_image')
      <section class="home-section bg-dark-60 portfolio-page-header parallax-bg" id="home" style="background-image: url({{$roza_content->image}})">
        <div class="titan-caption">
          <div class="caption-content">
            <div class="font-alt mb-30 titan-title-size-1">{!!$roza_content->upper_text!!}</div>
            <div class="font-alt mb-40 titan-title-size-4">{!!$roza_content->lower_text!!}</div><a class="section-scroll btn btn-border-w btn-round" href="#portfolio">Our Works</a>
          </div>
            @endif
            @endforeach
        </div>
      </section>
      <div class="main">
        <section class="module" id="portfolio">
          <div class="container">
            <div class="col-sm-6 col-sm-offset-3">
              <h2 class="module-title font-alt">Our Works</h2>
              <div class="module-subtitle font-serif"></div>
            </div>
            <div class="row">
              <!--<div class="col-sm-12">-->
                <!--<ul class="filter font-alt" id="filters">-->
                  <!--<li><a class="current wow fadeInUp" href="#" data-filter="*">All</a></li>-->
                  <!--<li><a class="wow fadeInUp" href="#" data-filter=".illustration" data-wow-delay="0.2s">Illustration</a></li>-->
                  <!--<li><a class="wow fadeInUp" href="#" data-filter=".marketing" data-wow-delay="0.4s">Marketing</a></li>-->
                  <!--<li><a class="wow fadeInUp" href="#" data-filter=".photography" data-wow-delay="0.6s">Photography</a></li>-->
                  <!--<li><a class="wow fadeInUp" href="#" data-filter=".webdesign" data-wow-delay="0.6s">Web Design</a></li>-->
                <!--</ul>-->
              <!--</div>-->
            </div>
            <ul class="works-grid works-grid-masonry works-grid-3 works-hover-d" id="works-grid">
              @foreach($roza as $roza_content)
                @if($roza_content->position=='img_1')
              <li class="work-item illustration webdesign">
                <a href="{{$roza_content->link}}">
                  <div class="work-image"><img src="{{$roza_content->image}}" alt="{{$roza_content->upper_text}}"/></div>
                  <div class="work-caption font-alt">
                    <h3 class="work-title">{{$roza_content->upper_text}}</h3>
                    <div class="work-descr">{{$roza_content->lower_text}}</div>
                  </div></a>
              </li>
                 @endif
                    @endforeach
                        @foreach($roza as $roza_content)
                            @if($roza_content->position=='img_2')
              <li class="work-item marketing photography"> <a href="{{$roza_content->link}}">
                  <div class="work-image"><img src="{{$roza_content->image}}" alt="{{$roza_content->upper_text}}"/></div>
                  <div class="work-caption font-alt">
                    <h3 class="work-title">{{$roza_content->upper_text}}</h3>
                    <div class="work-descr">{{$roza_content->lower_text}}</div>
                  </div></a></li>
                 @endif
                    @endforeach
                        @foreach($roza as $roza_content)
                            @if($roza_content->position=='img_3')
              <li class="work-item illustration photography"> <a href="{{$roza_content->link}}">
                  <div class="work-image"><img src="{{$roza_content->image}}" alt="{{$roza_content->upper_text}}"/></div>
                  <div class="work-caption font-alt">
                    <h3 class="work-title">{{$roza_content->upper_text}}</h3>
                    <div class="work-descr">{{$roza_content->lower_text}}</div>
                  </div></a></li>
                 @endif
                    @endforeach
                        @foreach($roza as $roza_content)
                            @if($roza_content->position=='img_4')
              <li class="work-item marketing photography"> <a href="{{$roza_content->link}}">
                  <div class="work-image"><img src="{{$roza_content->image}}" alt="{{$roza_content->upper_text}}"/></div>
                  <div class="work-caption font-alt">
                    <h3 class="work-title">{{$roza_content->upper_text}}</h3>
                    <div class="work-descr">{{$roza_content->lower_text}}</div>
                  </div></a></li>
                 @endif
                    @endforeach
                        @foreach($roza as $roza_content)
                            @if($roza_content->position=='img_5')
              <li class="work-item illustration webdesign"> <a href="{{$roza_content->link}}">
                  <div class="work-image"><img src="{{$roza_content->image}}" alt="{{$roza_content->upper_text}}"/></div>
                  <div class="work-caption font-alt">
                    <h3 class="work-title">{{$roza_content->upper_text}}</h3>
                    <div class="work-descr">{{$roza_content->lower_text}}</div>
                  </div></a></li>
                 @endif
                    @endforeach
                        @foreach($roza as $roza_content)
                            @if($roza_content->position=='img_6')
              <li class="work-item marketing webdesign"> <a href="{{$roza_content->link}}">
                  <div class="work-image"><img src="{{$roza_content->image}}" alt="{{$roza_content->upper_text}}"/></div>
                  <div class="work-caption font-alt">
                    <h3 class="work-title">{{$roza_content->upper_text}}</h3>
                    <div class="work-descr">{{$roza_content->lower_text}}</div>
                  </div></a></li>
                 @endif
                    @endforeach
                        @foreach($roza as $roza_content)
                            @if($roza_content->position=='img_7')
              <li class="work-item marketing webdesign"> <a href="{{$roza_content->link}}">
                  <div class="work-image"><img src="{{$roza_content->image}}" alt="{{$roza_content->upper_text}}"/></div>
                  <div class="work-caption font-alt">
                    <h3 class="work-title">{{$roza_content->upper_text}}</h3>
                    <div class="work-descr">{{$roza_content->lower_text}}</div>
                  </div></a></li>
                 @endif
                    @endforeach
                        @foreach($roza as $roza_content)
                            @if($roza_content->position=='img_8')
              <li class="work-item marketing"> <a href="{{$roza_content->link}}">
                  <div class="work-image"><img src="{{$roza_content->image}}" alt="{{$roza_content->upper_text}}"/></div>
                  <div class="work-caption font-alt">
                    <h3 class="work-title">{{$roza_content->upper_text}}</h3>
                    <div class="work-descr">{{$roza_content->lower_text}}</div>
                  </div></a></li>
                 @endif
                    @endforeach
                        @foreach($roza as $roza_content)
                            @if($roza_content->position=='img_9')
              <li class="work-item illustration photography"> <a href="{{$roza_content->link}}">
                  <div class="work-image"><img src="{{$roza_content->image}}" alt="{{$roza_content->upper_text}}"/></div>
                  <div class="work-caption font-alt">
                    <h3 class="work-title">{{$roza_content->upper_text}}</h3>
                    <div class="work-descr">{{$roza_content->lower_text}}</div>
                  </div></a></li>
                 @endif
                    @endforeach
                        @foreach($roza as $roza_content)
                            @if($roza_content->position=='img_10')
              <li class="work-item illustration marketing"> <a href="{{$roza_content->link}}">
                  <div class="work-image"><img src="{{$roza_content->image}}" alt="{{$roza_content->upper_text}}"/></div>
                  <div class="work-caption font-alt">
                    <h3 class="work-title">{{$roza_content->upper_text}}</h3>
                    <div class="work-descr">{{$roza_content->lower_text}}</div>
                  </div></a></li>
                 @endif
                    @endforeach
                        @foreach($roza as $roza_content)
                            @if($roza_content->position=='img_11')
              <li class="work-item illustration webdesign"> <a href="{{$roza_content->link}}">
                  <div class="work-image"><img src="{{$roza_content->image}}" alt="{{$roza_content->upper_text}}"/></div>
                  <div class="work-caption font-alt">
                    <h3 class="work-title">{{$roza_content->upper_text}}</h3>
                    <div class="work-descr">{{$roza_content->lower_text}}</div>
                  </div></a></li>
                 @endif
                    @endforeach

            </ul>
          </div>
        </section>
        <section class="module-small bg-dark">
          <div class="container">
            <div class="row">
              <div class="col-sm-6 col-sm-offset-3 text-center">
                @foreach($roza as $roza_content)
                  @if($roza_content->position=='contact_us')
                <h4 class="font-alt mb-20">{{$roza_content->upper_text}}</h4><a class="btn btn-border-w section-scroll" href="#contact">Contact Us</a>
              @endif
                  @endforeach
              </div>
            </div>
          </div>
        </section>
        <section class="module" id="about">
          <div class="container">
            <div class="row">
              <div class="col-sm-6 col-sm-offset-3">
                @foreach($roza as $roza_content)
                  @if($roza_content->position=='about_main')
                <h2 class="module-title font-alt">{{$roza_content->upper_text}}</h2>
                <div class="module-subtitle font-serif">{{$roza_content->lower_text}}</div>
                  @endif
                @endforeach
              </div>
            </div>
            <div class="row multi-columns-row post-columns">

              @foreach($roza as $roza_content)
                @if($roza_content->position=='about_1')

              <div class="col-sm-6 col-md-4 col-lg-4">
                <div class="post mb-20">
                  <div class="post-thumbnail"><a><img src="{{$roza_content->image}}" alt="{{$roza_content->upper_text}}"/></a></div>
                  <div class="post-header font-alt">
                    <h2 class="post-title"><a>{{$roza_content->upper_text}}</a></h2>

                  </div>
                  <div class="post-entry">
                    <p>{{$roza_content->lower_text}}</p>
                  </div>
                </div>
              </div>

                @endif
              @endforeach

              @foreach($roza as $roza_content)
                @if($roza_content->position=='about_2')
                    <div class="col-sm-6 col-md-4 col-lg-4">
                      <div class="post mb-20">
                        <div class="post-thumbnail"><a><img src="{{$roza_content->image}}" alt="{{$roza_content->upper_text}}"/></a></div>
                        <div class="post-header font-alt">
                          <h2 class="post-title"><a>{{$roza_content->upper_text}}</a></h2>

                        </div>
                        <div class="post-entry">
                          <p>{{$roza_content->lower_text}}</p>
                        </div>
                      </div>
                    </div>

                  @endif
              @endforeach

              @foreach($roza as $roza_content)
                @if($roza_content->position=='about_3')
                    <div class="col-sm-6 col-md-4 col-lg-4">
                      <div class="post mb-20">
                        <div class="post-thumbnail"><a><img src="{{$roza_content->image}}" alt="{{$roza_content->upper_text}}"/></a></div>
                        <div class="post-header font-alt">
                          <h2 class="post-title"><a>{{$roza_content->upper_text}}</a></h2>

                        </div>
                        <div class="post-entry">
                          <p>{{$roza_content->lower_text}}</p>
                        </div>
                      </div>
                    </div>

            </div>
                @endif
              @endforeach

            </div>
        </section>
          </div>
        <section class="module bg-dark-30" id="contact">
          <div class="container">
            <div class="row">
              <div class="col-sm-6 col-sm-offset-3">
                <h2 class="module-title font-alt">Contact us</h2>
                <div class="module-subtitle font-serif"></div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-8">
                <form id="contactForm" role="form" method="post" action="php/contact.php">
                  <div class="form-group">
                    <label class="sr-only" for="name">Name</label>
                    <input class="form-control" type="text" id="name" name="name" placeholder="Your Name*" required="required" data-validation-required-message="Please enter your name."/>
                    <p class="help-block text-danger"></p>
                  </div>
                  <div class="form-group">
                    <label class="sr-only" for="email">Email</label>
                    <input class="form-control" type="email" id="email" name="email" placeholder="Your Email*" required="required" data-validation-required-message="Please enter your email address."/>
                    <p class="help-block text-danger"></p>
                  </div>
                  <div class="form-group">
                    <textarea class="form-control" rows="7" id="message" name="message" placeholder="Your Message*" required="required" data-validation-required-message="Please enter your message."></textarea>
                    <p class="help-block text-danger"></p>
                  </div>
                  <div class="text-center">
                    <button class="btn btn-block btn-round btn-d" id="cfsubmit" type="submit">Submit</button>
                  </div>
                </form>
                <div class="ajax-response font-alt" id="contactFormResponse"></div>
              </div>
              <div class="col-sm-4">
                <div class="alt-features-item mt-xs-60">
                  <div class="alt-features-icon"><span class="fa fa-map"></span></div>
                  <h3 class="alt-features-title font-alt">Say Hello</h3>Email: <a href="mailto:info@arastowel.com" style="color: white"> info[at]rozatowel.ir </a>
                </div>
              </div>
            </div>
          </div>
        </section>

        <hr class="divider-d">
        <footer class="footer bg-dark">
          <div class="container">
            <div class="row">
              <div class="col-sm-6">
                <p class="copyright font-alt">&copy; 2019&nbsp;<a href="http://arastowel.com">Roza Towel</a>, All Rights Reserved</p>
              </div>
              <div class="col-sm-6">
                <div class="footer-social-links">
                  <a href="https://instagram.com/rozatowel"><i class="fa fa-instagram"></i></a>
                  <a href="https://twitter.com/rozatowel"><i class="fa fa-twitter"></i></a>
                  <a href="https://www.youtube.com/channel/UCbPadIvVrH0MIciIZz52SGA?view_as=subscriber"><i class="fa fa-youtube"></i></a>
                  <a href="https://www.linkedin.com/in/roza-towel-152234173/"><i class="fa fa-linkedin"></i></a>
                  <a href="https://www.pinterest.com/rozatowel/"><i class="fa fa-pinterest"></i></a>
                </div>
              </div>
            </div>
          </div>
        </footer>
        <div class="scroll-up"><a href="#totop"><i class="fa fa-angle-double-up"></i></a></div>
      </div>
    </main>
    <!--  
    JavaScripts
    =============================================
    -->
    <script src="https://statics.arastowel.com/roza/js/jquery.js"></script>
    <script src="https://statics.arastowel.com/roza/js/js/bootstrap.min.js"></script>
    <script src="https://statics.arastowel.com/roza/js/wow.js"></script>
    <script src="https://statics.arastowel.com/roza/js/jquery.mb.YTPlayer.js"></script>
    <script src="https://statics.arastowel.com/roza/js/isotope.pkgd.js"></script>
    <script src="https://statics.arastowel.com/roza/js/imagesloaded.pkgd.js"></script>
    <script src="https://statics.arastowel.com/roza/js/jquery.flexslider.js"></script>
    <script src="https://statics.arastowel.com/roza/js/owl.carousel.min.js"></script>
    <script src="https://statics.arastowel.com/roza/js/smoothscroll.js"></script>
    <script src="https://statics.arastowel.com/roza/js/jquery.magnific-popup.js"></script>
    <script src="https://statics.arastowel.com/roza/js/jquery.simple-text-rotator.min.js"></script>
    <script src="https://statics.arastowel.com/roza/js/plugins.js"></script>
    <script src="https://statics.arastowel.com/roza/js/main.js"></script>

  <script>
    function menu() {
        $('#custom-collapse').toggleClass('displayblock');
    }
  </script>
  </body>
</html>
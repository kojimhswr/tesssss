  
@extends('site.app')
@section('title', 'Homepage')
@section('content')
<main class="ps-main">
    <div class="owl-init slider-main owl-carousel" data-items="1" data-dots="false" data-nav="true">
        <div class="item-slide">
            <img src="{{asset('frontend/images/slider/3.jpg')}}">
        </div>
        <div class="item-slide rounded">
            <img src="{{asset('uploads/slider2.png')}}">
        </div>
        <div class="item-slide rounded">
            <img src="{{asset('uploads/slider3.png')}}">
        </div>
    </div>
    <div class="ps-section masonry-root pt-80 pb-40">
      <div class="ps-container">
        <div class="ps-section__content pb-50">
          <div class="masonry-wrapper" data-col-md="3" data-col-sm="2" data-col-xs="1" data-gap="30" data-radio="100%">
            <div class="ps-masonry">
              <div class="grid-sizer"></div>
              <div class="grid-item">
                <div class="grid-item__content-wrapper"><a class="ps-offer" href="product-detail.html"><img src="frontend/images/offer/nike-just-do-it-1.jpg" alt=""></a></div>
              </div>
              <div class="grid-item">
                <div class="grid-item__content-wrapper"><a class="ps-offer" href="product-detail.html"><img src="frontend/images/offer/Microsite-Vans-march.jpg" alt=""></a></div>
              </div>
              <div class="grid-item high">
                <div class="grid-item__content-wrapper"><a class="ps-offer" href="product-detail.html"><img src="frontend/images/offer/email_us_180730-W-NIKE_02.jpg" alt=""></a></div>
              </div>
              <div class="grid-item">
                <div class="grid-item__content-wrapper"><a class="ps-offer" href="product-detail.html"><img src="frontend/images/offer/home-2-3.jpg" alt=""></a></div>
              </div>
              <div class="grid-item">
                <div class="grid-item__content-wrapper"><a class="ps-offer" href="product-detail.html"><img src="frontend/images/offer/lot-textile-worn-sneakers-different-sizes-yellow-background_116441-65.jpg" alt=""></a></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="ps-section--features-product ps-section masonry-root pt-40 pb-80">
      <div class="ps-container">
        <div class="ps-section__header mb-50">
          <h3 class="ps-section__title2" data-mask="features">- Featured Products</h3>
          <ul class="ps-masonry__filter">
            <li class="current"><a href="#" data-filter="*">All</a></li>
          </ul>
        </div>
        <div class="ps-section__content pb-50">
          <div class="masonry-wrapper" data-col-md="4" data-col-sm="2" data-col-xs="1" data-gap="30" data-radio="100%">
            <div class="ps-masonry">
              <div class="grid-sizer"></div>
              @foreach ($products as $item)
                @if ($item->featured == 1)
              <div class="grid-item kids">
                <div class="grid-item__content-wrapper">
                  <div class="ps-shoe mb-30">
                    <div class="ps-shoe__thumbnail">
                    @if ($item->images->count() > 0)
                    
                      <div class="ps-badge"><span>New</span></div>
                      <div class="ps-badge ps-badge--sale ps-badge--2nd"><span>Sale</span></div><a class="ps-shoe__favorite" href="#"><i class="ps-icon-heart"></i></a><img src="{{ asset('storage/'.$item->images->first()->full) }}" alt=""><a class="ps-shoe__overlay" href="{{ route('product.show', $item->slug) }}"></a>
                    
                    @else
                    <img src="https://via.placeholder.com/176" alt=""><a class="ps-shoe__overlay" href="#"></a>
                    @endif
                    </div>
                    <div class="ps-shoe__content">
                      <div class="ps-shoe__variants">
                        @if ($item->images->count() > 0)
                        <div class="ps-shoe__variant normal">
                            @foreach($item->images as $image)
                            <img src="{{ asset('storage/'.$image->full) }}" alt="">
                            @endforeach
                        </div>
                        @endif
                        <select class="ps-rating ps-shoe__rating">
                          <option value="1">1</option>
                          <option value="1">2</option>
                          <option value="1">3</option>
                          <option value="1">4</option>
                          <option value="2">5</option>
                        </select>
                      </div>
                      <div class="ps-shoe__detail"><a class="ps-shoe__name" href="{{ route('product.show', $item->slug) }}">{{$item->name}}</a>
                        @if ($item->sale_price > 0)
                        <span class="ps-shoe__price">
                          <del>{{ config('settings.currency_symbol').$item->price }}</del> {{ config('settings.currency_symbol').$item->sale_price }}</span>
                        @else
                        <span class="ps-shoe__price">{{ config('settings.currency_symbol').$item->sale_price }}</span>
                        @endif
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              @endif
              @endforeach
            </div>
          </div>
        </div>
      </div>
    </div>
    
  <div class="ps-home-testimonial bg--parallax pb-80" data-background="{{asset('frontend/images/background/parallax.jpg')}}">
      <div class="container">
            <div class="ps-section__header mb-50">
                    <h3 class="ps-section__title1" data-mask="OUR"><span class="ourteam"></span></h3>
            </div>
            <div class="ps-section__header mb-50">
                    <h3 class="ps-section__title2" data-mask="TESTI"><span class="ourteam"></span></h3>
            </div>
            <div class="ps-section__header mb-50">
                <h3 class="ps-section__title" data-mask="MONY"><span class="ourteam"></span></h3>
        </div>
        <div class="owl-slider" data-owl-auto="true" data-owl-loop="true" data-owl-speed="5000" data-owl-gap="0" data-owl-nav="false" data-owl-dots="true" data-owl-item="1" data-owl-item-xs="1" data-owl-item-sm="1" data-owl-item-md="1" data-owl-item-lg="1" data-owl-duration="1000" data-owl-mousedrag="on" data-owl-animate-in="fadeIn" data-owl-animate-out="fadeOut">
          <div class="ps-testimonial">
            <div class="ps-testimonial__thumbnail"><img src="{{asset('frontend/images/testimonial/10.png')}}" alt=""><i class="fa fa-quote-left"></i></div>
            <header>
              <p>Bu Megawati</p>
            </header>
            <footer>
              <p>“Keren keren sepatu yang dijual di SIKIL, selain keren, pelayanannya juga MANTAP“</p>
            </footer>
          </div>
          <div class="ps-testimonial">
            <div class="ps-testimonial__thumbnail"><img src="{{asset('frontend/images/testimonial/4.png')}}" alt=""><i class="fa fa-quote-left"></i></div>
            <header>
              <p>Danila Riyadi</p>
            </header>
            <footer>
              <p>“SIKIL MANIA MANTAP“</p>
            </footer>
          </div>
          <div class="ps-testimonial">
            <div class="ps-testimonial__thumbnail"><img src="{{asset('frontend/images/testimonial/9.png')}}" alt=""><i class="fa fa-quote-left"></i></div>
            <header>
              <p>Mpok Jum</p>
            </header>
            <footer>
              <p>“Pokoknye mpok demen bener dah 'patu dari siniin, kage ade dah pokoknye di tempat lain“</p>
            </footer>
          </div>
        </div>
      </div>
    </div>
    <div class="ps-features pt-80 pb-80">
      <div class="ps-container">
        <div class="row">
              <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 ">
                <div class="ps-iconbox">
                  <div class="ps-iconbox__header"><i class="ps-icon-delivery"></i>
                    <h3>Free shipping</h3>
                    <p>ON ORDER OVER $199</p>
                  </div>
                  <div class="ps-iconbox__content">
                    <p>Want to track a package? Find tracking information and order details from Your Orders.</p>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 ">
                <div class="ps-iconbox">
                  <div class="ps-iconbox__header"><i class="ps-icon-money"></i>
                    <h3>100% MONEY BACK.</h3>
                    <p>WITHIN 30 DAYS AFTER DELIVERY.</p>
                  </div>
                  <div class="ps-iconbox__content">
                    <p>You may return most new, unopened items sold within 30 days of delivery for a full refund.</p>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 ">
                <div class="ps-iconbox">
                  <div class="ps-iconbox__header"><i class="ps-icon-customer-service"></i>
                    <h3>SUPPORT 24/7.</h3>
                    <p>WE CAN HELP YOU ONLINE.</p>
                  </div>
                  <div class="ps-iconbox__content">
                    <p>We offer a 24/7 customer hotline so you’re never alone if you have a question.</p>
                  </div>
                </div>
              </div>
        </div>
      </div>
    </div>
    <div class="ps-home-partner">
      <div class="ps-container">
        <div class="owl-slider itemputih" data-owl-auto="true" data-owl-loop="true" data-owl-speed="5000" data-owl-gap="40" data-owl-nav="false" data-owl-dots="false" data-owl-item="6" data-owl-item-xs="2" data-owl-item-sm="4" data-owl-item-md="5" data-owl-item-lg="6" data-owl-duration="1000" data-owl-mousedrag="on"><a href="#"><img src="{{asset('frontend/images/slider/1.png')}}" alt=""></a><a href="#"><img src="{{asset('frontend/images/slider/2.png')}}" alt=""></a><a href="#"><img src="{{asset('frontend/images/slider/4.png')}}" alt=""></a><a href="#"><img src="{{asset('frontend/images/slider/5.png')}}" alt=""></a><a href="#"><img src="{{asset('frontend/images/slider/6.png')}}" alt=""></a><a href="#"><img src="{{asset('frontend/images/slider/7.png')}}" alt=""></a><a href="#"><img src="{{asset('frontend/images/slider/8.png')}}" alt=""></a><a href="#"><img src="{{asset('frontend/images/slider/9.png')}}" alt=""></a>
        </div>
      </div>
    </div>
  </main>
  <script src="{{ asset('frontend/js/main.js') }}" type="text/javascript"></script>
  <script src="{{ asset('frontend/js/main.js') }}" type="text/javascript"></script>
  <script src="{{ asset('frontend/plugins/jquery/dist/jquery.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('frontend/plugins/bootstrap/dist/js/bootstrap.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('frontend/plugins/jquery-bar-rating/dist/jquery.barrating.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('frontend/plugins/owl-carousel/owl.carousel.min.js') }}"></script>
  <script src="{{ asset('frontend/plugins/gmap3.min.js') }}"></script>
  <script src="{{ asset('frontend/plugins/imagesloaded.pkgd.js') }}" type="text/javascript"></script>
  <script src="{{ asset('frontend/plugins/isotope.pkgd.min.js') }}"></script>
  <script src="{{ asset('frontend/plugins/bootstrap-select/dist/js/bootstrap-select.min.js') }}"></script>
  <script src="{{ asset('frontend/plugins/jquery.matchHeight-min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('frontend/plugins/slick/slick/slick.min.js') }}"></script>
  <script src="{{ asset('frontend/plugins/elevatezoom/jquery.elevatezoom.js') }}"></script>
  
  <script src="{{ asset('frontend/plugins/Magnific-Popup/dist/jquery.magnific-popup.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('frontend/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
  <script src="{{ asset('https://maps.googleapis.com/maps/api/js?key=AIzaSyA-XBs8xkUbYA0ykeWNnxWRP8SMOSQHFW8&amp;region=GB') }}"></script>
  <script src="{{ asset('frontend/plugins/revolution/js/jquery.themepunch.tools.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('frontend/plugins/slick/slick/slick.min.js') }}"></script>
  <script src="{{ asset('frontend/plugins/elevatezoom/jquery.elevatezoom.js') }}"></script>
  <script>
  $('.owl-carousel').owlCarousel({
    loop:true,
    rewind:true,
    center:true,
    autoplay:true,
    margin:10,
    dots:true,
    responsiveClass:true,
    responsive:{
        0:{
            items:1,
            nav:false,
            autoplay:true,
            dots:true
        },
        600:{
            items:1,
            autoplay:true,
            nav:false,
            dots:true
        },
        1000:{
            items:1,
            autoplay:true,
            nav:false,
            loop:true,
        }
    }
})</script>
  @stop
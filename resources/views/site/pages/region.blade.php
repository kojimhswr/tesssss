@extends('site.app')
@section('title', $region->name)
@section('content')
<main class="ps-main">
        <div class="ps-products-wrap pt-80 pb-80">
          <div class="ps-products" data-mh="product-listing">
            <div class="ps-section--offer mb-40">
              <div class="ps-column"><a class="ps-offer" href="product-listing.html"><img src="{{asset('frontend/images/banner/banner-1.jpg')}}" alt=""></a></div>
              <div class="ps-column"><a class="ps-offer" href="product-listing.html"><img src="{{asset('frontend/images/banner/banner-2.jpg')}}" alt=""></a></div>
            </div>
            <div class="ps-product-action">
              <div class="ps-pagination">
                <ul class="pagination">
                  <li><a href="#"><i class="fa fa-angle-left"></i></a></li>
                  <li class="active"><a href="#">1</a></li>
                  <li><a href="#">2</a></li>
                  <li><a href="#">3</a></li>
                  <li><a href="#">...</a></li>
                  <li><a href="#"><i class="fa fa-angle-right"></i></a></li>
                </ul>
              </div>
            </div>
            <div class="ps-product__columns">
            @forelse($region->products as $product)
              <div class="ps-product__column">
                <div class="ps-shoe mb-30">
                  @if ($product->images->count() > 0)
                  <div class="ps-shoe__thumbnail">
                    <img src="{{ asset('storage/'.$product->images->first()->full) }}" alt=""><a class="ps-shoe__overlay" href="{{ route('product.show', $product->slug) }}"></a>
                  </div>
                  <div class="ps-shoe__content">
                    <div class="ps-shoe__variants">
                    @if ($product->images->count() > 0)
                        <div class="ps-shoe__variant normal">
                            @foreach($product->images as $image)
                            <img src="{{ asset('storage/'.$image->full) }}" alt="">
                            @endforeach
                        </div>
                    @endif
                    @else
                    <div class="ps-shoe__thumbnail">
                      <img src="https://via.placeholder.com/176" alt=""><a class="ps-shoe__overlay" href="{{ route('product.show', $product->slug) }}"></a>
                    </div>
                    <div class="ps-shoe__content">
                        <div class="ps-shoe__variants">
                        @if ($product->images->count() > 0)
                            <div class="ps-shoe__variant normal">
                                <img src="https://via.placeholder.com/176" alt="">
                                <img src="https://via.placeholder.com/176" alt="">
                                <img src="https://via.placeholder.com/176" alt="">
                            </div>
                        @endif
                    @endif
                      <select class="ps-rating ps-shoe__rating">
                        <option value="1">1</option>
                        <option value="1">2</option>
                        <option value="1">3</option>
                        <option value="1">4</option>
                        <option value="2">5</option>
                      </select>
                    </div>
                    <div class="ps-shoe__detail"><a class="ps-shoe__name" href="{{ route('product.show', $product->slug) }}">{{$product->name}}</a>
                        @if ($product->sale_price > 0)
                        <span class="ps-shoe__price">
                          <del>{{ config('settings.currency_symbol').$product->price }}</del> {{ config('settings.currency_symbol').$product->sale_price }}</span>
                        @else
                        <span class="ps-shoe__price">{{ config('settings.currency_symbol').$product->price }}</span>
                        @endif
                    </div>
                  </div>
                </div>
              </div>
              @empty
              <h3>No Products found in {{ $region->name }}.</h3> 
              @endforelse
            </div>
           
            <div class="ps-pagination">
              <ul class="pagination">
                <li><a href="#"><i class="fa fa-angle-left"></i></a></li>
                <li class="active"><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">...</a></li>
                <li><a href="#"><i class="fa fa-angle-right"></i></a></li>
              </ul>
            </div>
          </div>
          <div class="ps-sidebar" data-mh="product-listing">
            <aside class="ps-widget--sidebar ps-widget--region">
              <div class="ps-widget__header">
                <h3>Region</h3>
              </div>
              <div class="ps-widget__content">
                <ul class="ps-list--checked">
                @foreach($regions as $cate)
                @foreach($cate->items as $regions)
                  <li><a href="{{ route('region.show', $regions->slug) }}" id="{{ $regions->slug }}">{{ $regions->name }}({{$regions->products->count()}})</a></li>
                  @endforeach
                  @endforeach
                </ul>
              </div>
            </aside>
  
            <!--aside.ps-widget--sidebar-->
            <!--    .ps-widget__header: h3 Ads Banner-->
            <!--    .ps-widget__content-->
            <!--        a(href='product-listing'): img(src="images/offer/sidebar.jpg" alt="")-->
            <!---->
            <!--aside.ps-widget--sidebar-->
            <!--    .ps-widget__header: h3 Best Seller-->
            <!--    .ps-widget__content-->
            <!--        - for (var i = 0; i < 3; i ++)-->
            <!--            .ps-shoe--sidebar-->
            <!--                .ps-shoe__thumbnail-->
            <!--                    a(href='#')-->
            <!--                    img(src="images/shoe/sidebar/"+(i+1)+".jpg" alt="")-->
            <!--                .ps-shoe__content-->
            <!--                    if i == 1-->
            <!--                        a(href='#').ps-shoe__title Nike Flight Bonafide-->
            <!--                    else if i == 2-->
            <!--                        a(href='#').ps-shoe__title Nike Sock Dart QS-->
            <!--                    else-->
            <!--                        a(href='#').ps-shoe__title Men's Shoe-->
            <!--                    p <del> £253.00</del> £152.00-->
            <!--                    a(href='#').ps-btn PURCHASE-->
          </div>
        </div>
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
</main>

@stop
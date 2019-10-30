@extends('site.app')
@section('title', $region->name)
@section('content')
{{-- <main class="ps-main">
        <div class="ps-packages-wrap pt-80 pb-80">
          <div class="ps-packages" data-mh="package-listing">
            <div class="ps-section--offer mb-40">
              <div class="ps-column"><a class="ps-offer" href="package-listing.html"><img src="{{asset('frontend/images/banner/banner-1.jpg')}}"
alt=""></a></div>
<div class="ps-column"><a class="ps-offer" href="package-listing.html"><img
            src="{{asset('frontend/images/banner/banner-2.jpg')}}" alt=""></a></div>
</div>
<div class="ps-package-action">
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
<div class="ps-package__columns">
    @forelse($region->packages as $package)
    <div class="ps-package__column">
        <div class="ps-shoe mb-30">
            @if ($package->images->count() > 0)
            <div class="ps-shoe__thumbnail">
                <img src="{{ asset('storage/'.$package->images->first()->full) }}" alt=""><a class="ps-shoe__overlay"
                    href="{{ route('package.show', $package->slug) }}"></a>
            </div>
            <div class="ps-shoe__content">
                <div class="ps-shoe__variants">
                    @if ($package->images->count() > 0)
                    <div class="ps-shoe__variant normal">
                        @foreach($package->images as $image)
                        <img src="{{ asset('storage/'.$image->full) }}" alt="">
                        @endforeach
                    </div>
                    @endif
                    @else
                    <div class="ps-shoe__thumbnail">
                        <img src="https://via.placeholder.com/176" alt=""><a class="ps-shoe__overlay"
                            href="{{ route('package.show', $package->slug) }}"></a>
                    </div>
                    <div class="ps-shoe__content">
                        <div class="ps-shoe__variants">
                            @if ($package->images->count() > 0)
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
                        <div class="ps-shoe__detail"><a class="ps-shoe__name"
                                href="{{ route('package.show', $package->slug) }}">{{$package->name}}</a>
                            @if ($package->sale_price > 0)
                            <span class="ps-shoe__price">
                                <del>{{ config('settings.currency_symbol').$package->price }}</del>
                                {{ config('settings.currency_symbol').$package->sale_price }}</span>
                            @else
                            <span class="ps-shoe__price">{{ config('settings.currency_symbol').$package->price }}</span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <h3>No Packages found in {{ $region->name }}.</h3>
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
    <div class="ps-sidebar" data-mh="package-listing">
        <aside class="ps-widget--sidebar ps-widget--region">
            <div class="ps-widget__header">
                <h3>Region</h3>
            </div>
            <div class="ps-widget__content">
                <ul class="ps-list--checked">
                    @foreach($regions as $cate)
                    @foreach($cate->items as $regions)
                    <li><a href="{{ route('region.show', $regions->slug) }}"
                            id="{{ $regions->slug }}">{{ $regions->name }}({{$regions->packages->count()}})</a></li>
                    @endforeach
                    @endforeach
                </ul>
            </div>
        </aside>

        <!--aside.ps-widget--sidebar-->
        <!--    .ps-widget__header: h3 Ads Banner-->
        <!--    .ps-widget__content-->
        <!--        a(href='package-listing'): img(src="images/offer/sidebar.jpg" alt="")-->
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
<script src="{{ asset('frontend/plugins/jquery-bar-rating/dist/jquery.barrating.min.js') }}" type="text/javascript">
</script>
<script src="{{ asset('frontend/plugins/owl-carousel/owl.carousel.min.js') }}"></script>
<script src="{{ asset('frontend/plugins/gmap3.min.js') }}"></script>
<script src="{{ asset('frontend/plugins/imagesloaded.pkgd.js') }}" type="text/javascript"></script>
<script src="{{ asset('frontend/plugins/isotope.pkgd.min.js') }}"></script>
<script src="{{ asset('frontend/plugins/bootstrap-select/dist/js/bootstrap-select.min.js') }}"></script>
<script src="{{ asset('frontend/plugins/jquery.matchHeight-min.js') }}" type="text/javascript"></script>
<script src="{{ asset('frontend/plugins/slick/slick/slick.min.js') }}"></script>
<script src="{{ asset('frontend/plugins/elevatezoom/jquery.elevatezoom.js') }}"></script>

<script src="{{ asset('frontend/plugins/Magnific-Popup/dist/jquery.magnific-popup.min.js') }}" type="text/javascript">
</script>
<script src="{{ asset('frontend/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<script
    src="{{ asset('https://maps.googleapis.com/maps/api/js?key=AIzaSyA-XBs8xkUbYA0ykeWNnxWRP8SMOSQHFW8&amp;region=GB') }}">
</script>
<script src="{{ asset('frontend/plugins/revolution/js/jquery.themepunch.tools.min.js') }}" type="text/javascript">
</script>
<script src="{{ asset('frontend/plugins/slick/slick/slick.min.js') }}"></script>
<script src="{{ asset('frontend/plugins/elevatezoom/jquery.elevatezoom.js') }}"></script>
</main> --}}
<style id='setsail-select-woo-inline-css' type='text/css'>
  .page-id-3084 .qodef-content .qodef-content-inner > .qodef-container > .qodef-container-inner, .page-id-3084 .qodef-content .qodef-content-inner > .qodef-full-width > .qodef-full-width-inner { padding: 0 0;}@media only screen and (max-width: 1024px) {.page-id-3084 .qodef-content .qodef-content-inner > .qodef-container > .qodef-container-inner, .page-id-3084 .qodef-content .qodef-content-inner > .qodef-full-width > .qodef-full-width-inner { padding: 0 30px ;}}.page-id-3084 .qodef-content .qodef-content-inner > .qodef-container > .qodef-container-inner, .page-id-3084 .qodef-content .qodef-content-inner > .qodef-full-width > .qodef-full-width-inner { padding: 0 0;}@media only screen and (max-width: 1024px) {.page-id-3084 .qodef-content .qodef-content-inner > .qodef-container > .qodef-container-inner, .page-id-3084 .qodef-content .qodef-content-inner > .qodef-full-width > .qodef-full-width-inner { padding: 0 30px ;}}
  </style>
<div class="qodef-content">
    <div class="qodef-content-inner">
        <div class="qodef-title-holder qodef-centered-type qodef-title-va-header-bottom qodef-preload-background qodef-has-bg-image qodef-bg-parallax"
            style="height: 520px;background-color: #f8f8f8;background-image:url({{ asset('storage/'.$region->image) }});"
            data-height="520">
            <div class="qodef-title-image">
            <img itemprop="image" src="{{ asset('storage/'.$region->image) }}" alt="s" />
            </div>
            <div class="qodef-title-wrapper" style="height: 520px">
                <div class="qodef-title-inner">
                    <div class="qodef-grid">
                        <h1 class="qodef-page-title entry-title">{{$region->name}}</h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="qodef-tours-search-page-holder">
            <div class="qodef-container">
                <div class="qodef-container-inner">
                    <div class="qodef-grid-row qodef-grid-large-gutter">
                        <div class="qodef-tours-search-content-holder">
                            <div class="qodef-tours-search-content-inner">
                                <div class="qodef-search-ordering-holder">
                                    <div class="qodef-search-ordering-items-holder">
                                        <ul class="qodef-search-ordering-list">
                                            <li class="qodef-search-ordering-item qodef-search-ordering-item-active"
                                                data-order-by="date" data-order-type="desc">
                                                <a href="#">
                                                    <i class="qodef-search-ordering-icon icon_calendar"></i>
                                                    <span class="qodef-search-ordering-title">DATE</span>
                                                </a>
                                            </li>
                                            <li class="qodef-search-ordering-item " data-order-by="price"
                                                data-order-type="asc">
                                                <a href="#">
                                                    <i class="qodef-search-ordering-icon icon_upload"></i>
                                                    <span class="qodef-search-ordering-title">PRICE LOW TO HIGH</span>
                                                </a>
                                            </li>
                                            <li class="qodef-search-ordering-item " data-order-by="price"
                                                data-order-type="desc">
                                                <a href="#">
                                                    <i class="qodef-search-ordering-icon icon_download"></i>
                                                    <span class="qodef-search-ordering-title">PRICE HIGH TO LOW</span>
                                                </a>
                                            </li>
                                            <li class="qodef-search-ordering-item " data-order-by="name"
                                                data-order-type="asc">
                                                <a href="#">
                                                    <i class="qodef-search-ordering-icon icon_pens"></i>
                                                    <span class="qodef-search-ordering-title">NAME (A - Z)</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="qodef-tours-search-content-wrapper qodef-grid-large-gutter">
                                    <div class="qodef-grid-col-9">
                                        <div class="qodef-tours-search-content">
                                            <div
                                                class="qodef-tours-row qodef-tr-normal-space qodef-tours-columns-1 list">
                                                <div class="qodef-tours-row-inner-holder qodef-grid-normal-gutter">
                                                    @forelse($region->packages as $package)
                                                    <div
                                                    class="qodef-tours-list-item qodef-tours-row-item qodef-item-space post-3102 tour-item type-tour-item status-publish has-post-thumbnail hentry tour-attribute-5-star-accommodation tour-attribute-airport-transfer-2 tour-attribute-breakfast tour-attribute-personal-guide">
                                                        <div class="qodef-tours-list-item-table">
                                                            <div class="qodef-tours-list-item-image-holder">
                                                                <div class="qodef-tours-list-item-image-holder-inner">
                                                                    @if ($package->images->count() > 0)
                                                                    <a href="{{ route('package.show', $package->slug) }}">
                                                                        <img width="1100" height="650"
                                                                            src="{{ asset('storage/'.$package->images->first()->full) }}"
                                                                            class="attachment-setsail_select_image_landscape size-setsail_select_image_landscape"
                                                                            alt="c" /> 
                                                                    </a>
                                                                    @else
                                                                    <a href="{{ route('package.show', $package->slug) }}">
                                                                        <img width="1100" height="650"
                                                                            src="https://via.placeholder.com/176"
                                                                            class="attachment-setsail_select_image_landscape size-setsail_select_image_landscape"
                                                                            alt="c" /> 
                                                                    </a>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                                <div class="qodef-tours-list-item-content-holder">
                                                                    <div class="qodef-tli-content-inner">
                                                                        <div class="qodef-tours-list-item-title-price-holder">
                                                                            <h4 class="qodef-tour-title">
                                                                                <a href="{{ route('package.show', $package->slug) }}">{{$package->name}}</a>
                                                                            </h4>
                                                                        </div>
                                                                        <div class="qodef-tours-list-item-excerpt">
                                                                            {!! str_limit($package->description, 40) !!}
                                                                        </div>
                                                                        <div class="qodef-tours-list-item-price-and-rating-holder">
                                                                            @if ($package->sale_price > 0)
                                                                            <span class="qodef-tours-item-price-holder">
                                                                                <span class="qodef-tours-price-holder">
                                                                                    <span
                                                                                        class="qodef-tours-item-price "><del>{{ config('settings.currency_symbol').$package->price }}</del>  {{ config('settings.currency_symbol').$package->sale_price }}</span>
                                                                                </span>
                                                                            </span>
                                                                            @else
                                                                            <span class="qodef-tours-item-price-holder">
                                                                                <span class="qodef-tours-price-holder">
                                                                                    <span
                                                                                        class="qodef-tours-item-price ">{{ config('settings.currency_symbol').$package->price }}</span>
                                                                                </span>
                                                                            </span>
                                                                            @endif
                                                                        </div>
                                                                        <div class="qodef-tours-list-item-bottom-info">
                                                                          <div class="qodef-tours-list-item-bottom-item">
                                                                            <div class="qodef-tour-duration-holder">
                                                                              <span class="qodef-tour-duration-icon qodef-tour-info-icon">
                                                                                <span class="icon_calendar"></span>
                                                                              </span>
                                                                              <span class="qodef-tour-info-label">
                                                                                 From <b>{{$package->start}}</b> <br> <span class="icon_calendar"></span>To <b>{{$package->end}}</b>
                                                                              </span>
                                                                            </div>
                                                                            </div>
                                                                            <div class="qodef-tours-list-item-bottom-item">
                                                                            </div>
                                                                            </div>
                                                                      </div>
                                                                </div>
                                                              </div>
                                                              
                                                        </div>
                                                        @empty
                                                              <h3>No Packages found in {{ $region->name }}.</h3>
                                                              @endforelse
                                                      </div>
                                                    </div>
                                            </div>
                                        </div>
                                    <div class="qodef-grid-col-3">
                                        <aside class="qodef-sidebar">
                                            <div class="widget qodef-tours-main-search-filters">
                                                <div class="qodef-tours-search-main-filters-holder qodef-boxed-widget">
                                                    <form action="https://setsail.select-themes.com/tours-search-page/"
                                                        method="GET">
                                                        <div class="qodef-tours-search-main-filters-title">
                                                            <h4>Plan Your Trip</h4>
                                                        </div>
                                                        <div class="qodef-tours-search-main-filters-text">
                                                            <p>It’s time to plan just the perfect vacation!</p>
                                                        </div>
                                                        <input type="hidden" name="order_by" value="date">
                                                        <input type="hidden" name="order_type" value="desc">
                                                        <input type="hidden" name="view_type" value="standard">
                                                        <input type="hidden" name="page" value="1">
                                                        <div class="qodef-tours-search-main-filters-fields">
                                                            <div class="qodef-tours-input-with-icon">
                                                                <span class="qodef-tours-input-icon">
                                                                    <span class="icon_search"></span>
                                                                </span>
                                                                <input class="qodef-tours-keyword-search" value=""
                                                                    type="text" name="keyword"
                                                                    placeholder="Search Tour">
                                                            </div>
                                                            <div class="qodef-tours-input-with-icon">
                                                                <span class="qodef-tours-input-icon">
                                                                    <span class="icon_compass"></span>
                                                                </span>
                                                                <input type="text" value=""
                                                                    class="qodef-tours-destination-search"
                                                                    name="destination" placeholder="Where To?">
                                                            </div>
                                                            <div class="qodef-tours-input-with-icon">
                                                                <span class="qodef-tours-input-icon">
                                                                    <span class="icon_calendar"></span>
                                                                </span>
                                                                <select name="month"
                                                                    class="qodef-tours-select-placeholder">
                                                                    <option value="">Month</option>
                                                                    <option value="1">January</option>
                                                                    <option value="2">February</option>
                                                                    <option value="3">March</option>
                                                                    <option value="4">April</option>
                                                                    <option value="5">May</option>
                                                                    <option value="6">June</option>
                                                                    <option value="7">July</option>
                                                                    <option value="8">August</option>
                                                                    <option value="9">September</option>
                                                                    <option value="10">October</option>
                                                                    <option value="11">November</option>
                                                                    <option value="12">December</option>
                                                                </select>
                                                            </div>
                                                            <h5 class="qodef-tours-filter-label">Filter by price</h5>
                                                            <div class="qodef-tours-range-input"></div>
                                                            <div class="qodef-tours-input-with-icon qodef-tpl-holder">
                                                                <span class="qodef-tours-price-label">Price: </span>
                                                                <input type="text" class="qodef-tours-price-range-field"
                                                                    data-currency-symbol-position="left"
                                                                    data-currency-symbol="$" data-min-price="450"
                                                                    data-max-price="3600" data-chosen-min-price="450"
                                                                    data-chosen-max-price="3600"
                                                                    placeholder="Price Range">
                                                                <input type="hidden" name="min_price">
                                                                <input type="hidden" name="max_price">
                                                            </div>
                                                            <div class="qodef-tours-type-filter-item">
                                                                <input type="checkbox"
                                                                    id="qodef-tour-type-filter-popular" name="type[]"
                                                                    value="popular">
                                                                <label for="qodef-tour-type-filter-popular">
                                                                    <span>
                                                                        Popular </span>
                                                                </label>
                                                            </div>
                                                            <div class="qodef-tours-type-filter-item">
                                                                <input type="checkbox" id="qodef-tour-type-filter-ny"
                                                                    name="type[]" value="ny">
                                                                <label for="qodef-tour-type-filter-ny">
                                                                    <span>
                                                                        NY </span>
                                                                </label>
                                                            </div>
                                                            <div class="qodef-tours-type-filter-item">
                                                                <input type="checkbox"
                                                                    id="qodef-tour-type-filter-latest" name="type[]"
                                                                    value="latest">
                                                                <label for="qodef-tour-type-filter-latest">
                                                                    <span>
                                                                        Latest </span>
                                                                </label>
                                                            </div>
                                                            <div class="qodef-tours-type-filter-item">
                                                                <input type="checkbox"
                                                                    id="qodef-tour-type-filter-skiing" name="type[]"
                                                                    value="skiing">
                                                                <label for="qodef-tour-type-filter-skiing">
                                                                    <span>
                                                                        Skiing </span>
                                                                </label>
                                                            </div>
                                                            <div class="qodef-tours-type-filter-item">
                                                                <input type="checkbox"
                                                                    id="qodef-tour-type-filter-europe" name="type[]"
                                                                    value="europe">
                                                                <label for="qodef-tour-type-filter-europe">
                                                                    <span>
                                                                        Europe </span>
                                                                </label>
                                                            </div>
                                                            <div class="qodef-tours-type-filter-item">
                                                                <input type="checkbox" id="qodef-tour-type-filter-wines"
                                                                    name="type[]" value="wines">
                                                                <label for="qodef-tour-type-filter-wines">
                                                                    <span>
                                                                        Wines </span>
                                                                </label>
                                                            </div>
                                                            <div class="qodef-tours-type-filter-item">
                                                                <input type="checkbox"
                                                                    id="qodef-tour-type-filter-trendy" name="type[]"
                                                                    value="trendy">
                                                                <label for="qodef-tour-type-filter-trendy">
                                                                    <span>
                                                                        Trendy </span>
                                                                </label>
                                                            </div>
                                                            <input type="submit" name="setsail_tours_search_submit"
                                                                value="Search"
                                                                class="qodef-btn qodef-btn-medium qodef-btn-solid"
                                                                data-searching-label="Searching..." />
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                            <div id="media_image-10" class="widget widget_media_image"><a
                                                    href="../shop/index.html"><img width="305" height="333"
                                                        src="../wp-content/uploads/2018/09/sidebar-img-1.jpg"
                                                        class="image wp-image-3393  attachment-full size-full" alt="d"
                                                        style="max-width: 100%; height: auto;"
                                                        srcset="https://setsail.select-themes.com/wp-content/uploads/2018/09/sidebar-img-1.jpg 305w, https://setsail.select-themes.com/wp-content/uploads/2018/09/sidebar-img-1-275x300.jpg 275w"
                                                        sizes="(max-width: 305px) 100vw, 305px" /></a></div>
                                        </aside>
                                    </div>
                                </div>
                              </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@stop

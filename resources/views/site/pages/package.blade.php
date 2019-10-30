@extends('site.app')
@section('title', $package->name)
@section('content')
{{-- <main class="ps-main">
    <div class="test">
      <div class="container">
        <div class="row">
              <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 ">
              </div>
        </div>
      </div>
    </div>
    <div class="ps-package--detail pt-60">
      <div class="ps-container">
        <div class="row">
          <div class="col-lg-10 col-md-12 col-lg-offset-1">
            <div class="ps-package__thumbnail">
              <div class="ps-package__preview">
                <div class="ps-package__variants">
                    @if ($package->images->count() > 0)
                    @foreach($package->images as $image)
                  <div class="item"><img src="{{ asset('storage/'.$image->full) }}" alt="" class="item-image"></div>
@endforeach
</div>
</div>
<div class="ps-package__image">
    <div class="item"><img id="potogede" class="zoom" src="{{ asset('storage/'.$package->images->first()->full) }}"
            alt="" data-zoom-image="{{ asset('storage/'.$package->images->first()->full) }} "></div>
    @else
    <div class="item"><img class="zoom" src="https://via.placeholder.com/176" alt=""
            data-zoom-image="https://via.placeholder.com/176"></div>
    @endif
</div>
</div>
<div class="ps-package__thumbnail--mobile">
    @if ($package->images->count() > 0)
    <div class="ps-package__main-img"><img id="potogede" src="{{ asset('storage/'.$package->images->first()->full) }}"
            alt=""></div>

    <div class="ps-package__preview owl-slider" data-owl-auto="true" data-owl-loop="true" data-owl-speed="5000"
        data-owl-gap="20" data-owl-nav="true" data-owl-dots="false" data-owl-item="3" data-owl-item-xs="3"
        data-owl-item-sm="3" data-owl-item-md="3" data-owl-item-lg="3" data-owl-duration="1000" data-owl-mousedrag="on">
        @foreach($package->images as $image)
        <img src="{{ asset('storage/'.$image->full) }}" alt="">
        @endforeach

    </div>
    @else
    <div class="ps-package__main-img"><img src="https://via.placeholder.com/176" alt=""></div>
    @endif

</div>
<div class="ps-package__info">
    <h1><span class="brushstroke">{{$package->name }}</span></h1>
    <p class="ps-package__region">SKU : {{ $package->duration }}</p>
    @if ($package->sale_price > 0)
    <h3 class="ps-package__price">
        {{ config('settings.currency_symbol').$package->sale_price }}<del>{{ config('settings.currency_symbol').$package->price }}</del>
    </h3>
    @else
    <h3 class="ps-package__price">{{ config('settings.currency_symbol').$package->price }}</h3>
    @endif
    <div class="ps-package__block ps-package__quickview">
        <h4>QUICK DESC</h4>
        <p>{{ str_limit($package->description, 40) }}</p>
    </div>
    <form action="{{ route('package.add.cart', $package->id) }}" method="POST" role="form" id="addToCart">
        @csrf
        <div class="ps-package__block ps-package__size">
            <h4>CHOOSE SIZE</h4>
            @foreach($attributes as $attribute)
            @php $attributeCheck = in_array($attribute->id, $package->attributes->pluck('attribute_id')->toArray())
            @endphp
            @if ($attributeCheck)
            <dt>{{ $attribute->name }}: </dt>
            <dd>
                <select class="form-control form-control-sm option" style="width:180px;"
                    name="{{ strtolower($attribute->name ) }}">
                    <option data-price="0" value="0"> Select a {{ $attribute->name }}</option>
                    @foreach($package->attributes as $attributeValue)
                    @if ($attributeValue->attribute_id == $attribute->id)
                    <option data-price="{{ $attributeValue->price }}" value="{{ $attributeValue->value }}">
                        {{ ucwords($attributeValue->value) }}
                    </option>
                    @endif
                    @endforeach
                </select>
            </dd>
            @endif
            @endforeach
            <h4>QUANTITY</h4>
            <div class="form-group">
                <input class="form-control" type="number" min="1" value="1" max="{{ $package->quantity }}" name="qty">
                <input type="hidden" name="packageId" value="{{ $package->id }}">
                <input type="hidden" name="price" id="finalPrice"
                    value="{{ $package->sale_price != '0' ? $package->sale_price : $package->price }}">
            </div>
        </div>
        <div class="ps-package__shopping"><button class="ps-btn mb-10" type="submit">Add to cart<i
                    class="ps-icon-next"></i></button>
        </div>
    </form>
</div>
<div class="clearfix"></div>
<div class="ps-package__content mt-50">
    <ul class="tab-list" role="tablist">
        <li class="active"><a href="#tab_01" aria-controls="tab_01" role="tab" data-toggle="tab">Overview</a></li>
        <li><a href="#tab_02" aria-controls="tab_02" role="tab" data-toggle="tab">Size Chart</a></li>
    </ul>
</div>
<div class="tab-content mb-60">
    <div class="tab-pane active" role="tabpanel" id="tab_01">
        <p>{!! $package->description !!}</p>
    </div>
    <div class="tab-pane" role="tabpanel" id="tab_02">
        <div class="form-group">
            <textarea class="form-control" rows="6" placeholder="Enter your addition here..."></textarea>
        </div>
        <div class="form-group">
            <button class="ps-btn" type="button">Submit</button>
        </div>
    </div>
</div>
</div>
</div>
</div> --}}
<div class="qodef-content">
    <div class="qodef-content-inner">
        @if ($package->images->count() > 0)
        <div class="qodef-title-holder qodef-centered-type qodef-title-va-header-bottom qodef-preload-background qodef-has-bg-image qodef-bg-parallax"
            style="height: 520px;background-color: #f8f8f8;background-image:url({{ asset('storage/'.$package->images->first()->full) }});"
            data-height="520">
        @else
         <div class="qodef-title-holder qodef-centered-type qodef-title-va-header-bottom qodef-preload-background qodef-has-bg-image qodef-bg-parallax" style="height: 520px;background-color: #f8f8f8;background-image:url(../../wp-content/uploads/2018/09/destionations-1-title.jpg);" data-height="520">
        @endif
            <div class="qodef-title-image">
                <img itemprop="image" src="../../wp-content/uploads/2018/09/destionations-1-title.jpg" alt="d" />
            </div>
            <div class="qodef-title-wrapper" style="height: 520px">
                <div class="qodef-title-inner">
                    <div class="qodef-grid">
                        <span class="qodef-page-subtitle" style="color: #ffffff">Amazing Tour</span>
                    <h1 class="qodef-page-title entry-title" style="color: #000">{{$package->name}}</h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="qodef-container">
            <div class="qodef-container-inner clearfix qodef-tour-item-single-holder">
                <article class="qodef-tour-item-wrapper qodef-tabs qodef-horizontal qodef-tab-text">
                    <ul class="qodef-tabs-nav clearfix">
                        <li class="qodef-tour-nav-item">
                            <a href="#tour-item-info-id">
                                <span class="qodef-tour-nav-section-icon icon_documents_alt"></span>
                                <span class="qodef-tour-nav-section-title">
                                    INFORMATION </span>
                            </a>
                        </li>
                        <li class="qodef-tour-nav-item">
                            <a href="#tour-item-plan-id">
                                <span class="qodef-tour-nav-section-icon icon_calendar"></span>
                                <span class="qodef-tour-nav-section-title">
                                    TOUR PLAN </span>
                            </a>
                        </li>
                        <li class="qodef-tour-nav-item">
                            <a href="#tour-item-location-id">
                                <span class="qodef-tour-nav-section-icon icon_pin_alt"></span>
                                <span class="qodef-tour-nav-section-title">
                                    LOCATION </span>
                            </a>
                        </li>
                        <li class="qodef-tour-nav-item">
                            <a href="#tour-item-gallery-id">
                                <span class="qodef-tour-nav-section-icon icon_camera_alt"></span>
                                <span class="qodef-tour-nav-section-title">
                                    GALLERY </span>
                            </a>
                        </li>
                        <li class="qodef-tour-nav-item">
                            <a href="#tour-item-review-id">
                                <span class="qodef-tour-nav-section-icon icon_chat_alt"></span>
                                <span class="qodef-tour-nav-section-title">
                                    REVIEWS </span>
                            </a>
                        </li>
                    </ul>
                    <div class="qodef-tour-item-section qodef-information-section qodef-tab-container"
                        id="tour-item-info-id">
                        <div class="qodef-grid-row qodef-grid-large-gutter">
                            <div class="qodef-grid-col-9">
                                <div class="qodef-info-section-part qodef-tour-item-title-holder">
                                    <div class="qodef-title-wrapper">
                                        <h3 class="qodef-tour-item-title">{{$package->name}}</h3>
                                        <div class="qodef-tour-item-price-holder">
                                            @if ($package->sale_price > 0)
                                            <span class="qodef-tour-item-price">
                                                <span class="qodef-tours-price-holder">
                                                    <span class="qodef-tours-item-price "><del style="color:red">{{ config('settings.currency_symbol').$package->price }}</del>  {{ config('settings.currency_symbol').$package->sale_price }}</span>
                                                </span>
                                            </span>
                                            <span class="qodef-tour-item-price-text">
                                                / per person </span>
                                            @else
                                            <span class="qodef-tour-item-price">
                                                <span class="qodef-tours-price-holder">
                                                    <span class="qodef-tours-item-price ">{{ config('settings.currency_symbol').$package->price }}</span>
                                                </span>
                                            </span>
                                            <span class="qodef-tour-item-price-text">
                                                / per person </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="qodef-reviews-list-info qodef-reviews-average-count">
                                        <span class="qodef-stars">
                                            <span class="qodef-stars-wrapper-inner">
                                                <span class="qodef-stars-items">
                                                    <i class="fas fa-star" aria-hidden="true"></i>
                                                    <i class="fas fa-star" aria-hidden="true"></i>
                                                    <i class="fas fa-star" aria-hidden="true"></i>
                                                    <i class="far fa-star" aria-hidden="true"></i>
                                                    <i class="far fa-star" aria-hidden="true"></i>
                                                </span>
                                            </span>
                                        </span>
                                        <span class="qodef-reviews-label">
                                            (1 Review) </span>
                                    </div>
                                </div>
                                <div class="qodef-info-section-part qodef-tour-item-content">
                                    <div class="vc_row wpb_row vc_row-fluid">
                                        <div class="wpb_column vc_column_container vc_col-sm-12">
                                            <div class="vc_column-inner">
                                                <div class="wpb_wrapper">
                                                    <div class="wpb_text_column wpb_content_element ">
                                                        <div class="wpb_wrapper">
                                                            {!!$package->description!!}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="qodef-tour-item-short-info">
                                    <div class="qodef-tours-single-info-item">
                                        <div class="qodef-tour-duration-holder">
                                            <span class="qodef-tour-duration-icon qodef-tour-info-icon">
                                                <span class="icon_calendar"></span>
                                            </span>
                                            <span class="qodef-tour-info-label">
                                                {{$package->duration}} days</span>
                                        </div>
                                    </div>
                                    <div class="qodef-tours-tour-categories-holder">
                                        <div class="qodef-tours-tour-categories-item">
                                            <a href="../index57ec.html?type%5B%5D=popular">
                                                <span class="qodef-tour-cat-item-icon">
                                                    <span aria-hidden="true"
                                                        class="qodef-icon-font-elegant icon_pin_alt "></span> </span>
                                                <span class="qodef-tour-cat-item-text">
                                                    {{$package->duration}} </span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="qodef-info-section-part qodef-tour-item-main-info">
                                    <ul class="qodef-tour-main-info-holder clearfix">
                                        <li class="clearfix ">
                                            <h6 class="qodef-info">
                                                Destination </h6>
                                            <div class="qodef-value">
                                                <a href="../../destinations/spain/index.html">Spain</a> </div>
                                        </li>
                                        <li class="clearfix ">
                                            <h6 class="qodef-info">
                                                Departure </h6>
                                            <div class="qodef-value">
                                                Jakarta, Indonesia </div>
                                        </li>
                                        <li class="clearfix ">
                                            <h6 class="qodef-info">
                                                Departure Time </h6>
                                            <div class="qodef-value">
                                                {{ \Carbon\Carbon::parse($package->start)->format('l, j F Y') }} </div>
                                        </li>
                                        <li class="clearfix ">
                                            <h6 class="qodef-info">
                                                Return Time </h6>
                                            <div class="qodef-value">
                                                {{ \Carbon\Carbon::parse($package->end)->format('l, j F Y') }} </div>
                                        </li>
                                        <li class="clearfix qodef-tours-checked-attributes">
                                            <h6 class="qodef-info">
                                                Included </h6>
                                            <div class="qodef-value">
                                                <div class="qodef-tour-main-info-attr">
                                                    5 Star Accommodation </div>
                                                <div class="qodef-tour-main-info-attr">
                                                    Airport Transfer </div>
                                                <div class="qodef-tour-main-info-attr">
                                                    Breakfast </div>
                                                <div class="qodef-tour-main-info-attr">
                                                    Personal Guide </div>
                                            </div>
                                        </li>
                                        <li class="clearfix qodef-tours-unchecked-attributes">
                                            <h6 class="qodef-info">
                                                Not Included </h6>
                                            <div class="qodef-value">
                                                <div class="qodef-tour-main-info-attr">
                                                    Gallery Ticket </div>
                                                <div class="qodef-tour-main-info-attr">
                                                    Lunch </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="qodef-tour-gallery-item-holder">
                                    <h4 class="qodef-gallery-title">
                                        From our gallery </h4>
                                    <p class="qodef-tour-gallery-item-excerpt">
                                        Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula
                                        eget dolor. Aenean massa. Cum sociis Theme natoque penatibus et magnis dis
                                        parturient montes, nascetur ridiculus mus. </p>
                                    <div class="qodef-tour-gallery clearfix">
                                        <div class="qodef-tour-gallery-item">
                                            <a href="../../wp-content/uploads/2018/09/destionations-1-masonry-39.jpg"
                                                data-rel="prettyPhoto[gallery_excerpt_pretty_photo]">
                                                <img width="650" height="650"
                                                    src="../../wp-content/uploads/2018/09/destionations-1-masonry-39-650x650.jpg"
                                                    class="attachment-setsail_select_image_square size-setsail_select_image_square"
                                                    alt="d"
                                                    srcset="https://setsail.select-themes.com/wp-content/uploads/2018/09/destionations-1-masonry-39-650x650.jpg 650w, https://setsail.select-themes.com/wp-content/uploads/2018/09/destionations-1-masonry-39-150x150.jpg 150w, https://setsail.select-themes.com/wp-content/uploads/2018/09/destionations-1-masonry-39-300x300.jpg 300w, https://setsail.select-themes.com/wp-content/uploads/2018/09/destionations-1-masonry-39-100x100.jpg 100w"
                                                    sizes="(max-width: 650px) 100vw, 650px" /> </a>
                                        </div>
                                        <div class="qodef-tour-gallery-item">
                                            <a href="../../wp-content/uploads/2018/09/destionations-1-masonry-36.jpg"
                                                data-rel="prettyPhoto[gallery_excerpt_pretty_photo]">
                                                <img width="650" height="650"
                                                    src="../../wp-content/uploads/2018/09/destionations-1-masonry-36-650x650.jpg"
                                                    class="attachment-setsail_select_image_square size-setsail_select_image_square"
                                                    alt="d"
                                                    srcset="https://setsail.select-themes.com/wp-content/uploads/2018/09/destionations-1-masonry-36-650x650.jpg 650w, https://setsail.select-themes.com/wp-content/uploads/2018/09/destionations-1-masonry-36-150x150.jpg 150w, https://setsail.select-themes.com/wp-content/uploads/2018/09/destionations-1-masonry-36-300x300.jpg 300w, https://setsail.select-themes.com/wp-content/uploads/2018/09/destionations-1-masonry-36-768x768.jpg 768w, https://setsail.select-themes.com/wp-content/uploads/2018/09/destionations-1-masonry-36-1024x1024.jpg 1024w, https://setsail.select-themes.com/wp-content/uploads/2018/09/destionations-1-masonry-36-600x600.jpg 600w, https://setsail.select-themes.com/wp-content/uploads/2018/09/destionations-1-masonry-36-100x100.jpg 100w, https://setsail.select-themes.com/wp-content/uploads/2018/09/destionations-1-masonry-36.jpg 1300w"
                                                    sizes="(max-width: 650px) 100vw, 650px" /> </a>
                                        </div>
                                        <div class="qodef-tour-gallery-item">
                                            <a href="../../wp-content/uploads/2018/09/destionations-1-masonry-28.jpg"
                                                data-rel="prettyPhoto[gallery_excerpt_pretty_photo]">
                                                <img width="650" height="650"
                                                    src="../../wp-content/uploads/2018/09/destionations-1-masonry-28-650x650.jpg"
                                                    class="attachment-setsail_select_image_square size-setsail_select_image_square"
                                                    alt="d"
                                                    srcset="https://setsail.select-themes.com/wp-content/uploads/2018/09/destionations-1-masonry-28-650x650.jpg 650w, https://setsail.select-themes.com/wp-content/uploads/2018/09/destionations-1-masonry-28-150x150.jpg 150w, https://setsail.select-themes.com/wp-content/uploads/2018/09/destionations-1-masonry-28-300x300.jpg 300w, https://setsail.select-themes.com/wp-content/uploads/2018/09/destionations-1-masonry-28-768x768.jpg 768w, https://setsail.select-themes.com/wp-content/uploads/2018/09/destionations-1-masonry-28-1024x1024.jpg 1024w, https://setsail.select-themes.com/wp-content/uploads/2018/09/destionations-1-masonry-28-600x600.jpg 600w, https://setsail.select-themes.com/wp-content/uploads/2018/09/destionations-1-masonry-28-100x100.jpg 100w, https://setsail.select-themes.com/wp-content/uploads/2018/09/destionations-1-masonry-28.jpg 1300w"
                                                    sizes="(max-width: 650px) 100vw, 650px" /> </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="qodef-tour-item-section qodef-plan-section qodef-tab-container" id="tour-item-plan-id">
                        <div class="qodef-grid-row qodef-grid-large-gutter">
                            <div class="qodef-grid-col-9">
                                <h3 class="qodef-tour-plan-title">
                                    Cruise Plan </h3>
                                <div class="qodef-info-section-part qodef-tour-item-plan-part clearfix">
                                    @foreach ($package->itinerary as $one)       
                                    <div class="qodef-route-top-holder">
                                        <div class="qodef-route-id">
                                            <div class="qodef-route-id-inner"><i class="fas fa-anchor"></i></div>
                                        </div>
                                        <span class="qodef-line-between-icons">
                                            <span class="qodef-line-between-icons-inner"></span>
                                        </span>
                                        <h4 class="qodef-tour-item-plan-part-title">
                                            <span style="color:gray">{{ \Carbon\Carbon::parse($one->time1)->format('l, j F Y') }}</span>  |   {{$one->itinary_name1}} </h4>
                                    </div>
                                    <div class="qodef-tour-item-plan-part-description">
                                        Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla
                                        consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec,
                                        vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae,
                                        justo. Nullam dictum felis eu pede mollis pretium.
                                        <ul>
                                            <li>5 Star Accommodation</li>
                                            <li>Breakfast</li>
                                            <li>5 Star Accommodation</li>
                                            <li>Breakfast</li>
                                        </ul>
                                    </div>
                                   @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="qodef-tour-item-section qodef-location-section qodef-tab-container"
                        id="tour-item-location-id">
                        <div class="qodef-grid-row qodef-grid-large-gutter">
                            <div class="qodef-grid-col-9">
                                <div class="qodef-location-part">
                                    <h3 class="qodef-tour-location">
                                        Tour Location </h3>
                                    <p class="qodef-location-excerpt">
                                        Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula
                                        eget dolor. Aenean massa. Cum sociis Theme natoque penatibus et magnis dis
                                        parturient montes, nascetur ridiculus mus. </p>
                                    <div class="qodef-location-addresses">
                                        <div class="qodef-google-map-holder">
                                            <div class="qodef-google-map" id="qodef-map-975812"
                                                data-addresses='["24 Leonard St New York, NY 10013"]'
                                                data-custom-map-style=no data-color-overlay=#393939 data-saturation=-100
                                                data-lightness=-60 data-zoom=12
                                                data-pin=https://setsail.select-themes.com/wp-content/themes/setsail/assets/img/pin.png
                                                data-unique-id=975812 data-scroll-wheel=no data-height=600
                                                data-snazzy-map-style=yes></div>
                                            <input type="hidden" class="qodef-snazzy-map"
                                                value="[{&quot;featureType&quot;:&quot;administrative&quot;,&quot;elementType&quot;:&quot;labels.text.fill&quot;,&quot;stylers&quot;:[{&quot;color&quot;:&quot;#5d7e9e&quot;}]},{&quot;featureType&quot;:&quot;landscape&quot;,&quot;elementType&quot;:&quot;all&quot;,&quot;stylers&quot;:[{&quot;color&quot;:&quot;#f2f2f2&quot;}]},{&quot;featureType&quot;:&quot;landscape&quot;,&quot;elementType&quot;:&quot;geometry.fill&quot;,&quot;stylers&quot;:[{&quot;color&quot;:&quot;#fefefe&quot;}]},{&quot;featureType&quot;:&quot;landscape.natural.terrain&quot;,&quot;elementType&quot;:&quot;geometry&quot;,&quot;stylers&quot;:[{&quot;weight&quot;:&quot;0.92&quot;},{&quot;saturation&quot;:&quot;-23&quot;}]},{&quot;featureType&quot;:&quot;poi&quot;,&quot;elementType&quot;:&quot;all&quot;,&quot;stylers&quot;:[{&quot;visibility&quot;:&quot;off&quot;}]},{&quot;featureType&quot;:&quot;poi.park&quot;,&quot;elementType&quot;:&quot;geometry.fill&quot;,&quot;stylers&quot;:[{&quot;color&quot;:&quot;#c9e2f8&quot;},{&quot;visibility&quot;:&quot;on&quot;}]},{&quot;featureType&quot;:&quot;road&quot;,&quot;elementType&quot;:&quot;all&quot;,&quot;stylers&quot;:[{&quot;saturation&quot;:-100},{&quot;lightness&quot;:45},{&quot;visibility&quot;:&quot;simplified&quot;}]},{&quot;featureType&quot;:&quot;road.highway&quot;,&quot;elementType&quot;:&quot;all&quot;,&quot;stylers&quot;:[{&quot;visibility&quot;:&quot;simplified&quot;}]},{&quot;featureType&quot;:&quot;road.highway&quot;,&quot;elementType&quot;:&quot;geometry.fill&quot;,&quot;stylers&quot;:[{&quot;visibility&quot;:&quot;simplified&quot;},{&quot;color&quot;:&quot;#f37949&quot;}]},{&quot;featureType&quot;:&quot;road.highway&quot;,&quot;elementType&quot;:&quot;labels.text&quot;,&quot;stylers&quot;:[{&quot;color&quot;:&quot;#4e4e4e&quot;}]},{&quot;featureType&quot;:&quot;road.arterial&quot;,&quot;elementType&quot;:&quot;geometry.fill&quot;,&quot;stylers&quot;:[{&quot;color&quot;:&quot;#f4f4f4&quot;}]},{&quot;featureType&quot;:&quot;road.arterial&quot;,&quot;elementType&quot;:&quot;labels.text.fill&quot;,&quot;stylers&quot;:[{&quot;color&quot;:&quot;#787878&quot;}]},{&quot;featureType&quot;:&quot;road.arterial&quot;,&quot;elementType&quot;:&quot;labels.icon&quot;,&quot;stylers&quot;:[{&quot;visibility&quot;:&quot;off&quot;}]},{&quot;featureType&quot;:&quot;transit&quot;,&quot;elementType&quot;:&quot;all&quot;,&quot;stylers&quot;:[{&quot;visibility&quot;:&quot;off&quot;}]},{&quot;featureType&quot;:&quot;water&quot;,&quot;elementType&quot;:&quot;all&quot;,&quot;stylers&quot;:[{&quot;color&quot;:&quot;#eaf6f8&quot;},{&quot;visibility&quot;:&quot;on&quot;}]},{&quot;featureType&quot;:&quot;water&quot;,&quot;elementType&quot;:&quot;geometry.fill&quot;,&quot;stylers&quot;:[{&quot;color&quot;:&quot;#eaf6f8&quot;}]}]" />
                                            <div class="qodef-google-map-overlay"></div>
                                        </div>
                                    </div>
                                    <div class="qodef-location-content">
                                        <h4>Hystory of the City</h4>
                                        Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula
                                        eget dolor. Aenean massa. Cum sociis Theme natoque penatibus et magnis dis
                                        parturient montes, nascetur ridiculus mus. Lorem ipsum dolor sit amet,
                                        consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa.
                                        Cum sociis Theme natoque penatibus et magnis dis parturient montes, nascetur
                                        ridiculus mus. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus.
                                        Phasellus viverra nulla ut metus varius.<div
                                            class="qodef-separator-holder clearfix  qodef-separator-center qodef-separator-normal">
                                            <div class="qodef-separator"></div>
                                        </div>
                                        Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas
                                        tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet
                                        adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar,
                                        hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus.Donec vitae
                                        sapien ut libero venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget
                                        eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh. Donec
                                        sodales sagittis magna. Sed consequat, leo eget bibendum sodales, augue velit
                                        cursus nunc. Donec quam felis, ultricies nec, pellentesque eu, pretium quis,
                                        sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet
                                        nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis
                                        vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt.
                                        Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula
                                        eget dolor. Aenean massa. Cum sociis Theme natoque penatibus et magnis dis
                                        parturient montes, nascetur ridiculus mus. Aliquam lorem ante, dapibus in,
                                        viverra quis, feugiat a, tellus.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="qodef-tour-item-section qodef-gallery-section qodef-tab-container"
                        id="tour-item-gallery-id">
                        <div class="qodef-grid-row qodef-grid-large-gutter">
                            <div class="qodef-grid-col-9">
                                <h3 class="qodef-tour-gallery-title"> Gallery </h3>
                                <p class="qodef-tour-gallery-item-excerpt"> Lorem ipsum dolor sit amet, consectetuer
                                    adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis Theme
                                    natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. </p>
                                <div
                                    class="qodef-tour-masonry-gallery-holder qodef-grid-list qodef-grid-masonry-list qodef-three-columns qodef-normal-space">
                                    <div
                                        class="qodef-tour-masonry-gallery qodef-outer-space qodef-masonry-list-wrapper">
                                        <div class="qodef-masonry-grid-sizer"></div>
                                        <div class="qodef-masonry-grid-gutter"></div>
                                        <div
                                            class="qodef-tour-gallery-item qodef-item-space qodef-fixed-masonry-item qodef-masonry-size-large-width">
                                            <div class="qodef-tour-gallery-item-inner">
                                                <a href="https://setsail.select-themes.com/wp-content/uploads/2018/09/destionations-1-masonry-39.jpg"
                                                    data-rel="prettyPhoto[gallery_pretty_photo]">
                                                    <img width="1300" height="650"
                                                        src="https://setsail.select-themes.com/wp-content/uploads/2018/09/destionations-1-masonry-39.jpg"
                                                        class="attachment-full size-full" alt="d"
                                                        srcset="https://setsail.select-themes.com/wp-content/uploads/2018/09/destionations-1-masonry-39.jpg 1300w, https://setsail.select-themes.com/wp-content/uploads/2018/09/destionations-1-masonry-39-300x150.jpg 300w, https://setsail.select-themes.com/wp-content/uploads/2018/09/destionations-1-masonry-39-768x384.jpg 768w, https://setsail.select-themes.com/wp-content/uploads/2018/09/destionations-1-masonry-39-1024x512.jpg 1024w, https://setsail.select-themes.com/wp-content/uploads/2018/09/destionations-1-masonry-39-600x300.jpg 600w"
                                                        sizes="(max-width: 1300px) 100vw, 1300px" /> </a>
                                            </div>
                                        </div>
                                        <div
                                            class="qodef-tour-gallery-item qodef-item-space qodef-default-masonry-item">
                                            <div class="qodef-tour-gallery-item-inner">
                                                <a href="../../wp-content/uploads/2018/09/destionations-1-masonry-36.jpg"
                                                    data-rel="prettyPhoto[gallery_pretty_photo]">
                                                    <img width="1300" height="1300"
                                                        src="https://setsail.select-themes.com/wp-content/uploads/2018/09/destionations-1-masonry-36.jpg"
                                                        class="attachment-full size-full" alt="d"
                                                        srcset="https://setsail.select-themes.com/wp-content/uploads/2018/09/destionations-1-masonry-36.jpg 1300w, https://setsail.select-themes.com/wp-content/uploads/2018/09/destionations-1-masonry-36-150x150.jpg 150w, https://setsail.select-themes.com/wp-content/uploads/2018/09/destionations-1-masonry-36-300x300.jpg 300w, https://setsail.select-themes.com/wp-content/uploads/2018/09/destionations-1-masonry-36-768x768.jpg 768w, https://setsail.select-themes.com/wp-content/uploads/2018/09/destionations-1-masonry-36-1024x1024.jpg 1024w, https://setsail.select-themes.com/wp-content/uploads/2018/09/destionations-1-masonry-36-650x650.jpg 650w, https://setsail.select-themes.com/wp-content/uploads/2018/09/destionations-1-masonry-36-600x600.jpg 600w, https://setsail.select-themes.com/wp-content/uploads/2018/09/destionations-1-masonry-36-100x100.jpg 100w"
                                                        sizes="(max-width: 1300px) 100vw, 1300px" /> </a>
                                            </div>
                                        </div>
                                        <div
                                            class="qodef-tour-gallery-item qodef-item-space qodef-default-masonry-item">
                                            <div class="qodef-tour-gallery-item-inner">
                                                <a href="../../wp-content/uploads/2018/09/destionations-1-masonry-28.jpg"
                                                    data-rel="prettyPhoto[gallery_pretty_photo]">
                                                    <img width="1300" height="1300"
                                                        src="https://setsail.select-themes.com/wp-content/uploads/2018/09/destionations-1-masonry-28.jpg"
                                                        class="attachment-full size-full" alt="d"
                                                        srcset="https://setsail.select-themes.com/wp-content/uploads/2018/09/destionations-1-masonry-28.jpg 1300w, https://setsail.select-themes.com/wp-content/uploads/2018/09/destionations-1-masonry-28-150x150.jpg 150w, https://setsail.select-themes.com/wp-content/uploads/2018/09/destionations-1-masonry-28-300x300.jpg 300w, https://setsail.select-themes.com/wp-content/uploads/2018/09/destionations-1-masonry-28-768x768.jpg 768w, https://setsail.select-themes.com/wp-content/uploads/2018/09/destionations-1-masonry-28-1024x1024.jpg 1024w, https://setsail.select-themes.com/wp-content/uploads/2018/09/destionations-1-masonry-28-650x650.jpg 650w, https://setsail.select-themes.com/wp-content/uploads/2018/09/destionations-1-masonry-28-600x600.jpg 600w, https://setsail.select-themes.com/wp-content/uploads/2018/09/destionations-1-masonry-28-100x100.jpg 100w"
                                                        sizes="(max-width: 1300px) 100vw, 1300px" /> </a>
                                            </div>
                                        </div>
                                        <div
                                            class="qodef-tour-gallery-item qodef-item-space qodef-default-masonry-item">
                                            <div class="qodef-tour-gallery-item-inner">
                                                <a href="../../wp-content/uploads/2018/09/destionations-1-masonry-23.jpg"
                                                    data-rel="prettyPhoto[gallery_pretty_photo]">
                                                    <img width="1300" height="1300"
                                                        src="../../wp-content/uploads/2018/09/destionations-1-masonry-23.jpg"
                                                        class="attachment-full size-full" alt="d"
                                                        srcset="https://setsail.select-themes.com/wp-content/uploads/2018/09/destionations-1-masonry-23.jpg 1300w, https://setsail.select-themes.com/wp-content/uploads/2018/09/destionations-1-masonry-23-150x150.jpg 150w, https://setsail.select-themes.com/wp-content/uploads/2018/09/destionations-1-masonry-23-300x300.jpg 300w, https://setsail.select-themes.com/wp-content/uploads/2018/09/destionations-1-masonry-23-768x768.jpg 768w, https://setsail.select-themes.com/wp-content/uploads/2018/09/destionations-1-masonry-23-1024x1024.jpg 1024w, https://setsail.select-themes.com/wp-content/uploads/2018/09/destionations-1-masonry-23-650x650.jpg 650w, https://setsail.select-themes.com/wp-content/uploads/2018/09/destionations-1-masonry-23-600x600.jpg 600w, https://setsail.select-themes.com/wp-content/uploads/2018/09/destionations-1-masonry-23-100x100.jpg 100w"
                                                        sizes="(max-width: 1300px) 100vw, 1300px" /> </a>
                                            </div>
                                        </div>
                                        <div
                                            class="qodef-tour-gallery-item qodef-item-space qodef-default-masonry-item">
                                            <div class="qodef-tour-gallery-item-inner">
                                                <a href="../../wp-content/uploads/2018/09/destionations-1-masonry-25.jpg"
                                                    data-rel="prettyPhoto[gallery_pretty_photo]">
                                                    <img width="1300" height="1300"
                                                        src="../../wp-content/uploads/2018/09/destionations-1-masonry-25.jpg"
                                                        class="attachment-full size-full" alt="d"
                                                        srcset="https://setsail.select-themes.com/wp-content/uploads/2018/09/destionations-1-masonry-25.jpg 1300w, https://setsail.select-themes.com/wp-content/uploads/2018/09/destionations-1-masonry-25-150x150.jpg 150w, https://setsail.select-themes.com/wp-content/uploads/2018/09/destionations-1-masonry-25-300x300.jpg 300w, https://setsail.select-themes.com/wp-content/uploads/2018/09/destionations-1-masonry-25-768x768.jpg 768w, https://setsail.select-themes.com/wp-content/uploads/2018/09/destionations-1-masonry-25-1024x1024.jpg 1024w, https://setsail.select-themes.com/wp-content/uploads/2018/09/destionations-1-masonry-25-650x650.jpg 650w, https://setsail.select-themes.com/wp-content/uploads/2018/09/destionations-1-masonry-25-600x600.jpg 600w, https://setsail.select-themes.com/wp-content/uploads/2018/09/destionations-1-masonry-25-100x100.jpg 100w"
                                                        sizes="(max-width: 1300px) 100vw, 1300px" /> </a>
                                            </div>
                                        </div>
                                        <div
                                            class="qodef-tour-gallery-item qodef-item-space qodef-fixed-masonry-item qodef-masonry-size-large-width">
                                            <div class="qodef-tour-gallery-item-inner">
                                                <a href="../../wp-content/uploads/2018/10/destionations-1-masonry-33.jpg"
                                                    data-rel="prettyPhoto[gallery_pretty_photo]">
                                                    <img width="1300" height="650"
                                                        src="../../wp-content/uploads/2018/10/destionations-1-masonry-33.jpg"
                                                        class="attachment-full size-full" alt="s"
                                                        srcset="https://setsail.select-themes.com/wp-content/uploads/2018/10/destionations-1-masonry-33.jpg 1300w, https://setsail.select-themes.com/wp-content/uploads/2018/10/destionations-1-masonry-33-300x150.jpg 300w, https://setsail.select-themes.com/wp-content/uploads/2018/10/destionations-1-masonry-33-768x384.jpg 768w, https://setsail.select-themes.com/wp-content/uploads/2018/10/destionations-1-masonry-33-1024x512.jpg 1024w, https://setsail.select-themes.com/wp-content/uploads/2018/10/destionations-1-masonry-33-600x300.jpg 600w"
                                                        sizes="(max-width: 1300px) 100vw, 1300px" /> </a>
                                            </div>
                                        </div>
                                        <div
                                            class="qodef-tour-gallery-item qodef-item-space qodef-fixed-masonry-item qodef-masonry-size-large-height">
                                            <div class="qodef-tour-gallery-item-inner">
                                                <a href="../../wp-content/uploads/2018/09/destionations-1-masonry-38.jpg"
                                                    data-rel="prettyPhoto[gallery_pretty_photo]">
                                                    <img width="650" height="1300"
                                                        src="../../wp-content/uploads/2018/09/destionations-1-masonry-38.jpg"
                                                        class="attachment-full size-full" alt="d"
                                                        srcset="https://setsail.select-themes.com/wp-content/uploads/2018/09/destionations-1-masonry-38.jpg 650w, https://setsail.select-themes.com/wp-content/uploads/2018/09/destionations-1-masonry-38-150x300.jpg 150w, https://setsail.select-themes.com/wp-content/uploads/2018/09/destionations-1-masonry-38-512x1024.jpg 512w, https://setsail.select-themes.com/wp-content/uploads/2018/09/destionations-1-masonry-38-600x1200.jpg 600w"
                                                        sizes="(max-width: 650px) 100vw, 650px" /> </a>
                                            </div>
                                        </div>
                                        <div
                                            class="qodef-tour-gallery-item qodef-item-space qodef-default-masonry-item">
                                            <div class="qodef-tour-gallery-item-inner">
                                                <a href="../../wp-content/uploads/2018/09/destionations-1-masonry-40.jpg"
                                                    data-rel="prettyPhoto[gallery_pretty_photo]">
                                                    <img width="1300" height="1300"
                                                        src="../../wp-content/uploads/2018/09/destionations-1-masonry-40.jpg"
                                                        class="attachment-full size-full" alt="d"
                                                        srcset="https://setsail.select-themes.com/wp-content/uploads/2018/09/destionations-1-masonry-40.jpg 1300w, https://setsail.select-themes.com/wp-content/uploads/2018/09/destionations-1-masonry-40-150x150.jpg 150w, https://setsail.select-themes.com/wp-content/uploads/2018/09/destionations-1-masonry-40-300x300.jpg 300w, https://setsail.select-themes.com/wp-content/uploads/2018/09/destionations-1-masonry-40-768x768.jpg 768w, https://setsail.select-themes.com/wp-content/uploads/2018/09/destionations-1-masonry-40-1024x1024.jpg 1024w, https://setsail.select-themes.com/wp-content/uploads/2018/09/destionations-1-masonry-40-650x650.jpg 650w, https://setsail.select-themes.com/wp-content/uploads/2018/09/destionations-1-masonry-40-600x600.jpg 600w, https://setsail.select-themes.com/wp-content/uploads/2018/09/destionations-1-masonry-40-100x100.jpg 100w"
                                                        sizes="(max-width: 1300px) 100vw, 1300px" /> </a>
                                            </div>
                                        </div>
                                        <div
                                            class="qodef-tour-gallery-item qodef-item-space qodef-default-masonry-item">
                                            <div class="qodef-tour-gallery-item-inner">
                                                <a href="../../wp-content/uploads/2018/09/destionations-1-masonry-35.jpg"
                                                    data-rel="prettyPhoto[gallery_pretty_photo]">
                                                    <img width="1300" height="1300"
                                                        src="../../wp-content/uploads/2018/09/destionations-1-masonry-35.jpg"
                                                        class="attachment-full size-full" alt="d"
                                                        srcset="https://setsail.select-themes.com/wp-content/uploads/2018/09/destionations-1-masonry-35.jpg 1300w, https://setsail.select-themes.com/wp-content/uploads/2018/09/destionations-1-masonry-35-150x150.jpg 150w, https://setsail.select-themes.com/wp-content/uploads/2018/09/destionations-1-masonry-35-300x300.jpg 300w, https://setsail.select-themes.com/wp-content/uploads/2018/09/destionations-1-masonry-35-768x768.jpg 768w, https://setsail.select-themes.com/wp-content/uploads/2018/09/destionations-1-masonry-35-1024x1024.jpg 1024w, https://setsail.select-themes.com/wp-content/uploads/2018/09/destionations-1-masonry-35-650x650.jpg 650w, https://setsail.select-themes.com/wp-content/uploads/2018/09/destionations-1-masonry-35-600x600.jpg 600w, https://setsail.select-themes.com/wp-content/uploads/2018/09/destionations-1-masonry-35-100x100.jpg 100w"
                                                        sizes="(max-width: 1300px) 100vw, 1300px" /> </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="qodef-tour-item-section qodef-reviews-section qodef-tab-container"
                        id="tour-item-review-id">
                        <div class="qodef-grid-row qodef-grid-large-gutter">
                            <div class="qodef-grid-col-9">
                                <div class="qodef-course-reviews-list-top">
                                    <div class="qodef-reviews-list-info qodef-reviews-per-criteria">
                                        <div class="qodef-item-reviews-display-wrapper clearfix">
                                            <h3 class="qodef-item-review-title">Reviews Scores and Score Breakdown</h3>
                                            <p class="qodef-item-review-subtitle">Aliquam lorem ante, dapibus in,
                                                viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius
                                                laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel
                                                augue. Curabitur ullamcorper ultricies</p>
                                            <div class="qodef-grid-row">
                                                <div class="qodef-grid-col-3">
                                                    <div class="qodef-item-reviews-average-wrapper">
                                                        <div class="qodef-item-reviews-average-inner">
                                                            <div class="qodef-item-reviews-average-rating">
                                                                5.3 </div>
                                                            <div class="qodef-item-reviews-verbal-description">
                                                                <span class="qodef-item-reviews-rating-icon">
                                                                    <span class="icon_star-half_alt"></span> </span>
                                                                <span class="qodef-item-reviews-rating-description">
                                                                    Good </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="qodef-grid-col-9">
                                                    <div class="qodef-rating-percentage-wrapper">
                                                        <div class="qodef-progress-bar  ">
                                                            <h6 class="qodef-pb-title-holder">
                                                                <span class="qodef-pb-title">Rating</span>
                                                                <span class="qodef-pb-percent">0</span>
                                                            </h6>
                                                            <div class="qodef-pb-content-holder">
                                                                <div data-percentage=40 class="qodef-pb-content"></div>
                                                            </div>
                                                        </div>
                                                        <div class="qodef-progress-bar  ">
                                                            <h6 class="qodef-pb-title-holder">
                                                                <span class="qodef-pb-title">Comfort</span>
                                                                <span class="qodef-pb-percent">0</span>
                                                            </h6>
                                                            <div class="qodef-pb-content-holder">
                                                                <div data-percentage=40 class="qodef-pb-content"></div>
                                                            </div>
                                                        </div>
                                                        <div class="qodef-progress-bar  ">
                                                            <h6 class="qodef-pb-title-holder">
                                                                <span class="qodef-pb-title">Food</span>
                                                                <span class="qodef-pb-percent">0</span>
                                                            </h6>
                                                            <div class="qodef-pb-content-holder">
                                                                <div data-percentage=60 class="qodef-pb-content"></div>
                                                            </div>
                                                        </div>
                                                        <div class="qodef-progress-bar  ">
                                                            <h6 class="qodef-pb-title-holder">
                                                                <span class="qodef-pb-title">Hospitality</span>
                                                                <span class="qodef-pb-percent">0</span>
                                                            </h6>
                                                            <div class="qodef-pb-content-holder">
                                                                <div data-percentage=100 class="qodef-pb-content"></div>
                                                            </div>
                                                        </div>
                                                        <div class="qodef-progress-bar  ">
                                                            <h6 class="qodef-pb-title-holder">
                                                                <span class="qodef-pb-title">Hygiene</span>
                                                                <span class="qodef-pb-percent">0</span>
                                                            </h6>
                                                            <div class="qodef-pb-content-holder">
                                                                <div data-percentage=40 class="qodef-pb-content"></div>
                                                            </div>
                                                        </div>
                                                        <div class="qodef-progress-bar  ">
                                                            <h6 class="qodef-pb-title-holder">
                                                                <span class="qodef-pb-title">Reception</span>
                                                                <span class="qodef-pb-percent">0</span>
                                                            </h6>
                                                            <div class="qodef-pb-content-holder">
                                                                <div data-percentage=40 class="qodef-pb-content"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="qodef-comment-holder clearfix" id="comments">
                                    <div class="qodef-comment-holder-inner">
                                        <div class="qodef-comments">
                                            <ul class="qodef-comment-list">
                                                <li>
                                                    <div class="qodef-comment clearfix">
                                                        <div class="qodef-comment-image"> <img
                                                                src="../../wp-content/uploads/2018/09/user-img-2-100x100.png"
                                                                width="96" height="96" alt="James Fisher"
                                                                class="avatar avatar-96 wp-user-avatar wp-user-avatar-96 alignnone photo" />
                                                        </div>
                                                        <div class="qodef-comment-text">
                                                            <div class="qodef-comment-heading">
                                                                <h5 class="qodef-comment-name vcard">
                                                                    James Fisher </h5>
                                                            </div>
                                                            <div class="qodef-text-holder" id="comment-34">
                                                                <p>Fa etor eviuas lwqedit tas, vut et nihc egam yubulas.
                                                                    Ei euvy</p>
                                                            </div>
                                                            <div class="qodef-review-rating">
                                                                <span class="qodef-rating-inner">
                                                                    <span class="qodef-rating-label">
                                                                        Rating </span>
                                                                    <span class="qodef-rating-value">
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="far fa-star" aria-hidden="true"></i>
                                                                        <i class="far fa-star" aria-hidden="true"></i>
                                                                        <i class="far fa-star" aria-hidden="true"></i>
                                                                    </span>
                                                                </span>
                                                                <span class="qodef-rating-inner">
                                                                    <span class="qodef-rating-label">
                                                                        Comfort </span>
                                                                    <span class="qodef-rating-value">
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="far fa-star" aria-hidden="true"></i>
                                                                        <i class="far fa-star" aria-hidden="true"></i>
                                                                        <i class="far fa-star" aria-hidden="true"></i>
                                                                    </span>
                                                                </span>
                                                                <span class="qodef-rating-inner">
                                                                    <span class="qodef-rating-label">
                                                                        Food </span>
                                                                    <span class="qodef-rating-value">
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="far fa-star" aria-hidden="true"></i>
                                                                        <i class="far fa-star" aria-hidden="true"></i>
                                                                    </span>
                                                                </span>
                                                                <span class="qodef-rating-inner">
                                                                    <span class="qodef-rating-label">
                                                                        Hospitality </span>
                                                                    <span class="qodef-rating-value">
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                    </span>
                                                                </span>
                                                                <span class="qodef-rating-inner">
                                                                    <span class="qodef-rating-label">
                                                                        Hygiene </span>
                                                                    <span class="qodef-rating-value">
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="far fa-star" aria-hidden="true"></i>
                                                                        <i class="far fa-star" aria-hidden="true"></i>
                                                                        <i class="far fa-star" aria-hidden="true"></i>
                                                                    </span>
                                                                </span>
                                                                <span class="qodef-rating-inner">
                                                                    <span class="qodef-rating-label">
                                                                        Reception </span>
                                                                    <span class="qodef-rating-value">
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="far fa-star" aria-hidden="true"></i>
                                                                        <i class="far fa-star" aria-hidden="true"></i>
                                                                        <i class="far fa-star" aria-hidden="true"></i>
                                                                    </span>
                                                                </span>
                                                            </div>
                                                            <h6 class="qodef-comment-date">
                                                                October 10, 2018 at 9:13 am </h6>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="qodef-comment-form">
                                    <div class="qodef-comment-form-inner">
                                        <div id="respond" class="comment-respond">
                                            <h3 id="reply-title" class="comment-reply-title">Post a Comment <small><a
                                                        rel="nofollow" id="cancel-comment-reply-link"
                                                        href="index.html#respond" style="display:none;">cancel
                                                        reply</a></small></h3>
                                            <form action="https://setsail.select-themes.com/wp-comments-post.php"
                                                method="post" id="commentform" class="comment-form">
                                                <p class="qodef-comment-notes"></p>
                                                <div class="qodef-comment-form-rating">
                                                    <label>Rating</label>
                                                    <span class="qodef-comment-rating-box">
                                                        <span class="qodef-star-rating" data-value="1"></span>
                                                        <span class="qodef-star-rating" data-value="2"></span>
                                                        <span class="qodef-star-rating" data-value="3"></span>
                                                        <span class="qodef-star-rating" data-value="4"></span>
                                                        <span class="qodef-star-rating" data-value="5"></span>
                                                        <input type="hidden" name="qodef_global_rating"
                                                            class="qodef-rating" value="3">
                                                    </span>
                                                </div>
                                                <div class="qodef-comment-form-rating">
                                                    <label>Comfort</label>
                                                    <span class="qodef-comment-rating-box">
                                                        <span class="qodef-star-rating" data-value="1"></span>
                                                        <span class="qodef-star-rating" data-value="2"></span>
                                                        <span class="qodef-star-rating" data-value="3"></span>
                                                        <span class="qodef-star-rating" data-value="4"></span>
                                                        <span class="qodef-star-rating" data-value="5"></span>
                                                        <input type="hidden" name="comfort" class="qodef-rating"
                                                            value="3">
                                                    </span>
                                                </div>
                                                <div class="qodef-comment-form-rating">
                                                    <label>Food</label>
                                                    <span class="qodef-comment-rating-box">
                                                        <span class="qodef-star-rating" data-value="1"></span>
                                                        <span class="qodef-star-rating" data-value="2"></span>
                                                        <span class="qodef-star-rating" data-value="3"></span>
                                                        <span class="qodef-star-rating" data-value="4"></span>
                                                        <span class="qodef-star-rating" data-value="5"></span>
                                                        <input type="hidden" name="food" class="qodef-rating" value="3">
                                                    </span>
                                                </div>
                                                <div class="qodef-comment-form-rating">
                                                    <label>Hospitality</label>
                                                    <span class="qodef-comment-rating-box">
                                                        <span class="qodef-star-rating" data-value="1"></span>
                                                        <span class="qodef-star-rating" data-value="2"></span>
                                                        <span class="qodef-star-rating" data-value="3"></span>
                                                        <span class="qodef-star-rating" data-value="4"></span>
                                                        <span class="qodef-star-rating" data-value="5"></span>
                                                        <input type="hidden" name="hospitality" class="qodef-rating"
                                                            value="3">
                                                    </span>
                                                </div>
                                                <div class="qodef-comment-form-rating">
                                                    <label>Hygiene</label>
                                                    <span class="qodef-comment-rating-box">
                                                        <span class="qodef-star-rating" data-value="1"></span>
                                                        <span class="qodef-star-rating" data-value="2"></span>
                                                        <span class="qodef-star-rating" data-value="3"></span>
                                                        <span class="qodef-star-rating" data-value="4"></span>
                                                        <span class="qodef-star-rating" data-value="5"></span>
                                                        <input type="hidden" name="hygiene" class="qodef-rating"
                                                            value="3">
                                                    </span>
                                                </div>
                                                <div class="qodef-comment-form-rating">
                                                    <label>Reception</label>
                                                    <span class="qodef-comment-rating-box">
                                                        <span class="qodef-star-rating" data-value="1"></span>
                                                        <span class="qodef-star-rating" data-value="2"></span>
                                                        <span class="qodef-star-rating" data-value="3"></span>
                                                        <span class="qodef-star-rating" data-value="4"></span>
                                                        <span class="qodef-star-rating" data-value="5"></span>
                                                        <input type="hidden" name="reception" class="qodef-rating"
                                                            value="3">
                                                    </span>
                                                </div>
                                                <div class="qodef-comment-input-text">
                                                    <span
                                                        class="qodef-comment-icon qodef-comment-message-icon icon_chat"></span>
                                                    <textarea id="comment" placeholder="Comment" name="comment"
                                                        cols="45" rows="6" aria-required="true"></textarea>
                                                </div>
                                                <div class="qodef-grid-row qodef-grid-tiny-gutter">
                                                    <div class="qodef-grid-col-6"><span
                                                            class="qodef-comment-icon qodef-comment-name-icon icon_profile"></span><input
                                                            id="author" name="author" placeholder="Name*" type="text"
                                                            value="" aria-required='true' /></div>
                                                    <div class="qodef-grid-col-6"><span
                                                            class="qodef-comment-icon qodef-comment-email-icon icon_mail_alt"></span><input
                                                            id="email" name="email" placeholder="Email*" type="text"
                                                            value="" aria-required='true' /></div>
                                                </div>
                                                <p class="comment-form-cookies-consent"><input
                                                        id="wp-comment-cookies-consent"
                                                        name="wp-comment-cookies-consent" type="checkbox"
                                                        value="yes" /><label for="wp-comment-cookies-consent">Save my
                                                        name, email, and website in this browser for the next time I
                                                        comment.</label></p>
                                                <p class="form-submit"><input name="submit" type="submit"
                                                        id="submit_comment" class="submit" value="Submit" /> <input
                                                        type='hidden' name='comment_post_ID' value='3104'
                                                        id='comment_post_ID' />
                                                    <input type='hidden' name='comment_parent' id='comment_parent'
                                                        value='0' />
                                                </p>

                                                <p class="antispam-group antispam-group-q" style="clear: both;">
                                                    <label>Current <a href="../../cdn-cgi/l/email-protection.html"
                                                            class="__cf_email__"
                                                            data-cfemail="e49d81a496">[email&#160;protected]</a> <span
                                                            class="required">*</span></label>
                                                    <input type="hidden" name="antspm-a"
                                                        class="antispam-control antispam-control-a" value="2019" />
                                                    <input type="text" name="antspm-q"
                                                        class="antispam-control antispam-control-q" value="5.4"
                                                        autocomplete="off" />
                                                </p>
                                                <p class="antispam-group antispam-group-e" style="display: none;">
                                                    <label>Leave this field empty</label>
                                                    <input type="text" name="antspm-e-email-url-website"
                                                        class="antispam-control antispam-control-e" value=""
                                                        autocomplete="off" />
                                                </p>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </article>
            </div>
        </div>
        <div class="qodef-content-bottom" style="background-color: #3fd0d4;">
            <div class="qodef-content-bottom-inner qodef-grid">
                <div class="widget qodef-separator-widget">
                    <div class="qodef-separator-holder clearfix  qodef-separator-center qodef-separator-normal">
                        <div class="qodef-separator" style="border-style: solid;margin-top: 9px"></div>
                    </div>
                </div>
                <div class="widget widget_text">
                    <div class="textwidget">
                        <div
                            class="qodef-call-to-action-holder  qodef-normal-layout qodef-content-in-grid qodef-three-quarters-columns">
                            <div class="qodef-cta-inner qodef-grid">
                                <div class="qodef-cta-text-holder">
                                    <div class="qodef-cta-text">
                                        <h4 style="color:#fff;">Subscribe Now and Quench Your Wanderlust!</h4>
                                    </div>
                                </div>
                                <div class="qodef-cta-button-holder">
                                    <div class="qodef-cta-button"><a itemprop="url" href="../../my-account/index.html"
                                            target="_self" style="color: #222222;background-color: #ffffff"
                                            class="qodef-btn qodef-btn-large qodef-btn-solid qodef-btn-custom-hover-bg qodef-btn-custom-hover-color"
                                            data-hover-color="#ffffff" data-hover-bg-color="#23a9af"
                                            rel="noopener noreferrer"> <span class="qodef-btn-text">Join Now</span> </a>
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
@push('scripts')
<script>
    $(document).ready(function () {
        $('#addToCart').submit(function (e) {
            if ($('.option').val() == 0) {
                e.preventDefault();
                alert('Please select your shoes size');
            }
        });
        // $('.option').change(function () {
        //     $('#packagePrice').html("{{ $package->sale_price != '0' ? $package->sale_price : $package->price }}");
        //     let extraPrice = $(this).find(':selected').data('price');
        //     let price = parseFloat($('#packagePrice').html());
        //     let finalPrice = (Number(extraPrice) + price).toFixed(2);
        //     $('#finalPrice').val(finalPrice);
        //     $('#packagePrice').html(finalPrice);
        // });
    });

</script>
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

@endpush

@extends('site.app')
@section('title', $product->name)
@section('content')
<main class="ps-main">
    <div class="test">
      <div class="container">
        <div class="row">
              <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 ">
              </div>
        </div>
      </div>
    </div>
    <div class="ps-product--detail pt-60">
      <div class="ps-container">
        <div class="row">
          <div class="col-lg-10 col-md-12 col-lg-offset-1">
            <div class="ps-product__thumbnail">
              <div class="ps-product__preview">
                <div class="ps-product__variants">
                    @if ($product->images->count() > 0)
                    @foreach($product->images as $image)
                  <div class="item"><img src="{{ asset('storage/'.$image->full) }}" alt="" class="item-image"></div>
                  @endforeach
                </div>
              </div>
              <div class="ps-product__image">
                <div class="item"><img id="potogede" class="zoom" src="{{ asset('storage/'.$product->images->first()->full) }}" alt="" data-zoom-image="{{ asset('storage/'.$product->images->first()->full) }} "></div>
                @else
                <div class="item"><img class="zoom" src="https://via.placeholder.com/176" alt="" data-zoom-image="https://via.placeholder.com/176"></div>
                @endif
              </div>
            </div>
            <div class="ps-product__thumbnail--mobile">
            @if ($product->images->count() > 0)
              <div class="ps-product__main-img"><img id="potogede" src="{{ asset('storage/'.$product->images->first()->full) }}" alt=""></div>

              <div class="ps-product__preview owl-slider" data-owl-auto="true" data-owl-loop="true" data-owl-speed="5000" data-owl-gap="20" data-owl-nav="true" data-owl-dots="false" data-owl-item="3" data-owl-item-xs="3" data-owl-item-sm="3" data-owl-item-md="3" data-owl-item-lg="3" data-owl-duration="1000" data-owl-mousedrag="on">
                @foreach($product->images as $image)
                <img src="{{ asset('storage/'.$image->full) }}" alt="">
                @endforeach
               
            </div>
            @else
            <div class="ps-product__main-img"><img src="https://via.placeholder.com/176" alt=""></div>
            @endif
            
            </div>
            <div class="ps-product__info">
              <h1><span class="brushstroke">{{$product->name }}</span></h1>
              <p class="ps-product__region">SKU : {{ $product->sku }}</p>
              @if ($product->sale_price > 0)
              <h3 class="ps-product__price">{{ config('settings.currency_symbol').$product->sale_price }}<del>{{ config('settings.currency_symbol').$product->price }}</del></h3>
              @else
              <h3 class="ps-product__price">{{ config('settings.currency_symbol').$product->price }}</h3>
              @endif
              <div class="ps-product__block ps-product__quickview">
                <h4>QUICK DESC</h4>
              <p>{{ str_limit($product->description, 40) }}</p>
              </div>
              <form action="{{ route('product.add.cart', $product->id) }}" method="POST" role="form" id="addToCart">
                  @csrf
              <div class="ps-product__block ps-product__size">
                <h4>CHOOSE SIZE</h4>
                @foreach($attributes as $attribute)
                                                  @php $attributeCheck = in_array($attribute->id, $product->attributes->pluck('attribute_id')->toArray()) @endphp
                                                      @if ($attributeCheck)
                                                          <dt>{{ $attribute->name }}: </dt>
                                                          <dd>
                                                              <select class="form-control form-control-sm option" style="width:180px;" name="{{ strtolower($attribute->name ) }}">
                                                                  <option data-price="0" value="0"> Select a {{ $attribute->name }}</option>
                                                                  @foreach($product->attributes as $attributeValue)
                                                                      @if ($attributeValue->attribute_id == $attribute->id)
                                                                          <option
                                                                              data-price="{{ $attributeValue->price }}"
                                                                              value="{{ $attributeValue->value }}"> {{ ucwords($attributeValue->value) }}
                                                                          </option>
                                                                      @endif
                                                                  @endforeach
                                                              </select>
                                                          </dd>
                                                      @endif
                                                  @endforeach
                <h4>QUANTITY</h4>                                    
                <div class="form-group">
                    <input class="form-control" type="number" min="1" value="1" max="{{ $product->quantity }}" name="qty">
                    <input type="hidden" name="productId" value="{{ $product->id }}">
                    <input type="hidden" name="price" id="finalPrice" value="{{ $product->sale_price != '0' ? $product->sale_price : $product->price }}">
                </div>
              </div>
              <div class="ps-product__shopping"><button class="ps-btn mb-10" type="submit">Add to cart<i class="ps-icon-next"></i></button>
              </div>
              </form>
            </div>
            <div class="clearfix"></div>
            <div class="ps-product__content mt-50">
              <ul class="tab-list" role="tablist">
                <li class="active"><a href="#tab_01" aria-controls="tab_01" role="tab" data-toggle="tab">Overview</a></li>
                <li><a href="#tab_02" aria-controls="tab_02" role="tab" data-toggle="tab">Size Chart</a></li>
              </ul>
            </div>
            <div class="tab-content mb-60">
              <div class="tab-pane active" role="tabpanel" id="tab_01">
                <p>{!! $product->description !!}</p>
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
            //     $('#productPrice').html("{{ $product->sale_price != '0' ? $product->sale_price : $product->price }}");
            //     let extraPrice = $(this).find(':selected').data('price');
            //     let price = parseFloat($('#productPrice').html());
            //     let finalPrice = (Number(extraPrice) + price).toFixed(2);
            //     $('#finalPrice').val(finalPrice);
            //     $('#productPrice').html(finalPrice);
            // });
        });
    </script>
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
  
@endpush
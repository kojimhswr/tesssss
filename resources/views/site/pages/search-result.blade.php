@extends('site.app')
@section('title', 'Search Result')
@section('content')
<br>
<br>
<br>
<br>
<div class="ps-section__header mb-50">
        <h3 class="ps-section__title1" data-mask="Search"></h3>
</div>
<div class="ps-section__header mb-50">
        <h3 class="ps-section__title2" data-mask="RESULT"></h3>
</div>
<section class="section-content padding-y">
    <div class="container">
            <div class="col-sm-12">
                    @if (Session::has('error'))
                        <p class="alert alert-danger">{{ Session::get('error') }}</p>
                    @endif
                </div>

        <div class="row">
            <main class="col-sm-12">
            <p>{{$products->total()}} results for '{{request()->input('query')}}'</p>
                @forelse($products as $product)
                <article class="card card-product">
                    <div class="card-body">
                        <div class="row">
                            <aside class="col-sm-3">
                                @if ($product->images->count() > 0)
                                <div class="img-wrap"><img src="{{ asset('storage/'.$product->images->first()->full) }}"></div>
                                @else
                                <div class="img-wrap"><img src="https://via.placeholder.com/176"></div>
                                @endif
                            </aside>
                            <!-- col.// -->
                            <article class="col-sm-6">
                                    <h4 class="title"><a href="{{ route('product.show', $product->slug) }}"><span class="brushstroke">{{ $product->name }}</span></a></h4>
                            <p>{{$product->description}}</p>
                            </article>
                            <!-- col.// -->
                            <aside class="col-sm-3 border-left">
                                <div class="action-wrap">
                                    @if ($product->sale_price != 0)
                                    <div class="price-wrap h4">
                                        <span class="price text-success">{{ config('settings.currency_symbol').$product->sale_price }}</span>
                                        <del class="price-old"> {{ config('settings.currency_symbol').$product->price }}</del>
                                    </div>
                                    @else
                                    <div class="price-wrap h4">
                                            <span class="price">{{ config('settings.currency_symbol').$product->price }}</span>
                                    </div>
                                    @endif
                                    <!-- info-price-detail // -->
                                    <br>
                                    <p>
                                        <a href="{{ route('product.show', $product->slug) }}" class="btn btn-secondary"> Details  </a>
                                    </p>
                                </div>
                                <!-- action-wrap.// -->
                            </aside>
                            <!-- col.// -->
                        </div>
                        <!-- row.// -->
                    </div>
                    <!-- card-body .// -->
                </article>
                <!-- card product .// -->
                @empty
                <p>No Search Results found for '{{request()->input('query')}}'.</p> 
                @endforelse
                {{ $products->appends(request()->input())->links() }}
                <br>
                <br>
            </main>
            
            
        </section>
@stop
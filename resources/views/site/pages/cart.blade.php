@extends('site.app')
@section('title', 'Shopping Cart')
@section('content')
<main class="ps-main">
        <div class="ps-content pt-80 pb-80">
          <div class="ps-container">
            <div class="ps-cart-listing">
                @if (Session::has('message'))
                    <p class="alert alert-success">{{ Session::get('message') }}</p>
                @endif
              <table class="table ps-cart__table">
                @if (\Cart::isEmpty())
                <p class="alert alert-warning">Your shopping cart is empty.</p>
                @else
                <thead>
                  <tr>
                    <th>All Packages</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                @foreach(\Cart::getContent() as $item)
                  <tr>
                    <td>
                        <a class="ps-package__preview" href="#">
                            {{-- <img class="mr-15" src="{{ asset('storage/'.$item->images) }}" alt=""> --}}
                            {{ Str::words($item->name,20) }}
                        </a>
                        
                        <dl class="dlist-inline small">
                            <dt>Size : </dt>
                            @foreach($item->attributes as $key  => $value)
                            <dd>{{ ucwords($value) }}</dd>
                            @endforeach
                        </dl>
                        
                    </td>
                    <td>{{ config('settings.currency_symbol').$item->price }}</td>
                    <td>
                     <p>{{ $item->quantity }}</p>
                    </td>
                    <td>{{ config('settings.currency_symbol').$item->price * $item->quantity }}</td>
                    <td>
                        <a href="{{ route('checkout.cart.remove', $item->id) }}"><div class="ps-remove"></div></a>
                    </td>
                  </tr>
                @endforeach
                </tbody>
              </table>
              @endif
              <div class="ps-cart__actions">
                <div class="ps-cart__promotion">
                  <div class="form-group">
                    <a class="ps-btn ps-btn--gray" href="{{ route('checkout.cart.clear') }}">Clear Cart</a>
                  </div>
                </div>
                <div class="ps-cart__total">
                  <h3>Total Price: <span> {{ config('settings.currency_symbol') }}{{ \Cart::getSubTotal() }}</span></h3><a class="ps-btn" href="{{ route('checkout.index') }}">Place Order<i class="ps-icon-next"></i></a>
                </div>
              </div>
            </div>
          </div>
        </div>
</main>

    
    
@stop
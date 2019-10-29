@extends('site.app')
@section('title', 'Checkout')
@section('content')
<main class="ps-main">
        <div class="ps-checkout pt-80 pb-80">
          <div class="ps-container">
            @if (Session::has('error'))
                <p class="alert alert-danger">{{ Session::get('error') }}</p>
            @endif
            <form class="ps-checkout__form" action="{{ route('checkout.place.order') }}" method="post" role="form">
                    @csrf
              <div class="row">
                    <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 ">
                      <div class="ps-checkout__billing">
                        <h3>Billing Detail</h3>
                              <div class="form-group form-group--inline">
                                <label>First Name<span>*</span>
                                </label>
                                <input class="form-control @error('first_name') is-invalid @enderror" type="text" name="first_name">
                                @error('first_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                              </div>
                              <div class="form-group form-group--inline">
                                <label>Last Name<span>*</span>
                                </label>
                                <input class="form-control @error('last_name') is-invalid @enderror" name="last_name" type="text">
                                @error('last_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                              </div>
                              <div class="form-group form-group--inline">
                                <label>Address<span>*</span>
                                </label>
                                <input class="form-control @error('address') is-invalid @enderror" name="address" type="text">
                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                              </div>
                              <div class="form-group form-group--inline">
                                <label>Email Address<span>*</span>
                                </label>
                                <input type="email" class="form-control" name="email" value="{{ auth()->user()->email }}" disabled>
                                <small class="form-text text-muted">We'll never share your email with anyone else.</small>
                              </div>
                              <div class="form-group form-group--inline">
                                <label>City<span>*</span>
                                </label>
                                <input class="form-control @error('city') is-invalid @enderror" name="city" type="text">
                                @error('city')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                              </div>
                              <div class="form-group form-group--inline">
                                    <label>Country<span>*</span>
                                    </label>
                                    <input class="form-control @error('country') is-invalid @enderror" name="country" type="text">
                                    @error('country')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                  </div>
                              <div class="form-group form-group--inline">
                                <label>Phone<span>*</span>
                                </label>
                                <input class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" type="text">
                                @error('phone_number')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                              </div>
                              <div class="form-group form-group--inline">
                                <label>Post Code<span>*</span>
                                </label>
                                <input class="form-control @error('post_code') is-invalid @enderror" name="post_code" type="text">
                                @error('post_code')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                              </div>
                        <h3 class="mt-40"> Addition information</h3>
                        <div class="form-group form-group--inline textarea">
                          <label>Order Notes</label>
                          <textarea class="form-control" name="notes" rows="5" placeholder="Notes about your order, e.g. special notes for delivery."></textarea>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 ">
                      <div class="ps-checkout__order">
                        <header>
                          <h3>Your Order</h3>
                        </header>
                        <div class="content">
                          <table class="table ps-checkout__products">
                            <thead>
                              <tr>
                                <th class="text-uppercase">Product</th>
                                <th class="text-uppercase">Total</th>
                              </tr>
                            </thead>
                            <tbody>
                              @foreach (\Cart::getContent() as $item)
                              <tr>
                                <td>{{ Str::words($item->name,20) }}, x{{ $item->quantity }}</td>
                                <td>{{ config('settings.currency_symbol').$item->price * $item->quantity }}</td>
                              </tr>
                              @endforeach
                            </tbody>
                          </table>
                        </div>
                        <footer>
                          <h3>Grand Total</h3>
                          <h3 class="GRANDTOTAL" style="color:#fee600; text-align:end;">{{config('settings.currency_symbol') }}{{ \Cart::getSubTotal() }}</h3>
                          <h3>Payment Method</h3>
                          <div class="form-group paypal">
                            <div class="ps-radio ps-radio--inline">
                              <input class="form-control" type="radio" name="payment" id="rdo02">
                              <label for="rdo02">Paypal</label>
                            </div>
                            <ul class="ps-payment-method">
                              <li><a href="#"><img src="{{asset('frontend/images/payment/1.png')}}" alt=""></a></li>
                              <li><a href="#"><img src="{{asset('frontend/images/payment/2.png')}}" alt=""></a></li>
                              <li><a href="#"><img src="{{asset('frontend/images/payment/3.png')}}" alt=""></a></li>
                            </ul>
                            <button type="submit" class="ps-btn ps-btn--fullwidth">Place Order<i class="ps-icon-next"></i></button>
                          </div>
                        </footer>
                      </div>
                    </div>
              </div>
            </form>
          </div>
        </div>
@stop
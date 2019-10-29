@extends('site.app')
@section('title', 'Login')
@section('content')
<main class="ps-main">
    <section class="ps-home-testimonial bg--parallax pb-80" data-background="{{asset('frontend/images/background/bgsikil.png')}}">
        <div class="container">
                <div class="container">
                @if (session('status'))
                <div class="alert alert-success">
                  {{ session('status') }}
                </div>
              @endif
              @if (session('warning'))
                <div class="alert alert-warning">
                  {{ session('warning') }}
                </div>
                </div>
              @endif
              <br>
              <br>
              <br>
              <br>
              <div class="ps-section__header mb-50">
                    <h3 class="ps-section__title1" data-mask="LOGIN"><span class="ourteam"></span></h3>
            </div>
            <div class="col-md-6 mx-auto">
                <div class="card">
                    <header class="card-header">
                        <h4 class="card-title mt-2">Sign In</h4>
                    </header>
                    <article class="card-body">
                        <form action="{{ route('login') }}" method="POST" role="form">
                            @csrf
                            <div class="form-group">
                                <label for="email">E-Mail Address</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" value="{{ old('email') }}">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group row mr-auto">
                                <div class="col-md-6">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="ps-btn ps-btn--fullwidth"> Login </button>
                            </div>
                        </form>
                    </article>
                    <div class="border-top card-body text-center">Don't have an account? <a href="{{ route('register') }}">Sign Up</a></div>
                </div>
            </div>
        </div>
    </section>
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
@stop

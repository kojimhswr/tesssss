@extends('site.app')
@section('title', 'Register')
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
                        @endif
                    </div>
                  <br>
                  <br>
                  <br>
                  <br>
                  <div class="ps-section__header mb-50">
                        <h3 class="ps-section__title1" data-mask="Register"><span class="ourteam"></span></h3>
                </div>
            <div class="col-md-6 mx-auto">
                <div class="card">
                    <header class="card-header">
                        <h4 class="card-title mt-2">Sign up</h4>
                    </header>
                    <article class="card-body">
                        <form action="{{ route('register') }}" method="POST" role="form">
                            @csrf
                            <div class="form-row">
                                <div class="col form-group">
                                    <label for="first_name">First name</label>
                                    <input type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" id="first_name" value="{{ old('first_name') }}">
                                    @error('first_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="col form-group">
                                    <label for="last_name">Last name</label>
                                    <input type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" id="last_name" value="{{ old('last_name') }}">
                                    @error('last_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
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
                            <div class="form-group">
                                <label for="password_confirmation">Confirm Password</label>
                                <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" id="password_confirmation">
                                @error('password_confirmation')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                            <div class="form-group">
                                <button type="submit" class="ps-btn ps-btn--fullwidth"> Sign Up </button>
                            </div>
                            <small class="text-muted">By clicking the 'Sign Up' button, you confirm that you accept our <br> Terms of use and Privacy Policy.</small>
                        </form>
                    </article>
                    <div class="border-top card-body text-center">Have an account? <a href="{{ route('login') }}">Log In</a></div>
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

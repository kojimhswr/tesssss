@extends('site.app')
@section('title', 'Contact Us')
@section('content')
<main class="ps-main">
        <div class="ps-contact ps-section pb-80">
          <div id="contact-map" data-address="PT. Nusa Teknologi Persada" data-title="Sikil Office!" data-zoom="17"></div>
          <div class="ps-container">
            <div class="row">
                  <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 ">
                    <div class="ps-section__header mb-50">
                      <h2 class="ps-section__title2" data-mask="Contact">- Get in touch</h2>
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
                      <form class="ps-contact__form" action="{{ route('contactus.store') }}" method="post">
                          {{ csrf_field() }}
                        <div class="row">   
                              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 ">
                                <div class="form-group">
                                  <label>Name <sub>*</sub></label>
                                  <input class="form-control" type="text" name="name" placeholder="">
                                </div>
                              </div>
                              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 ">
                                <div class="form-group">
                                  <label>Email <sub>*</sub></label>
                                  <input class="form-control" type="email" name="email" placeholder="">
                                </div>
                              </div>
                              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
                                  <div class="form-group mb-25">
                                    <label>Subject <sub>*</sub></label>
                                    <input class="form-control" name="subject" rows="6">
                                  </div>
                                </div>
                              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
                                <div class="form-group mb-25">
                                  <label>Your Message <sub>*</sub></label>
                                  <textarea class="form-control" rows="6" name="message"></textarea>
                                </div>
                                <div class="form-group">
                                  <button class="ps-btn" type="submit" name="btnSubmit">Send Message<i class="ps-icon-next"></i></button>
                                </div>
                              </div>
                        </div>
                      </form>
                    </div>
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 ">
                    <div class="ps-section__content">
                      <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 ">
                              <div class="ps-contact__block" data-mh="contact-block">
                                <header>
                                  <h3>Indonesia <span> DKI Jakarta</span></h3>
                                </header>
                                <footer>
                                  <p><i class="fa fa-map-marker"></i> Jl. Inpres No. 13&14 Kav.27A, Kedoya Utara - Kebon Jeruk, Kota Jakarta Barat, DKI Jakarta 11520</p>
                                  <p><i class="fa fa-envelope-o"></i><a href="#"><span class="__cf_email__" data-cfemail="1a696f6a6a75686e4972757f695a6972757f6934747f6e">[email&#160;protected]</span></a></p>
                                  <p><i class="fa fa-phone"></i> ( +84 ) 9892 2324  -  9401 123 003</p>
                                </footer>
                              </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 ">
                              <div class="ps-contact__block" data-mh="contact-block">
                                <header>
                                  <h3>Philippines  <span> Manila</span></h3>
                                </header>
                                <footer>
                                  <p><i class="fa fa-map-marker"></i> 19C Trolley Square  Wilmington, DE 19806</p>
                                  <p><i class="fa fa-envelope-o"></i><a href="#"><span class="__cf_email__" data-cfemail="a4d7d1d4d4cbd6d0f7cccbc1d7e4d7cccbc1d78acac1d0">[email&#160;protected]</span></a></p>
                                  <p><i class="fa fa-phone"></i> ( +84 ) 9892 2324  -  9401 123 003</p>
                                </footer>
                              </div>
                            </div>
                      </div>
                    </div>
                  </div>
            </div>
          </div>
        </div>
</main>
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

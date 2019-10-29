@extends('site.app')
@section('title', 'About Us')
@section('content')
<!-- Bootstrap CSS -->
<link href="{{asset('frontend/css/about-us/bootstrap.min.css')}}" rel="stylesheet">

<!-- FontAwesome CSS -->
<link href="{{asset('frontend/css/about-us/font-awesome.min.css')}}" rel="stylesheet">

<!-- Ionicons CSS -->
<link href="{{asset('frontend/css/about-us/ionicons.min.css')}}" rel="stylesheet">

<!-- Themify CSS -->
<link href="{{asset('frontend/css/about-us/themify-icons.css')}}" rel="stylesheet">

<!-- Plugins CSS -->
<link href="{{asset('frontend/css/about-us/plugins.css')}}" rel="stylesheet">

<!-- Helper CSS -->
<link href="{{asset('frontend/css/about-us/helper.css')}}" rel="stylesheet">

<!-- Main CSS -->
<link href="{{asset('frontend/css/about-us/main.css')}}" rel="stylesheet">

<!-- Modernizer JS -->
<script src="{{asset('frontend/css/about-us/vendor/modernizr-2.8.3.min.js')}}"></script>
<br>
<br>
<br>
<div class="section-title-container mb-80">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <!--=======  section title  =======-->
                
                <div class="section-title section-title--one text-center">
                    
                    <span class="brushstroke"><h1>Sikil Team</h1></span>
                    <p class="subtitle subtitle--deep mb-0">Sikil-mu, Prioritas Kami</p>
                </div>
                
                <!--=======  End of section title  =======-->
            </div>
        </div>
    </div>
</div>

<div class="about-page-content mb-100 mb-sm-45">
    <div class="container wide">
        
        <div class="row">

            <div class="col-lg-6 mb-md-50 mb-sm-50">
                <!--=======  about page 2 image  =======-->
                
                <div class="about-page-2-image">
                    <img src="{{asset('frontend/css/about-us/6.png')}}" class="img-fluid" alt="">
                </div>
                
                <!--=======  End of about page 2 image  =======-->
            </div>

            <div class="offset-xl-1 col-xl-4 col-lg-6 col-md-6 mb-sm-50">

                <div class="about-page-text">
                    <p class=" mb-35">Kebutuhan sepatu sneakers berkualitas originals sudah tidak bisa dibendung lagi. Kualitas yang ditawarkan dari material bahan originals akan membuat sepatu-sepatu sneakers tersebut sangat nyaman digunakan dan dipakai untuk fashion harian. Para pecinta sneakers atau sneakers head selalu ingin terus menerus melengkapi koleksi sepatu mereka. Memiliki sepatu sneakers limited edition bisa membuat mereka sangat senang dan didewakan oleh kolektor sepatu lainnya. Untuk memenuhi kebutuhan para kolektor dan sneakerhead yang mengidamkan koleksi sepatu sneakers terbaik, SIKIL pun hadir. SIKIL adalah toko online yang menjual sepatu sneakers originals yang menjual beragam sneakers edisi khusus atau edisi terbatas, dari beragam ship sneaker ternama dunia seperti Nike, Adidas, Puma. Jadi, jika sedang mencari dan ingin membeli sepatu sneakers originals, kunjungi saja website toko online SIKIL. Temukan sneakers shoes idaman secara online Anda di sana dengan harga terbaik, produk sepatu originals pilihan. SIKIL akan segera mengirimkan barang tersebut secepatnya setelah Anda menyelesaikan pembayaran dan mengonfirmasikannya. Selain menjual sepatu sneakers originals secara online, toko online ini juga menjual pakaian originals dengan banyak pilihan agar Anda bisa tampil stylish dan fashionable di saat bersamaan. SIKIL juga menjual beragam aksesoris originals dari ship Andrrows, Relace, Umbre dan lainnya. Semua produk originals dari sepatu sneakers, originals fashion dan aksesoris tersebut tersedia untuk pria, wanita dan anak-anak. Toko online sepatu sneakers originals yang cocok untuk melengkapi koleksi sepatu sneakers dan beragam kebutuhan pakaian originals anda hanya di SIKIL.</p>
                </div>

                <div class="lezada-widget lezada-widget--about mb-35">
                    <h2 class="widget-title mb-25">ADDRESS</h2>
                    <p class="widget-content">Jl. Inpres No. 13&14 Kav.27A, Kedoya Utara - Kebon Jeruk, Kota Jakarta Barat, DKI Jakarta 11520

                    </p>
                </div>

                <div class="lezada-widget lezada-widget--about mb-35">
                    <h2 class="widget-title mb-25">PHONE</h2>
                    <p class="widget-content">Mobile: (+88) – 1990</p>
                    <p class="widget-content">Hotline: 1800 – 1102</p>
                </div>

                <div class="lezada-widget lezada-widget--about">
                    <h2 class="widget-title mb-25">EMAIL</h2>
                    <p class="widget-content">sikilteam@gmail.com</p>
                </div>

            </div>
        </div>
    </div>
</div>

<div class="lezada-testimonial multi-item-testimonial-area testimonial-bg testimonial-bg-1 mb-100 pt-135 pb-135">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 mb-60">
                <!--=======  section title  =======-->
                
                <div class="section-title section-title--one text-center">
                    <h1>Meet Our Team</h1>
                </div>
                
                <!--=======  End of section title  =======-->
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <!--=======  testmonial slider container  =======-->
                
                <div class="lezada-slick-slider multi-testimonial-slider-container"
                data-slick-setting='{
                    "slidesToShow": 3,
                    "arrows": true,
                    "autoplay": false,
                    "autoplaySpeed": 5000,
                    "speed": 1000,
                    "prevArrow": {"buttonClass": "slick-prev", "iconClass": "ti-angle-left" },
                    "nextArrow": {"buttonClass": "slick-next", "iconClass": "ti-angle-right" }
                }'
                data-slick-responsive='[
                    {"breakpoint":1501, "settings": {"slidesToShow": 3} },
                    {"breakpoint":1199, "settings": {"slidesToShow": 3} },
                    {"breakpoint":991, "settings": {"slidesToShow": 2, "arrows": false} },
                    {"breakpoint":767, "settings": {"slidesToShow": 1, "arrows": false} },
                    {"breakpoint":575, "settings": {"slidesToShow": 1, "arrows": false} },
                    {"breakpoint":479, "settings": {"slidesToShow": 1, "arrows": false} }
                ]'
                >
                    
                    <!--=======  single testimonial  =======-->
                    
                    <div class="col">
                        <div class="testimonial-item multi-testimonial-single-item">
                            <div class="multi-testimonial-single-item__text">
                                “Be mindful. Be grateful. Be positive. Be true. Be kind.”
                            </div>
                            <div class="multi-testimonial-single-item__author-info">
                                <div class="image">
                                    <img src="{{asset('frontend/images/user/koji.jpg')}}" class="img-fluid" alt="">
                                </div>

                                <div class="content">
                                    <p class="name">Putu Koji Singga</p>
                                    <span class="designation"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!--=======  End of single testimonial  =======-->

                    <!--=======  single testimonial  =======-->
                    
                    <div class="col">
                        <div class="testimonial-item multi-testimonial-single-item">
                            <div class="multi-testimonial-single-item__text">
                                Don't be pushed around by the fears in your mind. Be led by the dreams in your heart.
                            </div>
                            <div class="multi-testimonial-single-item__author-info">
                                <div class="image">
                                    <img src="{{asset('frontend/images/user/fakhri.jpg')}}" class="img-fluid" alt="">
                                </div>

                                <div class="content">
                                    <p class="name">Fakhri Pratama</p>
                                    <span class="designation"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!--=======  End of single testimonial  =======-->
                    
                    <!--=======  single testimonial  =======-->
                    
                    <div class="col">
                        <div class="testimonial-item multi-testimonial-single-item">
                            <div class="multi-testimonial-single-item__text">
                                “Instead of worrying about what you cannot control, shift your energy to what you can create.”
                            </div>
                            <div class="multi-testimonial-single-item__author-info">
                                <div class="image">
                                    <img src="{{asset('frontend/images/user/fajri.jpg')}}" class="img-fluid" alt="">
                                </div>
                                
                                <div class="content">
                                    <p class="name">Fazri Oktaviansah</p>
                                    <span class="designation"></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="testimonial-item multi-testimonial-single-item">
                            <div class="multi-testimonial-single-item__text">
                                “It’s only after you’ve stepped outside your comfort zone that you begin to change, grow, and transform.”
                            </div>
                            <div class="multi-testimonial-single-item__author-info">
                                <div class="image">
                                    <img src="{{asset('frontend/images/user/peni.jpg')}}" class="img-fluid" alt="">
                                </div>

                                <div class="content">
                                    <p class="name">Feny Dosmaida Pandjaitan</p>
                                    <span class="designation"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="testimonial-item multi-testimonial-single-item">
                            <div class="multi-testimonial-single-item__text">
                                “Take responsibility of your own happiness, never put it in other people’s hands.”
                            </div>
                            <div class="multi-testimonial-single-item__author-info">
                                <div class="image">
                                    <img src="{{asset('frontend/images/user/nopi.png')}}" class="img-fluid" alt="">
                                </div>

                                <div class="content">
                                    <p class="name">Novita Urdi Marpaung</p>
                                    <span class="designation"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!--=======  End of single testimonial  =======-->

                    <!--=======  single testimonial  =======-->
                    
                    <div class="col">
                        <div class="testimonial-item multi-testimonial-single-item">
                            <div class="multi-testimonial-single-item__text">
                                “Accept yourself, love yourself, and keep moving forward. If you want to fly, you have to give up what weighs you down.”
                            </div>
                            <div class="multi-testimonial-single-item__author-info">
                                <div class="image">
                                    <img src="{{asset('frontend/images/user/umay.jpg')}}" class="img-fluid" alt="">
                                </div>

                                <div class="content">
                                    <p class="name">Aisyah Humairah</p>
                                    <span class="designation"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!--=======  End of single testimonial  =======-->

                </div>
                
                <!--=======  End of testmonial slider container  =======-->
            </div>
        </div>
    </div>
</div>
<!-- jQuery JS -->
<script src="{{asset('frontend/css/about-us/vendor/jquery.min.js')}}"></script>

<!-- Popper JS -->
<script src="{{asset('frontend/css/about-us/popper.min.js')}}"></script>

<!-- Bootstrap JS -->
<script src="{{asset('frontend/css/about-us/bootstrap.min.js')}}"></script>

<!-- Plugins JS -->
<script src="{{asset('frontend/css/about-us/plugins.js')}}"></script>

<!-- Main JS -->
<script src="{{asset('frontend/css/about-us/main.js')}}"></script>
@stop


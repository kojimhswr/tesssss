<div class="header--sidebar"></div>

<header class="header">
    <div class="header__top">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 col-md-8 col-sm-6 col-xs-12 ">
                    <p>Jl. Inpres No. 13&14 Kav.27A, Kedoya Utara - Kebon Jeruk, Kota Jakarta Barat, DKI Jakarta 11520</p>
                </div>

                <div class="col-lg-6 col-md-4 col-sm-6 col-xs-12 ">
                    <div class="header__actions">
                        @guest
                        <a href="{{ route('login') }}">Login</a>
                        <a href="{{ route('register') }}">Register</a>
                        @else
                        <div class="linkhover">
                        <button class="ps-btn2" href="#">{{ Auth::user()->full_name }}</button>
                        <div class="dropdown-cuy">
                                <a href="{{route('profile.edit')}}">Edit Profile</a>
                                <a href="{{ route('account.orders') }}">My Orders</a>
                                <a href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                          document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                                          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                @csrf
                                            </form>
                                
                        </div>
                        </div>

                        @endguest
                    </div>
                </div>
            </div>
        </div>
    </div>

    <nav class="navigation">
        <div class="container-fluid bg">
            <div class="navigation__column left">
                <div class="header__logo">
                    <a class="ps-logo" href="{{ url('/homepage') }}"><img alt="" src="{{ asset('uploads/SIKIL.png') }}"/></a>
                </div>
            </div>

            <div class="navigation__column center">
                <ul class="main-menu menu">
                    @foreach($regions as $cat)
                        @foreach($cat->items as $region)
                            @if ($region->items->count() > 0)
                    <li class="menu-item menu-item-has-children dropdown">
                        <a href="{{ route('region.show', $region->slug) }}" id="{{ $region->slug }}">{{ $region->name }}</a>

                        <ul class="sub-menu">
                            @foreach($region->items as $item)
                            <li class="menu-item">
                                <a href="{{ route('region.show', $item->slug) }}">{{ $item->name }}</a>
                            </li>
                            @endforeach
                        </ul>
                    </li>
                    @else
                    <li class="menu-item">
                        <a href="{{ route('region.show', $region->slug) }}">{{ $region->name }}</a>
                    </li>
                    @endif
                    @endforeach
                @endforeach
                <li class="menu-item">
                    <a href="/about-us">About</a>
                </li>
                    <li class="menu-item">
                        <a href="/contact-us">Contact</a>
                    </li>
                </ul>
            </div>

            <div class="navigation__column right">
                <form
                    action="{{route('search')}}"
                    class="ps-search--header"
                    ><input class="form-control" placeholder="Search Product…" type="text" name="query" id="query" value="{{request()->input('query')}}"/>
                    <button type="submit"><i class="ps-icon-search"></i></button>
                </form>

                <div class="ps-cart">
                    <a class="ps-cart__toggle" href="{{route('checkout.cart')}}">
                        <span>
                            <i>{{ $cartCount }}</i>
                        </span>
                        <i class="ps-icon-shopping-cart"></i>
                    </a>

                    <div class="ps-cart__listing">
                        <div class="ps-cart__content">
                            @foreach(\Cart::getContent() as $item)
                            <div class="ps-cart-item">
                                {{-- <div class="ps-cart-item__thumbnail"><img alt="" src="images/cart-preview/1.jpg"/></div> --}}

                                <div class="ps-cart-item__content">
                                    <a class="ps-cart-item__title" href="#">{{ Str::words($item->name,20) }}</a>

                                    <p>
                                        <span>Quantity:<i>{{ $item->quantity }}</i>
                                        </span>
                                    </p>
                                </div>
                            </div>
                            @endforeach
                            

                        <div class="ps-cart__total">
                            <p>Number of items:<span>{{ $cartCount }}</span>
                            </p>

                            <p>Item Total:<span>{{ config('settings.currency_symbol') }}{{ \Cart::getSubTotal() }}</span>
                            </p>
                        </div>

                        <div class="ps-cart__footer">
                            <a class="ps-btn" href="{{route('checkout.cart')}}">Check out</a>
                        </div>
                    </div>
                </div>

                <div class="menu-toggle"></div>
            </div>
        </div>
    </nav>
</header>

<div class="header-services">
    <div
        class="ps-services owl-slider"
        data-owl-auto="true"
        data-owl-dots="false"
        data-owl-duration="1000"
        data-owl-gap="0"
        data-owl-item="1"
        data-owl-item-lg="1"
        data-owl-item-md="1"
        data-owl-item-sm="1"
        data-owl-item-xs="1"
        data-owl-loop="true"
        data-owl-mousedrag="on"
        data-owl-nav="true"
        data-owl-speed="7000">
        <p class="ps-service">
            <i class="ps-icon-delivery"></i><strong>Free delivery</strong>: Get free standard delivery on every order with Sikil</p>

        <p class="ps-service">
            <i class="ps-icon-delivery"></i><strong>Free delivery</strong>: Get free standard delivery on every order with Sikil</p>

        <p class="ps-service">
            <i class="ps-icon-delivery"></i><strong>Free delivery</strong>: Get free standard delivery on every order with Sikil</p>
    </div>
</div>
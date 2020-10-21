<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id={{ env('GOOGLE_ANALYTICS') }}"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', '{{ env('GOOGLE_ANALYTICS') }}');
    </script>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name') }}</title>
    <title>Hanouti..., with us, you must discover the difference.</title>
    <meta name="description" content="Modern open-source e-commerce framework for free">
    <meta name="tags" content="modern, opensource, open-source, e-commerce, framework, free, laravel, php, php7, symfony, shop, shopping, responsive, fast, software, blade, cart, test driven, adminlte, storefront">
    <meta name="author" content="Jeff Simons Decena">
    <link href="{{ asset('css/style.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.min.css') }}" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="{{ asset('https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js')}}"></script>
    <script src="{{ asset('https://oss.maxcdn.com/respond/1.4.2/respond.min.js')}}"></script>
    <![endif]-->
    <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('favicons/apple-icon-57x57.png')}}">
    <link rel="apple-touch-icon" sizes="60x60" href="{{ asset('favicons/apple-icon-60x60.png')}}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('favicons/apple-icon-72x72.png')}}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('favicons/apple-icon-76x76.png')}}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('favicons/apple-icon-114x114.png')}}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('favicons/apple-icon-120x120.png')}}">
    <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('favicons/apple-icon-144x144.png')}}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('favicons/apple-icon-152x152.png')}}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('favicons/apple-icon-180x180.png')}}">
    <link rel="icon" type="image/png" sizes="192x192"  href="{{ asset("storage/hanouti-logo.png")}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset("storage/hanouti-logo.png")}}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset("storage/hanouti-logo.png")}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset("storage/hanouti-logo.png")}}">
    <link rel="manifest" href="{{ asset('favicons/manifest.json')}}">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="{{ asset('favicons/ms-icon-144x144.png')}}">
    <meta name="theme-color" content="#ffffff">
    @yield('css')
    <meta property="og:url" content="{{ request()->url() }}"/>
    @yield('og')
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.3/jquery.min.js') }}"></script>
</head>
<body>
<noscript>
    <p class="alert alert-danger">
        You need to turn on your javascript. Some functionality will not work if this is disabled.
        <a href="https://www.enable-javascript.com/" target="_blank">Read more</a>
    </p>
</noscript>
<section>
    <div class="hidden-xs">
        {{-- <div class="container">
            <div class="clearfix"></div>
            <div class="pull-right">
                <ul class="nav navbar-nav navbar-right">
                    @if(auth()->check())
                        <li><a href="{{ route('accounts', ['tab' => 'profile']) }}"><i class="fa fa-home"></i> My Account</a></li>
                        <li><a href="{{ route('logout') }}"><i class="fa fa-sign-out"></i> Logout</a></li>
                    @else
                        <li><a href="{{ route('login') }}"> <i class="fa fa-lock"></i> Login</a></li>
                        <li><a href="{{ route('register') }}"> <i class="fa fa-sign-in"></i> Register</a></li>
                    @endif
                    <li id="cart" class="menubar-cart">
                        <a href="{{ route('cart.index') }}" title="View Cart" class="awemenu-icon menu-shopping-cart">
                            <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                            <span class="cart-number">{{ $cartCount }}</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div> --}}
    </div>
    <header id="header-section">
        <nav class="navbar navbar-default" style="margin-top: -10px;margin-bottom: 36px;">
            <div class="container">
              <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                </button>
                <div class="navbar-brand logo">
                    <a href="{{ route('home') }}">
                        <img class=""  style="width:96px;"
                        src="{{ url("storage/hanouti-logo.png") }}"
                        alt="{{ __('Hanouti') }}" />
                    </a>
                  </div>
                {{-- <a class="navbar-brand" href="https://reezhdesign.com">ReeZh Design</a> --}}
              </div>
              <div id="navbar" class="myStyle navbar-collapse collapse" style="margin-top: 30px;">
                <ul class="nav navbar-nav navbar-right">
                  <li class="active"><a href="#">Home</a></li>
                  <li class="dropdown" style="top: 0px">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Services <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                      <li><a href="#">Action</a></li>
                      <li><a href="#">Another action</a></li>
                      <li><a href="#">Something else here</a></li>
                      <li role="separator" class="divider"></li>
                      <li class="dropdown-header">Nav header</li>
                      <li><a href="#">Separated link</a></li>
                      <li><a href="#">One more separated link</a></li>
                    </ul>
                  </li>
                  <li class="dropdown" style="top: 0px">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Categories <span class="caret"></span></a>
                    <ul class="dropdown-menu">

                        @foreach($categories as $category)
                        <li>
                            @if($category->children()->count() > 0)
                            <li role="separator" class="divider"></li>
                            <li class="dropdown-header">{{$category->name}}</li>
                                @include('layouts.front.category-sub', ['subs' => $category->children])
                            @else
                            <li><a @if(request()->segment(2) == $category->slug) class="active" @endif href="{{route('front.category.slug', $category->slug)}}">{{$category->name}} </a></li>
                            @endif
                        </li>
                    @endforeach

                      {{-- <li><a href="#">Action</a></li>
                      <li><a href="#">Another action</a></li>
                      <li><a href="#">Something else here</a></li>
                      <li role="separator" class="divider"></li>
                      <li class="dropdown-header">Nav header</li>
                      <li><a href="#">Separated link</a></li>
                      <li><a href="#">One more separated link</a></li> --}}
                    </ul>
                  </li>
                  <li><a href="#about">About</a></li>
                  <li><a href="#contact" style="margin-right: 20px;">Contact</a></li>

                  @if(auth()->check())
                  <li><a href="{{ route('accounts', ['tab' => 'profile']) }}"><i class="fa fa-home"></i> My Account</a></li>
                  <li><a href="{{ route('logout') }}"><i class="fa fa-sign-out"></i> Logout</a></li>
              @else
                  <li><a href="{{ route('login') }}"> <i class="fa fa-lock"></i> Login</a></li>
                  <li><a href="{{ route('register') }}"> <i class="fa fa-sign-in"></i> Register</a></li>
              @endif
              <li id="cart" class="menubar-cart">
                  <a href="{{ route('cart.index') }}" title="View Cart" class="awemenu-icon menu-shopping-cart">
                      <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                      <span class="cart-number">{{ $cartCount }}</span>
                  </a>
              </li>
                </ul>
              </div><!--/.nav-collapse -->
            </div>
          </nav>
     
        {{-- <nav class="navbar navbar-default">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header col-md-1">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <div class="logo">
                        <a href="{{ route('home') }}">
                            <img class=""  style="width:96px;"
                            src="{{ asset("storage/hanouti-logo.png") }}"
                            alt="{{ __('Hanouti') }}" />
                        </a>
                      </div>
                </div>
                <div class="col-md-11">
                    @include('layouts.front.header-cart')
                </div>
                
                    

            </div>
        </nav> --}}
    </header>
</section>
@yield('content')

@include('layouts.front.footer')

<script src="{{ asset('js/front.min.js') }}"></script>
<script src="{{ asset('js/custom.js') }}"></script>
@yield('js')
</body>
</html>
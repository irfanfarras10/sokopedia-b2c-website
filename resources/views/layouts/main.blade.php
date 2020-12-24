<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>$okopedia</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <style>
        .card-img-top {
            width: 100%;
            height: 15em;
            object-fit: scale-down;
        }

        .right-panel {
            background: #e6e8eb;
        }

        .product-image {
            width: 75%;
            height: 100%;
        }

        .text-price {
            color: #f07b46;
        }

        #quantity-box {
            width: 3em;
        }

        .cart-product-image {
            width: 10em;
            height: 10em;
            object-fit: scale-down;
        }

        .header-custom {
            background: #40d11f;
        }

    </style>

</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container d-inline-flex">
                <a class="navbar-brand text-success font-weight-bold" href="{{ url('/') }}">
                    $okopedia
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse my-2" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <form class="my-auto mr-md-2 d-flex" style="flex: 1" method="post" action="/">
                        @csrf

                        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search"
                            name='search' value="{{ Request::input('search') }}">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>

                    </form>
                    {{--                    
                    <ul class="navbar-nav mr-auto">
                      
                    </ul> --}}

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link"
                                    href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if(Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link"
                                        href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            @if(Auth::user()->role_id == 1)
                                <li class="nav-item d-flex">
                                    <a href="{{ url('admin') }}"
                                        class="btn btn-success mr-sm-2 font-weight-bold">Admin Panel</a>
                                </li>
                            @else
                                <li class="nav-item d-flex">
                                    <a href="{{ url('cart') }}"
                                        class="btn btn-success mr-sm-2 font-weight-bold">Cart <span
                                            class="badge badge-light">{{ Session::get('carts') }}</span></a>
                                </li>
                                <li class="nav-item d-flex">
                                    <a href="{{ url('transaction-history') }}"
                                        class="btn btn-success mr-sm-2 font-weight-bold">History</a>
                                </li>
                                
                            @endif
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}"
                                        method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main>
            @yield('content')
        </main>
    </div>

</body>

</html>

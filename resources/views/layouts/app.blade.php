<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <style>
        /* Make the navbar background color more vibrant red */
        .navbar {
            background-color: #ff0000; /* Bright red color */
        }
    
        .navbar-nav a.nav-link {
            color: rgb(250, 243, 243);
        }
    
        .navbar-brand img {
            max-height: 30px; 
            margin-right: 10px; 
        }
        .navbar-nav li.nav-item.dropdown .nav-link,
        .navbar-nav li.nav-item.dropdown .dropdown-item {
            color: rgb(9, 9, 9);
        }
        main {
            background-color: #f9f9f9; 
            padding: 90px;
        }
        .content-styles {
           
        }

@page{
    size: 6in 4in;
    margin: 0;
    box-lines: 
}
div#shipping-label {
    margin: 1% auto;
    border: 2px solid;
    border-radius: 10px;
    width: 4in; 
    height: 6in; 
    overflow: hidden;
}
h3.Customer {
    transform: rotate(90deg);
}
.topheader {
    display: flex;
    justify-content: space-between;
    align-items: center;
    border-bottom: 2px solid;
    padding: 13px;
}
.topheader-Reference {
    padding: 10px;
}
p.service {
    display: flex;
    margin-bottom: 10;
}
p.service b {
    margin-top: 10px;
    font-size: 18px;
}
div#barcode svg {
    width: 40px;s
    height: auto;
}
div#return-address p {
    font-size: 11px;
}
div#customer-address p {
    margin-bottom: 0px;
    font-size: 11px;
}
h3.address-title {
    font-size: 13px;
    font-weight: bold;
    margin-bottom: 0px;
}
div#return-address p {
    margin-bottom: 0px;
}
p.service {
    display: flex;
}
p.service span {
    font-size: 30px;
    font-weight: bold;
}
p.service b {
    margin-top: 7px;
}
    </style>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-red shadow-sm">
            <div class="container">

                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{ asset('https://developer.royalmail.net/sites/developer.royalmail.net/files/logo_0.png') }}" alt="Logo">
                </a><a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{ asset('https://business.parcel.royalmail.com/Content/images/click-and-drop-logo/primary-light-on-red.png') }}" alt="Logo">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                        <nav class="navbar navbar-light" style="background-color: #e3f2fd;">
                            <!-- Navbar content -->
                          </nav>
                          <li class="nav-item">
                            <a class="nav-link" href="{{ route('versions.index') }}">Versions</a>
                        </li>
                          <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Orders
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('orders.index') }}">Orders List</a>
                                </li>
                                <li><a class="dropdown-item" href="{{ route('orders.create') }}">Create Order</a></li>
                                {{-- <li><a class="dropdown-item" href="{{route('orders.delete')}}">Delete Order</a></li> --}}
                                <li><a class="dropdown-item"href="{{route('orders.batch')}}">Batch Order</a></li>
                                <li><a class="dropdown-item" href="{{route('orders.status')}}"> Order Status</a></li>

                            <br>
                            </ul> 
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('shippingdetails.index') }}">Shipping Details</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('shippinginfos.index') }}">Shipping Informations</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('billinginfos.index') }}">Billing Informations</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('orderlines.index') }}">Product Order Line</a>
                        </li>
                    </ul>
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
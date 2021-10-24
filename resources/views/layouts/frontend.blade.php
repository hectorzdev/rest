<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('frontend/css/style.css')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="shortcut icon" href="{{asset('frontend/images/icon.png')}}" type="image/x-icon">
    <title>Rest - Massage</title>
</head>
<body>
    <div class="main-header">
        <div class="container">
            <ul class="nav justify-content-center">
                <li class="nav-item">
                    <a class="logo" href="{{url('')}}">
                        <img src="{{asset('frontend/images/logo.svg')}}" alt="">  
                        <span>Rest</span>
                    </a>
                </li>
                <li class="nav-item ml-auto">
                    <a class="nav-link" href="#pricing">Pricing</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#our-service">Our services</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Articles</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link book-now" href="{{url('ordernow')}}">Book Now</a>
                </li>
            </ul>
        </div>
    </div>
    <div class="main-banner">
        <div class="container position-relative">
            <div class="main-content-banner">
                <h1>Wellness, delivered.</h1>
                <h2>
                    Soothe connects you with top-rated, licensed wellness and personal care service professionals who come directly to your home, apartment, and office space. Taking care of yourself has never been this safe, convenient, or easy.
                </h2>
                <a href="#our-service" class="our-service text-white">
                    Our Services
                </a>
                <a href="{{url('ordernow')}}" class="banner-book-now">
                    Book Now
                </a>
            </div>
            
        </div>
    </div>
    @yield('content')

    <div class="footer">
        <div class="container">
            <ul class="nav justify-content-center">
                <li class="nav-item">
                    <a class="nav-link text-dark" href="#">
                        Copyright © 2021 , Rest.com
                    </a>
                </li>
            </ul>
        </div> 
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
</body>
</html>
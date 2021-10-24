@extends('layouts.frontend')

@section('content')
<section id="how-it-work" class="bg-white">
    <div class="container">
        <h1 class="text-center">How It Works</h1>
        <div class="row mt-5">
            <div class="col-md-4 text-center">
                <img src="{{asset('frontend/images/callcenter.png')}}" width="150" alt="">
                <h6 class="mt-3">Make appointments service on the web or our application 8am -12pm.
                    (Name/phone/time/treatment/address)
                    </h6>
            </div>
            <div class="col-md-4 text-center">
                <img src="{{asset('frontend/images/telephone.png')}}" width="150" alt="">
                <h6 class="mt-3">Matched  professional MT confirm time to arrives at your door with inquiring supplies for your service.</h6>
            </div>
            <div class="col-md-4 text-center">
                <img src="{{asset('frontend/images/world_phone.png')}}" width="150" alt="">
                <h6 class="mt-3">Stay relaxed in your place until professional MT arriving for your service.</h6>
            </div>
        </div>
    </div>
</section>

<section id="pricing" class=" mt-5">
    <div class="container " >
        <div class="form-inline">
            <h1 class="text-center gold-capsule">Pricing</h1>
        </div>
        <div class="row justify-content-center mt-5">
            <div class="col-md-4 text-center">
                <div class="border-gold">
                    <div class="price-card start">
                        <h4 class="price-ch basic">BASIC</h4>
                        <div class="form-inline">
                            <h4 class="price">119</h4>
                        </div>
                        <div class="hr"></div>
                        <div class="price-co">
                            Get expert service for <strong>60 minutes</strong> 
                        </div>
                        {{-- <span>Massage</span> --}}

                        <div class="form-inline">
                            <a href="{{url('ordernow')}}" class="price-book-now">Book now</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 text-center">
                <div class="border-gold">
                    <div class="price-card medium">
                        <h4 class="price-ch medium">MEDIUM</h4>
                        <div class="form-inline">
                            <h4 class="price">189</h4>
                        </div>
                        <div class="hr"></div>
                        <div class="price-co">
                            Get expert service for <strong>90 minutes</strong> 
                        </div>
                        {{-- <span>Massage</span> --}}

                        <div class="form-inline">
                            <a href="{{url('ordernow')}}" class="price-book-now">Book now</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 text-center">
                <div class="border-gold">
                    <div class="price-card advanced">
                        <h4 class="price-ch advanced">ADVANCED</h4>
                        <div class="form-inline">
                            <h4 class="price">239</h4>
                        </div>
                        <div class="hr"></div>
                        <div class="price-co">
                            Get expert service for <strong>120 minutes</strong> 
                        </div>
                        {{-- <span>Massage</span> --}}

                        <div class="form-inline">
                            <a href="{{url('ordernow')}}" class="price-book-now">Book now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="our-service">
        <div class="container">
            <h1 class="text-center">Our Services</h1>
            <div class="row mt-5">
                <div class="col-md-6">
                    <div class="border-gold">
                        <div class="service-group s1">
                            <span>Massage</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="border-gold">
                        <div class="service-group s2">
                            <span>Skincare</span>
                        </div>
                    </div>
                </div>
            </div>
            <h6 class="mt-5 text-center">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Iure nostrum quisquam facere illum repellendus recusandae alias ab vitae fugit ad, omnis debitis beatae sint mollitia dignissimos dicta. Dignissimos, nostrum modi?
            </h6>
        </div>
    </div>
</section>

@endsection

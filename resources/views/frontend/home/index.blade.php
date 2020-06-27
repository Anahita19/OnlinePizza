@extends('frontend.layout.master')

@section('content')

    <!-- END nav -->

    <section class="home-slider owl-carousel img" style="background-image: url({{ URL::asset('frontend/images/bg_1.jpg') }});">

        <div class="slider-item" style="background-image: url(frontend/images/bg_3.jpg);">
            <div class="overlay"></div>
            <div class="container">
                <div class="row slider-text justify-content-center align-items-center">

                    <div class="col-md-7 col-sm-12 text-center ftco-animate">
                        <h1 class="mb-3 mt-5 bread"> Menu</h1>
                        <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Menu</span></p>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center mb-5 pb-3">
                <div class="col-md-7 heading-section ftco-animate text-center">
                    <h2 class="mb-4">Pizza</h2>
                    <p></p>
                </div>
            </div>
        </div>
        <div class="container-wrap">
            <div class="row no-gutters d-flex">
                @foreach($latestProduct as $product)
                <div class="col-lg-3 d-flex ftco-animate">
                    <div class="services-wrap d-flex">
{{--                        <img src="{{$product->photos[0]->path}}" alt="تی شرت کتان مردانه" title="تی شرت کتان مردانه" class="img-responsive" />--}}
                        <a href="#" class="img" style="background-image:url({{$product->photos[0]->path}})  ;"></a>

                        <div class="text p-4">
                            <h3>{{$product->title}}</h3>
                            <p>{!! \Illuminate\Support\Str::limit($product->description,20)!!}</p>
                            <p class="price"><span>${{$product->price}}</span> <span> € {{$product->price*0.89+1.78}}</span> <a href="{{route('cart.add', ['id' => $product->id])}}" class="ml-2 btn btn-white btn-outline-white">Order</a></p>
                        </div>
                    </div>
                </div>

                @endforeach
{{--                    @foreach($firstProduct as $firproduct)--}}
{{--                <div class="col-lg-3 d-flex ftco-animate">--}}
{{--                    <div class="services-wrap d-flex">--}}

{{--                        <a href="#" class="img order-lg-last" style="background-image:url({{$firproduct->photos[0]->path}})  ;"></a>--}}
{{--                        <div class="text p-4">--}}
{{--                            <h3>{{$firproduct->title}}</h3>--}}

{{--                            <p>{!!str_limit($firproduct->description,50)!!} </p>--}}
{{--                            <p class="price"><span>${{$firproduct->price}}</span> <span>€ {{$firproduct->price*0.89}}</span>  <a href="{{route('cart.add', ['id' => $product->id])}}" class="ml-2 btn btn-white btn-outline-white">Order</a></p>--}}

{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                    @endforeach--}}
            </div>
        </div>

        <div class="container">
            <div class="row justify-content-center mb-5 pb-3 mt-5 pt-5">
                <div class="col-md-7 heading-section text-center ftco-animate">
                    <h2 class="mb-4">Our Menu Pricing</h2>
                    <p class="flip"><span class="deg1"></span><span class="deg2"></span><span class="deg3"></span></p>
                    <p class="mt-5"></p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    @foreach($latestProduct as $product)
                    <div class="pricing-entry d-flex ftco-animate">
{{--                        <div class="img" style="background-image:url({{$product->photos[0]->path}}) }});"></div>--}}
                    <a  href="{{route('cart.add', ['id' => $product->id])}}">    <img class="img" src="{{$product->photos[0]->path}}"  width="50"/></a>
                        <div class="desc pl-3">
                            <div class="d-flex text align-items-center">
                                <h3><span>{{$product->title}}</span></h3>
                                <span class="price">${{$product->price}}</span>
                                <span class="price"> € {{$product->price*0.89}}</span>
                            </div>
                            <div class="d-block">
                                <p>{!! \Illuminate\Support\Str::limit($product->description,50)!!}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                <div class="col-md-6">
{{--                    @foreach($firstProduct as $firproduct)--}}
{{--                    <div class="pricing-entry d-flex ftco-animate">--}}
{{--                        <a  href="{{route('cart.add', ['id' => $product->id])}}">       <img class="img" src="{{$firproduct->photos[0]->path}}"  width="50"/></a>--}}
{{--                        <div class="desc pl-3">--}}
{{--                            <div class="d-flex text align-items-center">--}}
{{--                                <h3><span>{{$firproduct->title}}</span></h3>--}}
{{--                                <span class="price">${{$firproduct->price}}</span>--}}
{{--                                <span class="price"> € {{$product->price*0.89}}</span>--}}
{{--                            </div>--}}
{{--                            <div class="d-block">--}}
{{--                                <p>{!! str_limit($firproduct->description,20)!!}</p>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                  @endforeach--}}
                </div>
            </div>
        </div>
    </section>


@endsection

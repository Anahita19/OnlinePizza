<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Pizza - Free Bootstrap 4 Template by Colorlib</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nothing+You+Could+Do" rel="stylesheet">

    <link rel="stylesheet" href="{{url('frontend/css/open-iconic-bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{url('frontend/css/animate.css')}}">
    <link rel="stylesheet" href="{{url('frontend/css/font-awesome.min.css')}}">

    <link rel="stylesheet" href="{{url('frontend/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{url('frontend/css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{url('frontend/css/magnific-popup.css')}}">

    <link rel="stylesheet" href="{{url('frontend/css/aos.css')}}">

    <link rel="stylesheet" href="{{url('frontend/css/ionicons.min.css')}}">

    <link rel="stylesheet" href="{{url('frontend/css/bootstrap-datepicker.css')}}">
    <link rel="stylesheet" href="{{url('frontend/css/jquery.timepicker.css')}}">


    <link rel="stylesheet" href="{{url('frontend/css/flaticon.css')}}">
    <link rel="stylesheet" href="{{url('frontend/css/icomoon.css')}}">
    <link rel="stylesheet" href="{{url('frontend/css/style.css')}}">
{{--      <link rel="stylesheet" href="{{url('frontend/css/pizza.css')}}">--}}
      @yield('styles')
  </head>
  <body>
  <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
      <div class="container">
          <a class="navbar-brand" href="index.html"><span class="flaticon-pizza-1 mr-1"></span>Pizza<br><small>Delicous</small></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="oi oi-menu"></span> Menu
          </button>
          |||

          @if(Auth::check())

                  <a href="{{route('logout')}}"  onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">logout</a>||||
                <a href="{{route('user.profile')}}">your profile</a>


              <form id="logout-form" action="{{ route('logout') }}" method="post" style="display: none;">
                  @csrf
              </form>
          @else

                  <a href="{{route('login')}}">login</a>||||
                <a href="{{route('register')}}">register</a>

          @endif
          <i class="fa fa-shopping-cart"></i>

          <div>
                    <div class="col-table-cell col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div id="cart">

                            <button type="button" data-toggle="dropdown" data-loading-text="loading ..." class="heading dropdown-toggle" >

{{--                                <span class="cart-icon pull-left flip"></span>--}}
                                <span id="cart-total">{{Session::has('cart') ? Session::get('cart')->totalQty . ' item' : ''}} {{Session::has('cart') ? Session::get('cart')->totalPrice+2 . ' $' : ''}}</span></button>
                            <ul class="dropdown-menu">
                                @if(Session::has('cart'))
                                    <li>
                                        <table class="table" >
                                            @foreach(Session::get('cart')->items as $product)
                                                <tbody>
                                                <tr>
                                                    <td class="text-center pricing-entry " width="50%"><img class="img"  width="50" src="{{$product['item']->photos[0]->path}}"></td>
                                                    <td class="text-left">{{$product['item']->title}}</td>
                                                    <td class="text-right">x {{$product['qty']}}</td>
                                                    <td class="text-right">{{$product['price']}} $</td>
                                                    <td class="text-right"> {{$product['price']*0.89+1.78}} € </td>
                                                    <td class="text-center">
                                                        <button class="btn btn-danger btn-xs remove" title="حذف" onclick="event.preventDefault();
                                                            document.getElementById('remove-cart-item_{{$product['item']->id}}').submit();" type="button"><i class="fa fa-times"></i></button>
                                                    </td>
                                                    <form id="remove-cart-item_{{$product['item']->id}}" action="{{ route('cart.remove', ['id' => $product['item']->id]) }}" method="post" style="display: none;">
                                                        @csrf
                                                    </form>
                                                </tr>

                                                </tbody>
                                            @endforeach
                                        </table>
                                    </li>
                                    <li>
                                        <div>
                                            <table class="table table-bordered">
                                                <tbody>
{{--                                                <tr>--}}
{{--                                                    <td class="text-right"><strong>total</strong></td>--}}
{{--                                                    <td class="text-right">{{Session::get('cart')->totalPurePrice}} $</td>--}}
{{--                                                </tr>--}}
                                                <tr>
                                                    <td class="text-right"><strong>delivery cost</strong></td>
                                                    <td class="text-right">2 $ || 1.78 €</td>
                                                </tr>
                                                <tr>
                                                    <td class="text-right"><strong>pay</strong></td>
                                                    <td class="text-right">{{Session::get('cart')->totalPrice+2}} $ ||  {{Session::get('cart')->totalPrice*0.89+1.78}} €</td>

                                                </tr>
                                                </tbody>
                                            </table>
                                            <p class="checkout"><a href="{{route('cart.cart')}}" class="btn btn-primary"><i class="fa fa-shopping-cart"></i> go to Checkout </a>&nbsp;</p>

                                        </div>
                                    </li>

                                @else
                                    <p>your cart is empty</p>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
          <div class="collapse navbar-collapse" id="ftco-nav">
              <ul class="navbar-nav ml-auto">
                  <li class="nav-item active"><a href="{{route('index')}}" class="nav-link">Home</a></li>
{{--                  <li class="nav-item active"><a href="menu.html" class="nav-link">Menu</a></li>--}}


              </ul>
          </div>
      </div>
  </nav>
  @yield('content')




  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>

{{--  <script src="{{url('frontend/js/pizza.js')}}"></script>--}}
  <script src="{{url('frontend/js/jquery.min.js')}}"></script>
  <script src="{{url('frontend/js/jquery-migrate-3.0.1.min.js')}}"></script>
  <script src="{{url('frontend/js/popper.min.js')}}"></script>
  <script src="{{url('frontend/js/bootstrap.min.js')}}"></script>
  <script src="{{url('frontend/js/jquery.easing.1.3.js')}}"></script>
  <script src="{{url('frontend/js/jquery.waypoints.min.js')}}"></script>
  <script src="{{url('frontend/js/jquery.stellar.min.js')}}"></script>
  <script src="{{url('frontend/js/owl.carousel.min.js')}}"></script>
  <script src="{{url('frontend/js/jquery.magnific-popup.min.js')}}"></script>
  <script src="{{url('frontend/js/aos.js')}}"></script>
  <script src="{{url('frontend/js/jquery.animateNumber.min.js')}}"></script>
  <script src="{{url('frontend/js/bootstrap-datepicker.js')}}"></script>
  <script src="{{url('frontend/js/jquery.timepicker.min.js')}}"></script>
  <script src="{{url('frontend/js/scrollax.min.js')}}"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="{{url('frontend/js/google-map.js')}}"></script>
  <script src="{{url('frontend/js/main.js')}}"></script>
@yield('scripts')

  </body>
</html>

@extends('frontend.layout.master')
@section('content')
    <div class="container">
        @if(Session::has('error'))
            <div class="alert alert-warning">
                <div>{{session('error')}}</div>
            </div>
        @endif
        @if(Session::has('warning'))
            <div class="alert alert-warning">
                <div>{{session('warning')}}</div>
            </div>
        @endif
        @if(Session::has('success'))
            <div class="alert alert-success">
                <div>{{session('success')}}
                    <a  class="btn bg-success pull-right">Successfuly Delivered</a>
                </div>
             <div class=""></div>
            </div>
    @endif
    <!-- Breadcrumb Start-->
{{--        <ul class="breadcrumb">--}}
{{--            <li><a href="index.html"><i class="fa fa-home"></i></a></li>--}}
{{--            <li><a href="cart.html">Cart</a></li>--}}
{{--        </ul>--}}
        <!-- Breadcrumb End-->
        <div class="row">
            <!--Middle Part Start-->
            <div id="content" class="col-sm-12">
                <h1 class="title">Cart</h1>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <td class="text-center" width="9%">picture</td>
                            <td class="text-left">name</td>
                            <td class="text-left">code</td>
                            <td class="text-left">supply_qty</td>
                            <td class="text-left">quantity</td>
                            <td class="text-right">price</td>
                            <td class="text-right">total</td>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($cart->items as $product)
                            <tr>
                                <td class="text-center" width="9%"><a href="#"><img src="{{$product['item']->photos[0]->path}}" class="img-thumbnail" /></a></td>
                                <td class="text-left"><a href="#">{{$product['item']->title}}</a><br />
                                <td class="text-left">{{$product['item']->sku}}</td>
                                <td class="text-left">{{$product['item']->supply_qty}}</td>

                                <td class="text-left">
                                    <div class="input-group btn-block quantity text-center">
                                        <a class="btn btn-primary" data-toggle="tooltip" title="increment"
                                           @if($product['qty']==$product['item']->supply_qty)  disabled="disabled"
                                               @endif
                                           href="{{route('cart.add', ['id' => $product['item']->id])}}">
                                            <i class="fa fa-plus"></i></a>
                                        <button type="button" data-toggle="tooltip" title="decrement" class="btn btn-danger " onclick="event.preventDefault();
                                            document.getElementById('remove-cart-item_{{$product['item']->id}}').submit();"><i class="fa fa-minus"></i></button>
                                        <form id="remove-cart-item_{{$product['item']->id}}" action="{{ route('cart.remove', ['id' => $product['item']->id]) }}" method="post" style="display: none;">
                                            @csrf
                                        </form>
                                    </div>
                                    <p class="text-center" style="margin-top: 10px;">quantity:‌ <span>{{$product['qty']}}</span></p>
{{--                                    {{$product['item']->supply_qty= $product['item']->supply_qty- $product['qty']}}--}}
{{--                                    {{$product['item']->supply_qty}}--}}
{{--                                    supply_qty:      {{$product['item']->supply_qty -  $product['qty'] }}--}}

                                </td>

                                <td class="text-right">{{$product['item']->price }} $</td>
                                <td class="text-right">{{$product['price']}} $</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>


                <div class="row">
                    <div class="col-sm-8 col-sm-offset-2">
                        <div class="panel panel-default">

                            <div id="collapse-coupon" class="panel-collapse collapse in">
                                <div class="panel-body">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-sm-4 col-sm-offset-8">
                    <table class="table table-bordered">
                        <tbody>

                        <tr>
                            <td class="text-right"><strong>ِDelivery Price</strong></td>
                            <td class="text-right">2 $</td>
                        </tr>
                        <tr>
                            <td class="text-right"><strong>final price</strong></td>
                            <td class="text-right">{{Session::get('cart')->totalPrice+2}} $</td>

                        </tr>
                        </tbody>
                    </table>
                    <h5>final bill</h5>
                    <input value="total in $  :   {{Session::get('cart')->totalPrice+2}} $" class="bg-primary">
                    <input value="total  in  € :   {{Session::get('cart')->totalPrice*0.89+1.78}} € " class="bg-primary">
                </div>
            </div>

            <div class="contairner">
                <div class="row">
                    <div class="buttons">

                        @if(Auth::check())

                            <h2>history of order</h2>
                            <a href="{{route('profile.orders')}}">history of orders</a>
                            <br/> <br/>
                            <a class="btn bg-success "  href="{{route('order.verify',['id' => $product['item']->id])}}">Checkout</a>

                        @else
                            <table>
                                <tr>
                                    <h5>Already a customer? </h5>
                                </tr>
                                <tr>
                                    <a  href="{{route('login')}}">login</a>
                                </tr>
                                <tr>
                                    <h6>  I don't have an account yet</h6>
                                </tr>
                                <tr>
                                    <a href="{{route('register')}}">register</a>
                                </tr>
                            </table>


                        @endif

{{--                        <div class="pull-right"><a  class="btn btn-primary">Checkout</a></div>--}}


                    </div>
                </div></div>

        </div>
        <!--Middle Part End -->
    </div>
{{--    <div class="pull-left"><a href="{{url('/')}}" class="btn btn-default">countinue shopping</a></div>--}}
@endsection

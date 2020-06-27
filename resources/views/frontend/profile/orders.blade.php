@extends('frontend.layout.master')
@section('content')
    @if(Session::has('success'))
        <div class="alert alert-success">
            <div>{{session('success')}}</div>
        </div>
    @endif
    <div class="container">
        <div class="row"><br></div>
        <div class="row">
            <div class="col-sm-3">
                <a href="{{route('profile.orders')}}">history of orders</a>

            </div>
            <!--Middle Part Start-->
            <div id="content" class="col-sm-8">
                <div class="">
                    <div class="table-responsive">
                        <table class="table no-margin">
                            <thead>
                            <tr>
                                <th class="text-center">id</th>
                                <th class="text-center">user name</th>
                                <th class="text-center">amount</th>
                                <th class="text-center">status</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($orders as $order)
                                <tr>
                                    <td class="text-center"><a href="{{route('profile.orders.lists', ['id'=>$order->id])}}">{{$order->id}}</a></td>
                                    <td class="text-center"><a href="{{route('profile.orders.lists', ['id'=>$order->id])}}">{{$order->user->name}}</a></td>
                                    <td class="text-center">{{$order->amount}}$</td>
                                    @if($order->status == 0)
                                        <td class="text-center"><span class="label label-danger">unpaid</span></td>
                                    @else
                                        <td class="text-center"><span class="label label-success">paid</span></td>
                                    @endif
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!--Middle Part End -->
        </div>
    </div>


@endsection

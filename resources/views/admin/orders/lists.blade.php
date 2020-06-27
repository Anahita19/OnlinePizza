@extends('admin.layout.master')
assssssss
@section('content')
    <section class="content">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title pull-right"> list of orders ---  {{$order->id}}</h3>
            </div>
{{--            <!-- /.box-header -->--}}
            <div class="box-body">
                <div class="table-responsive">
                    <table class="table no-margin">
                        <thead>
                        <tr>
                            <th class="text-center">picture</th>
                            <th class="text-center">name</th>
                            <th class="text-center">code</th>
                            <th class="text-center">qty</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($order->products as $product)
                            <tr>
                                <td class="text-center"><img width="100" src="{{$product->photos[0]->path}}"> </td>
                                <td class="text-center">{{$product->title}}</td>
                                <td class="text-center">{{$product->sku}}</td>
                                <td class="text-center">{{$product->pivot->qty}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
{{--                </div>--}}
                <div class="customer-data">
                    <p style="margin-top: 20px">
                        <strongt>customer name :</strongt> {{$order->user->name . ' ' . $order->user->last_name}}
                    </p>
                    <p>
                        <strongt>address : </strongt> {{  $order->user->addresses[0]->address}}
                        <strongt>post code : </strongt> {{$order->user->addresses[0]->post_code}}
                    </p>
                    <p>
                        <strongt>phone number : </strongt> {{$order->user->phone}}
                    </p>
                </div>
                <!-- /.table-responsive -->
            </div>
        </div>
    </section>

@endsection

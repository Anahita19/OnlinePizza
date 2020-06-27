

<div class="container">
    @if(Session::has('success'))
        <div class="alert alert-success">
            <div>{{session('success')}}</div>
        </div>
    @endif

    <div class="row">
        <aside id="column-right" class="col-sm-3 hidden-xs">

            <div class="list-group">
                <ul class="list-item">


                    <li><a href="{{route('profile.orders')}}">history of orders</a></li>

                </ul>
            </div>
        </aside>
        <!--Middle Part Start-->
        <div id="content" class="col-sm-9">
            <div class="table-responsive">
                <table class="table no-margin">
                    <thead>
                    <tr>
                        <th class="text-center">picture</th>
                        <th class="text-center">name</th>
                        <th class="text-center">code</th>
                        <th class="text-center">Qty</th>
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
            </div>
            <div class="customer-data">
                <table>
                    <tr>
                        <td>Customer name :</td>
                        <td> {{$order->user->name . ' ' . $order->user->last_name}}</td>
                    </tr>
                    <tr>
                        <td>phone :</td>
                        <td> {{$order->user->phone}} </td>
                    </tr>
                    <tr>
                        <td>address :</td>
                        <td> {{$order->user->addresses[0]->address}} </td>
                        <td>post_code : </td>
                        <td> {{$order->user->addresses[0]->post_code}} </td>
                    </tr>
                </table>

                <p>

{{--                    <strongt>کد پستی خریدار: </strongt> {{$order->user->addresses[0]->post_code}}--}}
                </p>

            </div>
        </div>
        <!--Middle Part End -->
    </div>
</div>


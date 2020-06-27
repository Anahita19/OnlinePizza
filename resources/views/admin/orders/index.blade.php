@extends('admin.layout.master')

@section('content')
    <section class="content">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title pull-right">Orders</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                @include('admin.partials.form-errors')
                @if(Session::has('error'))
                    <div class="alert alert-danger">
                        <div>{{session('error')}}</div>
                    </div>
                @endif
                @if(Session::has('success'))
                    <div class="alert alert-success">
                        <div>{{session('success')}}</div>
                    </div>
                @endif
                <div class="table-responsive">
                    <table class="table no-margin">
                        <thead>
                        <tr>
                            <th class="text-center">id</th>
                            <th class="text-center">amount</th>
                            <th class="text-center">status</th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach($orders as $order)
                            <tr>
                                <td class="text-center"><a href="{{route('orders.lists', ['id'=>$order->id])}}">{{$order->id}}</a></td>

                                <td class="text-center">{{$order->amount}}</td>
                                @if($order->status == 0)
                                    <td class="text-center"><span class="label label-danger">unpaid</span></td>
                                @else
                                    <td class="text-center"><span class="label label-success">is paid </span></td>
                                @endif
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
                <!-- /.table-responsive -->
            </div>
        </div>
    </section>

@endsection

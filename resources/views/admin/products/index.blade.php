@extends('admin.layout.master')

@section('content')
    <section class="content">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title pull-right">Products</h3>
                <div class="text-left">
                    <a class="btn btn-app bg-green-gradient" href="{{route('products.create')}}">
                        <i class="fa fa-plus"></i> new
                    </a>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                @include('admin.partials.form-errors')
                @if(Session::has('error'))
                    <div class="alert alert-danger">
                        <div>{{session('error')}}</div>
                    </div>
                @endif
                @if(Session::has('delete-pro'))
                    <div class="alert alert-danger">
                        <div>{{session('delete-pro')}}</div>
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
                            <th class="text-center">photo</th>
                            <th class="text-center">provided for sale</th>
                            <th class="text-center">product code</th>
                            <th class="text-center">title</th>
                            <th class="text-center">modify</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($products as $product)
                            <tr>
                                <td class="text-center">{{$product->id}}</td>
                                <td class="text-center">
                                    @foreach($product->photos as $photo)
                                        <div  class="col-sm-3" id="updated_photo_{{$photo->id}}">
                                            <img class="img-responsive" src="{{$photo->path}}" width="200" height="250">

                                        </div>
                                    @endforeach
                                </td>
                                <td class="text-center">{{$product->supply_qty}}</td>
                                <td class="text-center">{{$product->sku}}</td>
                                <td class="text-center">{{$product->title}}</td>
                                <td class="text-center">
                                    <a class="btn bg-navy" href="{{route('products.edit', $product->id)}}">Edit</a>
                                    <div style="display: inline-block">
                                        <form method="post" action="/administrator/products/{{$product->id}}">
                                            @csrf
                                            <input type="hidden" name="_method" value="DELETE">
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </div>

                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                    <div class="col-md-12" style="text-align: center">{{$products->links()}}</div>

                </div>
                <!-- /.table-responsive -->
            </div>
        </div>
    </section>

@endsection

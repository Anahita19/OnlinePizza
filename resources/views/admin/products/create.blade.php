@extends('admin.layout.master')

@section('styles')
    <link rel="stylesheet" href="{{asset('/admin/dist/css/dropzone.min.css')}}">
@endsection

@section('content')
    <section class="content" id="app">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title pull-right">create new product</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        @include('admin.partials.form-errors')
                        <form id="myForm" method="post" action="/administrator/products">
                            @csrf
                            <div class="form-group">
                                <label for="title">title of product</label>
                                <input type="text" name="title" class="form-control" placeholder=" Enter title of product...">
                            </div>
                            <div class="form-group">
                                <label for="slug">Slug</label>
                                <input type="text" name="slug" class="form-control" placeholder="Enter slug ...">
                            </div>
                            <div class="form-group">
                                <label for="slug">provided for sale</label>
                                <input type="number" name="supply_qty" class="form-control" placeholder="Enter provided ...">
                            </div>
                            <div class="form-group">
                                <label>status</label>
                                <div>
                                    <input type="radio" name="status" value="0" checked> <span class="margin-l-10">not publish</span>
                                    <input type="radio" name="status" value="1"> <span>publish</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>price</label>
                                <input type="number" name="price" class="form-control" placeholder="Enter Price...">
                            </div>
                            <div class="form-group">
                                <label>discount_price</label>
                                <input type="number" name="discount_price" class="form-control" placeholder="Enter discount price...">
                            </div>
                            <div class="form-group">
                                <label>description</label>
                                <textarea id="textareaDescription" type="text" name="description" class="ckeditor form-control" placeholder="Enter description ..."></textarea>
                            </div>
                            <div class="form-group">
                                <label for="photo">photo</label>
                                <input type="hidden" name="photo_id[]" id="product-photo">
                                <div id="photo" class="dropzone"></div>
                            </div>
                            <div class="form-group">
                                <label>meta_title</label>
                                <input type="text" name="meta_title" class="form-control" placeholder="Enter meta_title ...">
                            </div>
                            <div class="form-group">
                                <label>meta_desc</label>
                                <textarea type="text" name="meta_desc" class="form-control" placeholder="Enter meta_desc ..."></textarea>
                            </div>
                            <div class="form-group">
                                <label>meta_keywords</label>
                                <input type="text" name="meta_keywords" class="form-control" placeholder="Enter meta_keywords ...">
                            </div>
                            <button type="submit" onclick="productGallery()" class="btn btn-success pull-left">Save Product</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </section>

@endsection

@section('script-vuejs')
    <script src="{{asset('admin/js/app.js')}}"></script>
@endsection

@section('scripts')
    <script type="text/javascript" src="{{asset('/admin/dist/js/dropzone.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('/admin/plugins/ckeditor/ckeditor.js')}}"></script>
    <script>
        Dropzone.autoDiscover = false;
        var photosGallery = []
        var drop = new Dropzone('#photo', {
          addRemoveLinks: true,
          url: "{{ route('photos.upload') }}",
          sending: function(file, xhr, formData){
            formData.append("_token","{{csrf_token()}}")
          },
          success: function(file, response){
            photosGallery.push(response.photo_id)
          }
        });
        productGallery = function(){
          document.getElementById('product-photo').value = photosGallery
        }

        CKEDITOR.replace('textareaDescription',{
          customConfig: 'config.js',
          toolbar: 'simple',
          language: 'fa',
          removePlugins: 'cloudservices, easyimage'
        })

    </script>

@endsection

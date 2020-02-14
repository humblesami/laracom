@extends('admin.app')
@section('breadcrumbs')
    <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{route('admin.product.index')}}">Products</a></li>
    <li class="breadcrumb-item active">Add Product</li>
@endsection 
@section('content')
    <h2 class="modal-title">Add Product</h2>
    <form action="@if(isset($product)) {{route('admin.product.update',$product)}} @else {{route('admin.product.store')}} @endif" 
    method="post" accept-charset="utf-8" enctype="multipart/form-data">
        <div class="row">
            @csrf
            @if(isset($product))
                @method('PUT')
            @endif
            <!-- Error Messages -->
            <div class="col-lg-12">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if(session()->has('message'))
                    <p class="alert alert-success">
                        {{session('message')}}
                    </p>
                @endif
            </div>
            <div class="col-lg-9">
                <div class="form-group row">
                    <div class="col-lg-12">
                        <label class="form-control-label">Title:</label>
                        <input type="text" id="texturl" name="title" class="form-control" value="{{old('title') ? old('title'):@$product->title}}">
                        <p class="small">{{config('app.url')}} <span id="url"></span></p>
                        <input type="hidden" name="slug" id="slug" value="{{old('slug') ? old('slug'):@$product->slug}}">
                    </div>
                </div>
                <!-- Description -->
                <div class="form-group row">
                    <div class="col-sm-12">
                        <label class="form-control-label">Description:</label>
                        <textarea name="description" id="editor" class="form-control" cols="80" rows="10">
                            {!! old('description') ? old('description'):@$product->description !!}
                        </textarea>
                    </div>
                </div>
                
                <div class="form-group row">
                    <!-- Price -->
                    <div class="col-6">
                        <label class="form-control-label">Price:</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">Rs</span>
                            </div>
                            <input type="text" class="form-control" placeholder="0.00" name="price" aria-label="price"
                            aria-describedby="price" value="{{old('price') ? old('price'):@$product->price}}">
                        </div>
                    </div>
                    <!-- Discount -->
                    <div class="col-6">
                        <label class="form-control-label">Discount:</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">%</span>
                            </div>
                            <input type="text" class="form-control" name="discount" 
                            placeholder="0.00" aria-label="discount"
                            aria-describedby="discount" 
                            value="{{old('discount') ? old('discount'):@$product->discount}}">
                        </div>
                    </div>
                </div>
                <!-- Extra Options -->
                <div class="form-group row">
                    <div class="card col-sm-12 mb-2 p-0">
                        <div class="card-header align-items-center">
                            <h5 class="card-title float-left">Extra Options</h5>
                            <div class="float-right">
                                <button type="button" id="btn-add" class="btn btn-sm btn-primary">+</button>
                                <button type="button" id="btn-remove" class="btn btn-sm btn-danger">-</button>
                            </div>
                        </div>
                        <div class="card-body" id="extras">

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <ul class="list-group row">
                    <li class="list-group-item active"><h5>Status</h5></li>
                    <li class="list-group-item">
                        <div class="form-group row">
                            <select class="form-control" id="status" name="status">
                                <option value="1" @if(isset($product) && $product->status==0)){{'selected'}}@endif>Pending</option>
                                <option value="2" @if(isset($product) && $product->status==1) ){{'selected'}}@endif>Publish</option>
                            </select>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-12">
                            @if(isset($product))
                            <input type="submit" name="submit" class="btn btn-primary btn-block" value="Update Product">
                            @else
                            <input type="submit" name="submit" class="btn btn-primary btn-block" value="Add Product">
                            @endif
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item active"><h5>Featured Image</h5></li>
                    <li class="list-group-item">
                        <div class="input-group mb-3">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="thumbnail" id="thumbnail">
                                <label class="custom-file-label" for="thumbnail">Choose File</label>
                            </div>
                        </div>
                        <div class="img-thumbnail text-center">
                            {{-- @if(isset($product)){{asset('images/'.$product->thumbnail)}} 
                            @else {{asset('images/'.no-thumbnail.png)}} @endif --}}
                            <img src="@if(isset($product)){{asset('public/storage/'.$product->thumbnail)}} 
                            @else {{asset('public/images/no-thumbnail.png')}} @endif" id="imgthumbnail" class="img-fluid" alt="">
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class="col-12">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" >
                                        <input type="checkbox" id="featured" name="featured" value="@if(isset($product)){{$product->featured}}@else{{0}}@endif" @if(isset($product) && $product->featured == 1){{'checked'}} @endif>
                                    </span>
                                </div>
                                <p type="text" class="form-control" name="featured" placeholder="0.00" aria-label="featured"
                                aria-describedby="featured">Featured Product</p>
                            </div>
                        </div>
                    </li>
                    @php 
                        $ids = (isset($product) && $product->categories->count() > 0) ?
                        array_pluck($product->categories->toArray(), 'id'):null;
                    @endphp
                    <li class="list-group-item active"><h5>Select Categories</h5></li>
                    <li class="list-group-item">
                        <select class="form-control" id="select2" name="category_id[]" multiple>
                            @if($categories->count() > 0)
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}"
                                    @if(!is_null($ids) && in_array($category->id, $ids)) {{'selected'}}@endif>{{$category->title}}</option>
                                @endforeach
                            @endif
                        </select>
                    </li>
                </ul>
            </div>
        </div>
    </form>
@endsection
@section('scripts')
    <script>

            ClassicEditor
                .create( document.querySelector( '#editor' )
                )
                .then( editor => {
                    console.log(editor);
                } )
                .catch( err => {
                    console.error( err );
                });
            //Key up Slug
                @php
                    if(!isset($product)){
                @endphp
                $('#texturl').on('keyup',function(){
                    var url = slugify($(this).val());
                    $('#url').html(url);
                    $('#slug').val(url);
                });
                @php 
                    }
                @endphp
            // Multiple Categories
            $('#select2').select2({
                placeholder: "Select Multiple Category",
                allowClear: true

            });
            $('#status').select2({
                placeholder: "Select a Status",
                allowClear: true,
                minimumResultsForSearch: Infinity
            });
            //Change Thumbnail
            $('#thumbnail').on('change',function(){
                var file = $(this).get(0).files;
                var reader = new FileReader();
                reader.readAsDataURL(file[0]);
                reader.addEventListener("load", function(e){
                    var image = e.target.result;
                    $('#imgthumbnail').attr('src',image);
                });
            });
            //Add options
            $('#btn-add').on('click',function(e){
                var count = $('.options').length+1;
                $('#extras').append('<div class="row align-items-center options">\
                                <div class="col-sm-4">\
                                    <label class="form-control-label">Options <span class="count">'+count+'</span></label>\
                                    <input type="text" name="options[]" class="form-control" placeholder="size">\
                                </div>\
                                <div class="col-sm-8">\
                                    <label class="form-control-label">Values</label>\
                                    <input type="text" name="values[]" class="form-control" placeholder="option1 | option2 | option3">\
                                    <label class="form-control-label">Additional Prices</label>\
                                    <input type="text" name="prices[]" class="form-control" placeholder="price1 | price2 | price3">\
                                </div>\
                            </div>'
                );
            });
            //Remove Options
            $('#btn-remove').on('click',function(e){
                if($('.options').length > 1){
                    $('.options:last').remove();
                }
            });
            //Featured Product
            $('#featured').on('change',function(){
                if($(this).is(":checked")){
                    $(this).val(1);
                }
                else{
                    $(this).val(0);
                }
            });
    </script>
@endsection
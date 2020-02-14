@extends('admin.app')
@section('breadcrumbs')
  <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
  <li class="breadcrumb-item"><a href="{{route('admin.category.index')}}">Categories</a></li>
  <li class="breadcrumb-item acrive" aria-current="page">Add Category</li>
@endsection 
@section('content')
    <form action="@if(isset($category)) {{route('admin.category.update',$category->slug)}} @else {{route('admin.category.store')}} @endif" method="post" accept-charset="utf-8" enctype="multipart/form-data">
        @csrf
        @if(isset($category))
            @method('PUT')
        @endif
        <!-- Error Messages -->
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
        <div class="row">
            <div class="col-md-8">
                <div class="form-group row">
                    <div class="col-sm-12">
                        <label class="form-control-label">Title:</label>
                        <input type="text" id="texturl" name="title" class="form-control" value="{{@$category->title}}">
                        <p class="small">{{config('app.url')}} <span id="url"></span></p>
                        <input type="hidden" name="slug" id="slug" value="{{@$category->slug}}">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-12">
                        <label class="form-control-label">Description:</label>
                        <textarea name="description" id="editor" class="form-control" cols="80" rows="10">
                            {!! @$category->description !!}
                        </textarea>
                    </div>
                </div>
                <div class="form-group row">
                    @php 
                        $ids = (isset($category->childrens) && $category->childrens->count() > 0) ?
                        array_pluck($category->childrens, 'id'):null;
                    @endphp
                    <div class="col-sm-12">
                        <label class="form-control-label">Select Category:</label>
                        <select name="parent_id" id="parent_id" class="form-control" multiple>
                            @if(isset($categories))
                                <option value="0">Top Level</option>
                                option
                                @foreach($categories as $cat)
                                    <option value="{{$cat->id}}" 
                                        @if(!is_null($ids) && in_array($cat->id, $ids)) {{'selected'}}@endif>
                                        {{$cat->title}}
                                    </option>
                                @endforeach
                            @endif
                            option
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <label>Image</label>
                <div class="input-group mb-3">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" name="thumbnail" id="thumbnail">
                        <label class="custom-file-label" for="thumbnail">Choose File</label>
                    </div>
                </div>
                <div class="img-thumbnail text-center">
                    <img src="@if(isset($category)){{asset('public/storage/'.$category->thumbnail)}} 
                    @else {{asset('public/images/no-thumbnail.png')}} @endif" id="imgthumbnail" class="img-fluid" alt="">
                </div>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-12">
                @if(isset($category))
                    <input type="submit" name="submit" value="Edit Category" class="btn btn-primary">
                @else
                    <input type="submit" name="submit" value="Add Category" class="btn btn-primary">
                @endif
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
                if(!isset($category)){
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
            $('#parent_id').select2({
                placeholder: "Select Parent Category",
                allowClear: true,
                minimumResultsForSearch: Infinity

            });
            $('#thumbnail').on('change',function(){
                var file = $(this).get(0).files;
                var reader = new FileReader();
                reader.readAsDataURL(file[0]);
                reader.addEventListener("load", function(e){
                    var image = e.target.result;
                    $('#imgthumbnail').attr('src',image);
                });
            });
    </script>
@endsection
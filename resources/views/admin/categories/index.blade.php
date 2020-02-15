@extends('admin.app')
@section('breadcrumbs')
  <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
  <li class="breadcrumb-item acrive" aria-current="page">Categories</li>
@endsection 
@section('content')
    <div class="container">
        <div class="row justify-content-between mb-2">
            <h2>Categories</h2>
            <a href="{{route('admin.category.create')}}" class="btn btn-primary">Add New</a>
        </div>
        <div class="row">
            @if(session()->has('message'))
                <div class="alert alert-success">
                    {{session('message')}}
                </div>  
            @endif
        </div>
        <div class="row">
            <div class="table-responsive">
                <table class="table table-striped table-sm">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Slug</th>
                        <th>Categories</th>
                        <th>Thumbnail</th>
                        <th>Created At</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if($categories)
                        @foreach($categories as $category)
                            <tr>
                                <td>{{$loop->index+1}}</td>
                                <td>{{$category->title}}</td>
                                <td>{!! $category->description !!}</td>
                                <td>{{$category->slug}}</td>
                                <td>
                                    @if($category->childrens->count() > 0)
                                        @foreach($category->childrens as $children)
                                            {{$children->title}},
                                        @endforeach
                                    @else
                                        <strong>{{ "Parent Category "}}</strong>
                                    @endif
                                </td>
                                <td>
                                @php
                        $public_folder_path = "";
                        $is_sub_str = $_SERVER['SERVER_PORT'];
                        if($is_sub_str == 80)
                            $public_folder_path = "public/";
                    @endphp
                    <img src="{{asset($public_folder_path.'storage/'.$category->thumbnail)}}" 
                    alt="{{asset($public_folder_path.'images/no-thumbnail.png')}}" class="img-responsive" height="50">
                            </td>
                                <td>{{$category->created_at}}</td>
                                <td>
                                    @if(request()->url() == route('admin.category.index')) 
                                        <a href="{{route('admin.category.edit',$category->slug)}}" class="btn btn-sm btn-info">Edit</a> |
                                        <a href="{{route('admin.category.remove',$category->slug)}}" class="btn btn-sm btn-warning">Trash</a> |
                                    @endif
                                    @if(request()->url() == route('admin.category.trash')) 
                                    <a href="{{route('admin.category.recover',$category->id)}}"  class="btn btn-sm btn-info">Restore</a> |
                                    @endif
                                    <a href="javascript:;" onclick="confirmDelete('{{$category->id}}')" class="btn btn-sm btn-danger">Delete</a>
                                    <form id="delete-category-{{$category->id}}" action="{{ route('admin.category.destroy',$category->slug) }}" method="POST" style="display: none;">
                                        @method('DELETE')
                                        @csrf
                                    </form>
                                </td>
                            </tr>
                        @endforeach 
                    @else
                        <tr>
                            <td colspan="5">No Categories Found</td>
                        </tr>
                    @endif
                    
                    </tbody>
                </table>
            </div>
        <div class="col-sm-12 p-0">
            {{$categories->links()}}
        </div>    
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        function confirmDelete(id){
            let choice = confirm("Are you sure. You want to delete this record ?");
            if(choice){
                document.getElementById('delete-category-'+id).submit();
            }
        }
    </script>
@endsection
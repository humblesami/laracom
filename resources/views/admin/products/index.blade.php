@extends('admin.app')
@section('breadcrumbs')
    <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
    <li class="breadcrumb-item active">Products</a></li>
@endsection 
@section('content')
    <div class="container">
        <div class="row justify-content-between mb-2">
            <h2>Products</h2>
            <a href="{{route('admin.product.create')}}" class="btn btn-primary">Add New</a>
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
                        <th>Price</th>
                        <th>Thumbnail</th>
                        <th>Created At</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if($products->count() > 0)
                        @foreach($products as $product)
                            <tr>
                                <td>{{$loop->index+1}}</td>
                                <td>{{$product->title}}</td>
                                <td>{!! substr($product->description,0,30) !!}</td>
                                <td>{{$product->slug}}</td>
                                <td>
                                @if($product->categories()->count() > 0)
                                @foreach($product->categories as $children)
                                    {{ $children->title}},
                                @endforeach
                                @endif
                            </td>
                            <td>{{$product->price}}</td>
                            <td>
                                <img src="{{asset('public/storage/'.$product->thumbnail)}}" alt="{{$product->title}}" class="img-responsive" height="50">
                            </td>
                                <td>{{$product->created_at}}</td>
                                <td>
                                @if(request()->url() == route('admin.product.index')) 
                                        <a href="{{route('admin.product.edit',$product->slug)}}" class="btn btn-sm btn-info">Edit</a> |
                                        <a href="{{route('admin.product.remove',$product->slug)}}" class="btn btn-sm btn-warning">Trash</a> |
                                    @endif
                                    @if(request()->url() == route('admin.product.trash')) 
                                    <a href="{{route('admin.product.recover',$product->id)}}"  class="btn btn-sm btn-info">Restore</a> |
                                    @endif
                                    <a href="javascript:;" onclick="confirmDelete('{{$product->id}}')" class="btn btn-sm btn-danger">Delete</a>
                                    <form id="delete-product-{{$product->id}}" action="{{ route('admin.product.destroy',$product->slug) }}" method="POST" style="display: none;">
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
            {{$products->links()}}
        </div>    
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        function confirmDelete(id){
            let choice = confirm("Are you sure. You want to delete this record ?");
            if(choice){
                document.getElementById('delete-product-'+id).submit();
            }
        }
    </script>
@endsection
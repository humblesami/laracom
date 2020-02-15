@extends('admin.app')
@section('breadcrumbs')
  <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
  <li class="breadcrumb-item active">Orders Details</a></li>
@endsection 
@section('content')
    <div class="container">
        <div class="row justify-content-between mb-2">
            <h2>Orders Details</h2>
        </div>
        <div class="row">
            @if(session()->has('message'))
                <div class="alert alert-success">
                    {{session('message')}}
                </div>  
            @endif
        </div>
        <div class="row mb-3 justify-content-end">
                <a href="{{route('admin.order.updateStatus')}}" class="btn btn-success mr-2">Complete</a>
                <a href="{{route('admin.order.cancelStatus')}}" class="btn btn-danger">Cancel</a>
        </div>
        <div class="row">
            <div class="table-responsive">
                <table class="table table-striped table-sm">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Product Name</th>
                        <th>Price</th>
                        <th>Image</th>
                        <th>Quantity</th>
                        <th>Delivery</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if($orderDetails->count() > 0)
                        @foreach($orderDetails as $details)
                            <tr>
                                <td>{{$loop->index+1}}</td>
                                <td>{{$details->title}}</td>
                                <td>{{$details->price}}</td>
                                <td>
                                @php
                                    $public_folder_path = "";
                                    $is_sub_str = $_SERVER['SERVER_PORT'];
                                    if($is_sub_str == 80)
                                        $public_folder_path = "public/";
                                @endphp
                                <img src="{{asset($public_folder_path.'storage/'.$details->thumbnail)}}" 
                                alt="{{asset($public_folder_path.'images/no-thumbnail.png')}}" class="img-responsive" height="50">
                                </td>
                                <td>{{$details->qty}}</td>
                                <td>{{$details->status}}</td>
                             </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
            </div>
        <div class="col-sm-12 p-0">
     
        </div>    
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        function confirmDelete(id){
            let choice = confirm("Are you sure. You want to delete this record ?");
            if(choice){
                document.getElementById('delete-order-'+id).submit();
            }
        }
    </script>
@endsection
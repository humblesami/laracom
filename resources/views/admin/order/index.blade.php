@extends('admin.app')
@section('breadcrumbs')
  <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
  <li class="breadcrumb-item active">Orders</a></li>
@endsection 
@section('content')
    <div class="container">
        <div class="row justify-content-between mb-2">
            <h2>Orders</h2>
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
                        <th>Full Name</th>
                        <th>Address1</th>
                        <th>Address2</th>
                        <th>Zip Code</th>
                        <th>Country</th>
                        <th>State</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if($orders->count() > 0)
                        @foreach($orders as $order)
                            <tr>
                                <td>{{$loop->index+1}}</td>
                                <td>{{ucfirst($order->billing_firstName)." ". ucfirst($order->billing_lastName)}}</td>
                                <td>
                                @if($order->billing_address1)
                                    {{$order->billing_address1}}
                                @endif
                                </td>
                                <td>
                                @if($order->billing_address2)
                                    {{$order->billing_address2}}
                                @endif
                                </td>
                                <td>{{$order->billing_zip}}</td>
                                <td>{{$order->billing_country}}</td>
                                <td>{{$order->billing_state}}</td>
                                
                                <td><a href="{{route('admin.order.orderDetails',$order->id)}}" class="btn btn-primary btn-sm">Details</a></td>
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
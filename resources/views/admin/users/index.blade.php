@extends('admin.app')
@section('breadcrumbs')
  <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
  <li class="breadcrumb-item active">Users</a></li>
@endsection 
@section('content')
    <div class="container">
        <div class="row justify-content-between mb-2">
            <h2>Profiles</h2>
            <a href="{{route('admin.profile.create')}}" class="btn btn-primary">Add New</a>
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
                        <th>Username</th>
                        <th>Email</th>
                        <th>Slug</th>
                        <th>Role</th>
                        <th>Address</th>
                        <th>Thumbnail</th>
                        <th>Created At</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(isset($users) && $users->count() > 0)
                        @foreach($users as $user)
                            <tr>
                                <td>{{@$loop->index+1}}</td>
                                <td>{{@$user->profile->name}}</td>
                                <td>{{@$user->email}}</td>
                                <td>{{@$user->profile->slug}}</td>
                                <td>{{@$user->role->name}},</td>
                                <td>{{@$user->profile->address}},{{@$user->getCity()}},{{@$user->getState()}},{{@$user->getCountry()}}</td>
                                <td>
                                  <img src="{{asset('public/storage/'.@$user->profile->thumbnail)}}" alt="{{@$user->profile->name}}" class="img-responsive" height="50">
                                </td>
                                <td>{{@$user->created_at}}</td>
                                <td>
                                    <a href="javascript:;" onclick="confirmDelete('{{$user->profile->slug}}')" class="btn btn-sm btn-danger">Delete</a>
                                    <form id="delete-user-{{$user->profile->slug}}" action="{{ route('admin.profile.destroy',$user->profile->slug) }}" method="POST" style="display: none;">
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
            {{$users->links()}}
        </div>    
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        function confirmDelete(id){
            let choice = confirm("Are you sure. You want to delete this record ?");
            if(choice){
                document.getElementById('delete-user-'+id).submit();
            }
        }
    </script>
@endsection
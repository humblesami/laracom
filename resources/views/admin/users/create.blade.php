@extends('admin.app')
@section('breadcrumbs')
<li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
<li class="breadcrumb-item"><a href="{{route('admin.user.index')}}">users</a></li>
<li class="breadcrumb-item active">Add user</li>
@endsection 
@section('content')
<h2 class="modal-title">Add user</h2>
<form action="@if(isset($user)) {{route('admin.profile.update',$user)}} @else {{route('admin.profile.store')}} @endif" method="post" accept-charset="utf-8" enctype="multipart/form-data">
    <div class="row">
        @csrf
        @if(isset($user))
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
                <div class="col-12 col-lg-6">
                    <label class="form-control-label">Name:</label>
                    <input type="text" id="texturl" name="name" class="form-control" value="{{@$user->profile->name}}">
                    <p class="small">{{route('admin.profile.index')}}/<span id="url">{{@$user->profile->slug}}</span></p>
                    <input type="hidden" name="slug" id="slug" value="{{@$user->slug}}">
                </div>
                <div class="col-12 col-lg-6">
                    <label class="form-control-label">Email:</label>
                    <input type="email" id="email" name="email" class="form-control" value="{{@$user->email}}">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-12 col-lg-6">
                    <label class="form-control-label">Password:</label>
                    <input type="password" id="password" name="password" class="form-control" value="{{@$user->password}}">
                </div>
                <div class="col-12 col-lg-6">
                    <label class="form-control-label">Confirm Password:</label>
                    <input type="password" id="password_confirm" name="password_confirm" class="form-control">
                </div>
            </div>
            <!-- Description -->
            <div class="form-group row">
                <div class="col-sm-6">
                    <label class="form-control-label">Status:</label>
                    <select class="form-control" id="status" name="status">
                        <option value="0" @if(isset($user) && $user->status==0)){{'selected'}}@endif>Blocked</option>
                        <option value="1" @if(isset($user) && $user->status==1) ){{'selected'}}@endif>Active</option>
                    </select>
                </div>
                @php
                    $ids = (isset($user) && $user->role->count() > 0) ? array_pluck($user->role->toArray()) : null;
                @endphp
                <div class="col-sm-6">
                    <label class="form-control-label">Role:</label>
                    <select class="form-control" id="role" name="role_id">
                        @if($roles->count() > 0)
                            @foreach($roles as $role)
                                <option value="{{$role->id}}" 
                                @if(!is_null($ids) && in_array($role->id, $ids))
                                    {{'selected'}}
                                @endif>
                                {{$role->name}}
                                </option>
                            @endforeach
                        @endif
                        
                    </select>
                </div>
            </div>
            
            <div class="form-group row">
                <div class="col-12">
                    <label class="form-control-label">Address:</label>
                    <input type="text" name="address" class="form-control" value="{{@$user->profile->address}}">
                </div>
            </div>

            <div class="form-group row">
                <!-- Country -->
                <div class="col-sm-6 col-md-3">
                    <label class="form-control-label">Country:</label>
                    <div class="input-group mb-3">
                        <select name="country_id" id="countries" class="form-control">
                        <option value="0">Select a Country</option>
                            @foreach($countries as $country)
                            <option value="{{$country->id}}">{{$country->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <!-- State -->
                <div class="col-sm-6 col-md-3">
                    <label class="form-control-label">States:</label>
                    <div class="input-group mb-3">
                    <select name="state_id" id="states" class="form-control">
                        <option value="0">Select a State</option>
                        </select>
                    </div>
                </div>
                <!-- City -->
                <div class="col-sm-6 col-md-3">
                    <label class="form-control-label">City:</label>
                    <div class="input-group mb-3">
                        <select name="city_id" id="cities" class="form-control">
                        </select>
                    </div>
                </div>
                <!-- State -->
                <div class="col-sm-6 col-md-3">
                    <label class="form-control-label">Phone:</label>
                    <div class="input-group mb-3">
                        <input type="text" name="phone" class="form-control" value="{{@$user->phone}}">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <ul class="list-group row">
                <li class="list-group-item active"><h5>Profile Image</h5></li>
                <li class="list-group-item">
                    <div class="input-group mb-3">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="thumbnail" id="thumbnail">
                            <label class="custom-file-label" for="thumbnail">Choose File</label>
                        </div>
                    </div>
                    <div class="img-thumbnail text-center">
                        <img src="@if(isset($user)){{asset('public/storage/'.$user->thumbnail)}} 
                        @else {{asset('public/images/no-thumbnail.png')}} @endif" id="imgthumbnail" class="img-fluid" alt="">
                    </div>
                </li>
                <li class="list-group-item">                    
                    <div class="form-group row">
                        <div class="col-lg-12">
                        @if(isset($user))
                        <input type="submit" name="submit" class="btn btn-primary btn-block" value="Update user">
                        @else
                        <input type="submit" name="submit" class="btn btn-primary btn-block" value="Add user">
                        @endif
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</form>
@endsection
@section('scripts')
<script>
        //Key up Slug
        @php
            if(!isset($user)){
        @endphp
            $('#texturl').on('keyup',function(){
                var url = slugify($(this).val());
                $('#url').html(url);
                $('#slug').val(url);
            });
        @php 
            } 
        @endphp
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
        //Featured user
        $('#featured').on('change',function(){
            if($(this).is(":checked")){
                $(this).val(1);
            }
            else{
                $(this).val(0);
            }
        });
        // Multiple
        $('#countries').select2().trigger('change');
        $('#states').select2();
        $('#cities').select2();
        //On change country
        $('#countries').on('change',function(){
            var id = $('#countries').select2('data')[0].id;
            $('#states').val(null);
            $('#states option').remove();
            var states = $('#states');
            $.ajax({
                type: 'GET',
                url: "{{route('admin.profile.states')}}/" + id
            }).then(function(data){
                for(i=0;i<data.length;i++){
                    var item = data[i];
                    var options = new Option(item.name,item.id,true,true);
                    states.append(options);
                }
                states.trigger('change');
            });
        });
        //On change State
        $('#states').on('change',function(){
            var id = $('#states').select2('data')[0].id;
            $('#cities').val(null);
            $('#cities option').remove();
            var cities = $('#cities');
            $.ajax({
                type: 'GET',
                url: "{{route('admin.profile.cities')}}/" + id
            }).then(function(data){
                for(i=0;i<data.length;i++){
                    var item = data[i];
                    var options = new Option(item.name,item.id,false,false);
                    cities.append(options);
                }
            });
        });
</script>
@endsection
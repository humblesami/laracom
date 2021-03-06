<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @php
		$public_folder_path = "";
		$is_sub_str = $_SERVER['SERVER_PORT'];
		if($is_sub_str == 80)
			$public_folder_path = "public/";
	@endphp
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Emax Save') }}</title>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset($public_folder_path.'css/app.css') }}" rel="stylesheet">
    <link href="{{ asset($public_folder_path.'css/admin.css') }}" rel="stylesheet">
</head>
<body>
<div class="container-fluid">
    <div class="row">
    @include('admin.partials.sidebar')

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Dashboard</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
                <div class="btn-group mr-2">
                <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
                <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
                </div>
                <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
                <span data-feather="calendar"></span>
                This week
                </button>
            </div>
        </div>
        @include('admin.partials.navbar')
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                @yield('breadcrumbs')
            </ol>
        </nav>
            <main class="py-4">
                @yield('content')
            </main>
        </div>
    </main>
    </div>
</div>
    <script src="{{asset($public_folder_path.'js/app.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.9.0/feather.min.js"></script> 
    <script src="{{asset($public_folder_path.'js/admin/dashboard.js')}}"></script>
    @yield('scripts')
</body>
</html>

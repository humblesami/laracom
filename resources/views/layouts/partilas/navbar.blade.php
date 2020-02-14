<div class="navbar-fixed">
<div class="top-nav">
	<nav class="navbar navbar-expand-lg">
		<div class="container">
			<a class="navbar-brand" href="{{route('products.all')}}">
				@php
					$public_folder_path = "";
					$is_sub_str = $_SERVER['SERVER_PORT'];
					if($is_sub_str == 80)
						$public_folder_path = "public/";
				@endphp
				
				<img src="{{asset($public_folder_path."images/logo.png")}}" alt="" style="width: 100px">
			</a>
			<ul class="navbar-nav ml-auto">
				<li class="nav-item">
					<a class="nav-link" href="{{route('cart.all')}}">
						<i class="fa fa-shopping-cart"></i> [
						@php
							$cart = Session::get('cart');
							if($cart){
						@endphp
								{{$cart->getTotalQty()}}
						@php
							}
							else{
						@endphp
							0
						@php
							}

						@endphp
						]
					</a>
				</li>
				@guest
					<li class="nav-item">
						<a href="{{ route('login') }}" class="nav-link">{{ __('Login') }}</a>
					</li>
					<li class="nav-item">
						<a href="{{ route('register') }}" class="nav-link">{{ __('Register') }}</a>
					</li>
				@else
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							{{ Auth::user()->email }} <i class="fa fa-angle-down"></i>
						</a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdown">
							@if(Auth::user()->role->id == 2)
								<a class="dropdown-item" href="{{ route('admin.dashboard') }}">
									Admin Panel
								</a>                    
							@endif
								<a class="dropdown-item" href="{{ route('logout') }}"
								onclick="event.preventDefault();
												document.getElementById('logout-form').submit();">
									{{ __('Logout') }}
								</a>

								<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
									@csrf
								</form>
						</div>
					</li>
				@endguest

			</ul>
		</div>
	</nav>
</div>
<div class="category-menu">
	<div class="container">
		<nav class="navbar navbar-expand-lg navbar-light bg-white">
			<button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav mr-auto">
				@if(@$categories)
					@foreach($categories as $category)
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								{{ucfirst($category->title)}} <i class="fa fa-angle-down"></i>
							</a>
							<div class="dropdown-menu" aria-labelledby="navbarDropdown">
								@foreach($category->childrens as $children)
									<a class="dropdown-item" href="{{route('products.shop',$children->slug)}}">{{ucfirst($children->title)}}</a>
								@endforeach 
							</div>
						</li>
					@endforeach
				@endif
				</ul>
			</div>
		</nav>
	</div>
</div>
</div>
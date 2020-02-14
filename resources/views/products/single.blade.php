@extends('layouts.app')
@section('content')

<div class="colorlib-shop">
	<div class="container">
		<div class="row row-pb-lg">
			<div class="col-md-10 col-md-offset-1">
				<div class="product-detail-wrap">
					<div class="row">
						<div class="col-md-5">
							<div class="product-entry">
								<div class="product-img" id="ex1">
									<img src="{{asset('public/storage/'.$product->thumbnail)}}" alt="{{$product->title}}" style="width: 100%;height:400px;object-fit: cover;">
									<!-- <p class="tag"><span class="sale">Sale</span></p> -->
								</div>
								<!-- <div class="thumb-nail">
									<a href="#" class="thumb-img" style="background-image: url(images/item-11.jpg);"></a>
									<a href="#" class="thumb-img" style="background-image: url(images/item-12.jpg);"></a>
									<a href="#" class="thumb-img" style="background-image: url(images/item-16.jpg);"></a>
								</div> -->
							</div>
						</div>
						<div class="col-md-7">
							<div class="desc">
								<h3>{{$product->title}}</h3>
								<p class="price">
									<span>Rs: {{$product->price}}</span> 
									<h5>
									Category:
										@foreach($product->categories as $productCategory)
											<a href="{{route('products.shop',$productCategory->slug)}}">{{$productCategory->title.","}}</a>
										@endforeach
									</h5>
								</p>
								<p>
				{!! $product->description !!}
			</p>
			<a href="{{route('products.addToCart',$product)}}"><i class="fa fa-shopping-cart"></i> Buy Now</a>
							</div>
						</div>
					</div>
				</div>
			</div>
</div>
</div>
</div>
@endsection
@section('scripts')
<script src="{{asset('public/front/js/jquery.zoom.js')}}"></script>
<script>
$(document).ready(function(){
$('#ex1').css({cursor:"zoom-in"});
$('#ex1').zoom();
});
</script>
@endsection
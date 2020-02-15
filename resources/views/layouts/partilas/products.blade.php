@extends('layouts.app')
@section('content')

@if($products->count() > 0)
<div class="container">
    <div class="row">
        @if(@$limitCategory)
            @foreach($limitCategory as $category)
                @foreach($category->childrens as $children)
                    <div class="col-sm-4 mb-2">
                        <a href="{{route('products.shop',$children->slug)}}">
                        @php
                        $public_folder_path = "";
                        $is_sub_str = $_SERVER['SERVER_PORT'];
                        if($is_sub_str == 80)
                            $public_folder_path = "public/";
                    @endphp
                    <img src="{{asset($public_folder_path.'storage/'.$children->thumbnail)}}" 
                    alt="{{asset($public_folder_path.'storage/'.$children->thumbnail)}}" class="category-image">
                        </a>
                    </div>
                @endforeach
            @endforeach
        @endif    
    </div>
    <div class="perfect-center">
        {{$limitCategory->links()}}
    </div>
    <div class="row py-3 d-md-block d-none">
        <div class="col-12">
            <div class="row bg-warning py-4" style="margin-left:1px;margin-right:1px;">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="row">
                        <div class="col-md-3">
                            <i class="fa fa-cart-arrow-down fa-3x text-white"></i>
                        </div>
                        <div class="col-md-9">
                            <p class="text-white mb-0">Free Shipping</p>
                            <small class="text-white">On all Orders Over 10,000/PKR</small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="row">
                        <div class="col-md-3">
                        <i class="fa fa-refresh fa-3x text-white"></i>
                        </div>
                        <div class="col-md-9">
                            <p class="text-white mb-0">Easy Return</p>
                            <small class="text-white">We have Easy Return Policy</small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="row">
                        <div class="col-md-3">
                            <i class="fa fa-credit-card-alt fa-3x text-white"></i>
                        </div>
                        <div class="col-md-9">
                            <p class="text-white mb-0">Cash On Delivery</p>
                            <small class="text-white">Pay at yout Door Step </small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="row">
                        <div class="col-md-3">
                            <i class="fa fa-comment-o fa-3x text-white"></i>
                        </div>
                        <div class="col-md-9">
                            <p class="text-white mb-0">Custom Support</p>
                            <small class="text-white">24/7 At Your Service</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="owl-carousel owl-theme category-carousel">
        @if(@$categories)
            @foreach($categories as $category)
                @foreach($category->childrens as $children)
                <div class="item">
                    <a href="{{route('products.shop',$children->slug)}}">
                    @php
                        $public_folder_path = "";
                        $is_sub_str = $_SERVER['SERVER_PORT'];
                        if($is_sub_str == 80)
                            $public_folder_path = "public/";
                    @endphp
                    
                    <img src="{{asset($public_folder_path.'storage/'.$children->thumbnail)}}" 
                    alt="{{asset($public_folder_path.'storage/'.$children->thumbnail)}}" 
                    class="slide-category-image">
                    </a>
                </div>
                @endforeach
            @endforeach
        @endif 
    </div>


    <div class="row">
        <div class="col-md-6 offset-3 colorlib-heading">
            <h2><span>Recently Added</span></h2>
        </div>
    </div>
    <div class="row">
        @if(session()->has('message'))
            <p class="alert alert-success w-100">
                {{session()->get('message')}}
            </p>
        @endif        
    </div>
    <div class="owl-carousel owl-theme product-carousel">
    @foreach($products as $product)
        <div class="card">
            <div class="item">
                <div class="product-entry">
                    <div class="product-img">
                        @if($product->discount > 0)
                            <p class="tag"><span class="new">{{$product->discount}} %</span></p>
                        @endif
                        @php
                        $public_folder_path = "";
                        $is_sub_str = $_SERVER['SERVER_PORT'];
                        if($is_sub_str == 80)
                            $public_folder_path = "public/";
                    @endphp
                        <img src="{{asset($public_folder_path.'storage/'.$product->thumbnail)}}" alt="{{$product->title}}" style="width:100%;height:300px;object-fit:cover;overflow:hidden">
                        <div class="cart">
                            <p>
                                <span class="addtocart"><a href="{{route('products.addToCart',$product)}}"><i class="icon-shopping-cart"></i></a></span> 
                                <span><a href="{{route('products.single',$product)}}"><i class="icon-eye"></i></a></span> 
                            </p>
                        </div>
                    </div>
                    <div class="desc">
                        <h3><a href="{{route('products.single',$product)}}">{{$product->title}}</a></h3>
                        <p class="price">
                            @if($product->discount > 0)
                                <span><strong>Rs: {{$product->price}}</strong></span>
                                <span class="sale">Rs: {{$product->discount_price}}</span>
                            @else
                                <span>Rs: {{$product->price}}</span> 
                            @endif 
                        </p>
                        <a href="{{route('products.addToCart',$product)}}"><i class="fa fa-shopping-cart"></i> Buy Now</a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    </div>

</div>
@endif       
@endsection
@section('scripts')
<script>
    //Category
    $('.category-carousel').owlCarousel({
        loop:true,
        margin:10,
        nav:false,
        dots:false,
        autoplay:true,
        autoplayTimeout:3000,
        lazyLoad: true,
        responsive:{
            0:{
                items:2
            },
            600:{
                items:4
            },
            1000:{
                items:8
            }
        }
    });
    //Product
    $('.product-carousel').owlCarousel({
        loop:true,
        margin:10,
        nav:false,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:2
            },
            1000:{
                items:4
            }
        }
    });
</script>
@endsection
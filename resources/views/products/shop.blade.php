@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3 text-center colorlib-heading">
            <h2><span> {{$category->title}} Products</span></h2>
            <p>{!! $category-> description !!}</p>
        </div>
    </div>
    @if(session()->has('message'))
        <p class="alert alert-success">
            {{session()->get('message')}}
        </p>
    @endif
    <div class="row mb-3">
 
        @if($products->count() > 0)
          @foreach($products as $product)

            <div class="col-md-3 mb-3">
            <div class="card">
              <div class="product-entry">
                  <div class="product-img">
                      @if($product->discount > 0)
                          <p class="tag"><span class="new">{{$product->discount}} %</span></p>
                      @endif
                      <img src="{{asset("public/storage/".$product->thumbnail)}}" alt="{{$product->title}}" style="width:100%;height:300px;object-fit:cover;overflow:hidden">
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
      @else
      <div class="text-center w-100">
        <div class="alert alert-danger">
          No Porducts found of {{$category->title}}
        </div>
      </div>
      @endif
        </div>
    </div>
@endsection
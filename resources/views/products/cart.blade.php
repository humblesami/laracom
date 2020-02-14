@extends('layouts.app')
@section('content')

<div class="colorlib-shop">
    <div class="container">
    @if(session()->has('message'))
        <p class="alert alert-success">
            {{session()->get('message')}}
        </p>
    @endif
    @if(isset($cart) && $cart->getContents())
        <div class="row row-pb-md">
            <div class="col-md-12">
                <div class="product-name">
                    <div class="one-forth text-center">
                        <span>Product Details</span>
                    </div>
                    <div class="one-eight text-center">
                        <span>Price</span>
                    </div>
                    <div class="one-eight text-center">
                        <span>Quantity</span>
                    </div>
                    <div class="one-eight text-center">
                        <span>Total</span>
                    </div>
                    <div class="one-eight text-center">
                        <span>Remove</span>
                    </div>
                </div>
            </div>
            <!-- Cart Details -->
            @foreach($cart->getContents() as $slug => $product)
            <div class="col-md-12">
            <div class="product-cart">
                <div class="one-forth">
                    <div class="product-img" style="background-image: url({{asset('public/storage/'.$product['product']->thumbnail)}});">
                    </div>
                    <div class="display-tc">
                        <h3>{{$product['product']->title}}</h3>
                    </div>
                </div>
                <div class="one-eight text-center">
                    <div class="display-tc">
                        <span class="price">Rs: {{$product['product']->price}}</span>
                    </div>
                </div>
                <div class="one-eight text-center">
                    <div class="display-tc">
                        <form action="{{route('cart.update',$slug)}}" method="POST">
                            @csrf
                            <input type="number" name="qty" id="qty" class="input-number text-center" 
                            min="1" max="99" value="{{$product['qty']}}">
                            <input type="submit" class="button-sm btn-success close" value="+">
                        </form>
                    </div>
                </div>
                <div class="one-eight text-center">
                    <div class="display-tc">
                        <span class="price">Rs: {{$product['price']}}</span>
                    </div>
                </div>
                <div class="one-eight text-center">
                    <div class="display-tc">
                        <form action="{{route('cart.remove',$slug)}}" method="POST">
                            @csrf
                            <input type="submit" class="btn btn-sm btn-danger" value="Remove">
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
            <div class="col-md-12">
                <div class="total-wrap">                        
                    <div class="total">
                        <div class="sub">
                            <p><span>Quantity:</span> <span>{{$cart->getTotalQty()}}</span></p>
                        </div>
                        <div class="grand-total">
                            <p><span><strong>Grand Total:</strong></span> <span>Rs: {{$cart->getTotalPrice()}}</span></p>
                        </div>
                    </div>
                    <div class="pull-right" style="margin-top:10px;">
                        <a href="{{route('products.all')}}" class="btn btn-warning">Continue Shopping</a>
                        <a href="{{url('checkout')}}" class="btn btn-success">Checkout</a>
                    </div>
                </div>
            </div>
        @else
            <div class="alert alert-danger">Cart is Empty <a href="{{route('products.all')}}" class="btn btn-warning ml-2">Buy Some Products</a></div>
        @endif
    </div>
</div>
@endsection
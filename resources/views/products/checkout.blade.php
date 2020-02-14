@extends('layouts.app')
@section('content')
<div class="colorlib-shop">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <form method="POST" class="colorlib-form" action="{{route('checkout.store')}}">
                    @csrf    
                    <h2>Billing Details</h2>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="firstName">First name</label>
                                <input type="text" class="form-control" name="billing_firstName" id="firstName" placeholder="" 
                                value=""
                                >
                                {{--{{old('billing_firstName') ? old('billing_firstName'):Auth::user()->profile->firstName}} --}}
                                @if($errors->has('billing_firstName'))
                                    <div class="alert alert-danger">
                                        {{ $errors->first('billing_firstName')}}
                                    </div>
                                @endif
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="lastName">Last name</label>
                                <input type="text" class="form-control" name="billing_lastName" id="lastName" placeholder="" 
                                value="" 
                                >
                                {{-- old('billing_lastName') ? old('billing_lastName'):Auth::user()->profile->lastName}} --}}
                                @if($errors->has('billing_lastName'))
                                    <div class="alert alert-danger">
                                        {{ $errors->first('billing_lastName')}}
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="phone">Phone Number</label>
                            <input type="text" name="phone" class="form-control" id="phone" placeholder="Phone Number" value="{{old('phone')}}">
                        </div>

                        <div class="mb-3">
                            <label for="email">Email</label>
                            <input type="email" name="email" class="form-control" id="email" placeholder="you@example.com" >
                            @if($errors->has('email'))
                                    <div class="alert alert-danger">
                                        {{ $errors->first('email')}}
                                    </div>
                                @endif
                        </div>

                        <div class="mb-3">
                            <label for="address">Address</label>
                            <input type="text" name="billing_address1" class="form-control" id="address" placeholder="1234 Main St"  value="{{old('billing_address1')}}">
                            @if($errors->has('billing_address1'))
                                    <div class="alert alert-danger">
                                        {{ $errors->first('billing_address1')}}
                                    </div>
                                @endif
                        </div>

                        <div class="mb-3">
                            <label for="address2">Address 2</label>
                            <input type="text" name="billing_address2" value="{{old('billing_address2')}}" class="form-control" id="address2" placeholder="Apartment or suite">
                            @if($errors->has('billing_address2'))
                                    <div class="alert alert-danger">
                                        {{ $errors->first('billing_address2')}}
                                    </div>
                                @endif
                        </div>

                        <div class="row">
                            <div class="col-md-3 mb-3">
                                <div class="form-group">
                                    <label for="country">Country</label>
                                    <div class="form-field">
                                        <i class="icon icon-arrow-down3"></i>
                                        <select name="billing_country" class="form-control" id="countries">
                                            <option value="">Choose...</option>
                                            @if($countries)
                                                @foreach($countries as $country)
                                                <option value="{{$country->name}}">{{$country->name}}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                        @if($errors->has('billing_country'))
                                            <div class="alert alert-danger">
                                                {{ $errors->first('billing_country')}}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 mb-3">
                                <div class="form-group">
                                    <label for="state">State</label>
                                    <div class="form-field">
                                        <i class="icon icon-arrow-down3"></i>
                                        <select name="billing_state" class="form-control" id="states">
                                            <option value="">Choose...</option>
                                            @if($states)
                                                @foreach($states as $state)
                                                <option value="{{$state->name}}">{{$state->name}}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                        @if($errors->has('billing_state'))
                                            <div class="alert alert-danger">
                                                {{ $errors->first('billing_state')}}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 mb-3">
                                <div class="form-group">
                                    <label for="city">City</label>
                                    <div class="form-field">
                                        <i class="icon icon-arrow-down3"></i>
                                        <select name="billing_city" class="form-control" id="cities">
                                            <option value="">Choose...</option>
                                            @if($cities)
                                                @foreach($cities as $city)
                                                <option value="{{$city->name}}">{{$city->name}}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                        @if($errors->has('billing_city'))
                                            <div class="alert alert-danger">
                                                {{ $errors->first('billing_city')}}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="zip">Zip</label>
                                <input type="text" name="billing_zip" class="form-control" id="zip" placeholder="" >
                                @if($errors->has('billing_zip'))
                                    <div class="alert alert-danger">
                                        {{ $errors->first('billing_zip')}}
                                    </div>
                                @endif
                            </div>
                        </div>
                        <hr class="mb-4">
                        <button class="btn btn-primary btn-lg btn-block" type="submit">Place Order</button>
                </form>
            </div>
            <div class="col-md-5">
                <div class="cart-detail">
                    <h2>Cart Total</h2>
                    <ul>
                        <li>
                            <span>Total Quantity</span> <span>{{$cart->getTotalQty()}}</span>
                            <ul>
                            @foreach($cart->getContents() as $slug => $product)
                                <li><span>{{$product['qty']}} x {{$product['product']->title}}</span> <span>Rs: {{$product['price']}}</span></li>
                            @endforeach
                            </ul>
                        </li>
                        <li><span>Order Total</span> <span>Rs: {{$cart->getTotalPrice()}}</span></li>
                    </ul>
                </div>
            </div>
        </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script>
        $(function() {
            $('#same-address').on('change', function() {
                $('#shipping_address').slideToggle(!this.checked);
            });   
    });

    $(function() {
        $('#countries').change(function() {

            var url = "{{ route('checkout.index') }}" + $(this).val() + '/states/';

            $.get(url, function(data) {
                var select = $('#states');

                select.empty();

                $.each(data,function(key, value) {
                    select.append('<option value=' + value.id + '>' + value.name + '</option>');
                });
            });
        });
    });
    </script>
@endsection
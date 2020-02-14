<?php

namespace App\Http\Controllers;


use App\Cart;
use App\City;
use App\Order;
use App\State;
use App\Country;
use App\Product;
use App\Customer;
use Illuminate\Http\Request;
use App\Http\Requests\StoreOrder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
/**
 * Display a listing of the resource.
 *
 * @return \Illuminate\Http\Response
 */
public function index()
{
    if(!Session::has('cart') || empty(Session::get('cart')->getContents())){
        return redirect('products')->with('message',"No products added in the cart");
    }
    $cart=Session::get('cart');
    //dd($cart);
    $countries = Country::all();
    $states = State::all();
    $cities = City::all();
    return view('products.checkout',compact('cart','cities','countries','states'));
}

public function details(){
    $orders = DB::table('customers')
    ->orderBy('id', 'desc')
    ->get();;
    return view('admin.order.index',compact('orders'));
}
public function orderDetails($id){
    $orderDetails = DB::table('orders')
                ->join('products','products.id', '=' , 'orders.product_id')
                ->join('customers','customers.id', '=' , 'orders.user_id')
                ->select('products.title','products.thumbnail','orders.qty','orders.price','orders.status','orders.payment_id')
                ->where('orders.user_id','=',$id)
                ->get();
    return view('admin.order.details',compact('orderDetails'));
}
public function updateStatus(){
    $affected = DB::table('orders')->where('status', '=', 'Pending')->update(array('status' => 'Complete'));
    if($affected){
        return back()->with("message","Order Completed");
    }
    else{
        return redirect()->route('admin.order.home');
    }
}
public function cancelStatus(){
    $affected = DB::table('orders')->where('status', '=', 'Pending')->update(array('status' => 'Cancel'));
    if($affected){
        return back()->with("message","Order Canceled");
    }
    else{
        return redirect()->route('admin.order.home');
    }
}
/**
 * Show the form for creating a new resource.
 *
 * @return \Illuminate\Http\Response
 */
public function create()
{
    //
}

/**
 * Store a newly created resource in storage.
 *
 * @param  \Illuminate\Http\Request  $request
 * @return \Illuminate\Http\Response
 */
public function store(StoreOrder $request)
{
    $order='';
    $checkout='';
    $customer = '';
    $cart=Session::get('cart');
    // array_get($request,"shipping_address",false)    
    if (array_get($request,"shipping_address",true)) {
            $customer = [
                "billing_firstName"=>$request->billing_firstName,
                "billing_lastName"=>$request->billing_lastName,
                "phone"=>$request->phone,
                "email"=>$request->email,
                "billing_address1"=>$request->billing_address1,
                "billing_address2"=>$request->billing_address2,
                "billing_country"=>$request->billing_country,
                "billing_state"=>$request->billing_state,
                "billing_city"=>$request->billing_city,
                "billing_zip"=>$request->billing_zip,
                "shipping_firstName"=>$request->shipping_firstName,
                "shipping_lastName"=>$request->shipping_lastName,
                "shipping_address1"=>$request->shipping_address1,
                "shipping_address2"=>$request->shipping_address2,
                "shipping_country"=>$request->shipping_country,
                "shipping_state"=>$request->shipping_state,
                "shipping_zip"=>$request->shipping_zip,
            ];
        } else {
            $customer = [
                "billing_firstName"=>$request->billing_firstName,
                "billing_lastName"=>$request->billing_lastName,
                "phone"=>$request->phone,
                "email"=>$request->email,
                "billing_address1"=>$request->billing_address1,
                "billing_address2"=>$request->billing_address2,
                "billing_country"=>$request->billing_country,
                "billing_state"=>$request->billing_state,
                "billing_city"=>$request->billing_city,
                "billing_zip"=>$request->billing_zip,
            ];
        }
    DB::beginTransaction();
    $checkout = Customer::create($customer);
    foreach($cart->getContents() as $slug => $product){
        $products = [
            'user_id'=>$checkout->id,
            'product_id'=>$product['product']->id,
            'qty'=>$product['qty'],
            'status'=>'Pending',
            'price'=>$product['price'],
            'payment_id'=>0
        ];
        $order = Order::create($products);
    }
    if ($checkout && $order) {
        DB::commit();
        $request->session()->forget('cart');
        // $request->session()->flush();
        return redirect('/')->with('message',"Your order successfully processed");
    }
    else{
        DB::rollback();
        return redirect('checkout')->with('message',"Invalid Activity. Cart Should not be empty");        
    }     

}

/**
 * Display the specified resource.
 *
 * @param  \App\Order  $order
 * @return \Illuminate\Http\Response
 */
public function show(Order $order)
{
    //
}

/**
 * Show the form for editing the specified resource.
 *
 * @param  \App\Order  $order
 * @return \Illuminate\Http\Response
 */
public function edit(Order $order)
{
    //
}

/**
 * Update the specified resource in storage.
 *
 * @param  \Illuminate\Http\Request  $request
 * @param  \App\Order  $order
 * @return \Illuminate\Http\Response
 */
public function update(Request $request, Order $order)
{
    //
}

/**
 * Remove the specified resource from storage.
 *
 * @param  \App\Order  $order
 * @return \Illuminate\Http\Response
 */
public function destroy(Order $order)
{
    //
}
}

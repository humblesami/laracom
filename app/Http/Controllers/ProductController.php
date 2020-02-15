<?php

namespace App\Http\Controllers;
use App\Product;
use App\Category;
use App\Cart;
use Session;
use App\Http\Requests\StoreProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cart = Session::get('cart');
        $products = Product::paginate(3);
        return view('admin.products.index',compact('products','cart'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.products.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProduct $request)
    {
        $extension = ".".$request->thumbnail->getClientOriginalExtension();
        $name = basename($request->thumbnail->getClientOriginalName(), $extension).time();
        $name = $name.$extension;
        $path = $request->thumbnail->storeAs('images',$name,'public');
        $discount  = $request->discount;

        if(!$discount || $discount < 0 || $discount > 100){
            $discount = 0;
        }
        $product = Product::create([
            'title'=>$request->title,
            'slug'=>$request->slug,
            'description'=>$request->description,
            'thumbnail'=>$path,
            'status'=>$request->status,
            'options'=> isset($request->extras) ? json_encode($request->extras) : null,
            'featured'=>($request->featured) ? $request->featured : 0,
            'price'=>$request->price - $request->price * $request->discount/100,
            'discount'=> $discount, 
            'discount_price' => $request->price
        ]);
        if($product){
            $product->categories()->attach($request->category_id);
            return back()->with('message','Product added successfully');
        }
        else{
            return back()->with('message','Error in adding Product');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        $cart = (Session::get('cart'));
        $products = Product::with('categories')->get();
        $limitCategory = Category::whereHas('childrens')->with('childrens')->simplePaginate(9);
        return view('products.all',compact('products','cart','limitCategory'));
    }
    public function shop(Category $category)
    {

        $products =  $category->products;
        $cart = (Session::get('cart'));
        return view('products.shop',compact('products','cart','category'));
        
    }
    //Single Product
    public function single(Product $product){
        $cart = (Session::get('cart'));
        return view('products.single',compact('product','cart'));
    }
    //Add To Cart
    public function addToCart(Product $product, Request $request){
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $qty = $request->qty ? $request->qty : 1;
        $cart = new Cart($oldCart);
        $cart->addProduct($product,$qty);
        Session::put('cart',$cart);
        return back()->with('message',"Product $product->title has been successfully added to Cart");
    }
    //Cart Page
    public function Cart(){
        if(!Session::has('cart')){
            return view('products.cart');
        }
        $cart=Session::get('cart');
        //dd($cart);
        return view('products.cart',compact('cart'));
    }
    //Remove product from cart
    public function removeProduct(Product $product){
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->removeProduct($product);
        Session::put('cart', $cart);
        return back()->with('message',"Product $product->title has been successfully removed from Cart");
    }
    //Update Cart
    public function updateProduct(Product $product,Request $request){
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->updateProduct($product,$request->qty);
        Session::put('cart', $cart);
        return back()->with('message',"Product $product->title has been successfully updated in Cart");
    }    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('admin.products.create',compact('categories','product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        if($request->has('thumbnail')){
            $extension = ".".$request->thumbnail->getClientOriginalExtension();
            $name = basename($request->thumbnail->getClientOriginalName(), $extension).time();
            $name = $name.$extension;
            $path = $request->thumbnail->storeAs('images',$name,'public');
            $product->thumbnail = $path;
        }
        $product->title = $request->title;
        // $product->slug = $request->slug;
        $product->description = $request->description;
        $product->status = $request->status;
        $product->featured = ($request->featured) ? $request->featured : 0;
        $product->price = $request->price;
        $product->discount = $request->discount ? $request->discount : 0; 
        $product->discount_price = ($request->discount_price) ? $request->discount_price : 0;
        $product->categories()->detach();
        $save = $product->save();
        if($save){
            $product->categories()->attach($request->category_id);
            return back()->with('message','Product updated successfully');
        }else{
            return back()->with('message',"Error in Updating");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $public_folder_path = "";
        $is_sub_str = $_SERVER['SERVER_PORT'];
        if($is_sub_str == 80)
            $public_folder_path = "public/";
        if($product->categories()->detach() && $product->forceDelete()){
            $file_path = $public_folder_path.'storage/'.$product->thumbnail;
            unlink($file_path);
            return back()->with('message',"Product Deleted Successfully");
        }else{
            return back()->with('message',"Error in Deleting");
        }
    }
    public function trash(){
        $products = Product::onlyTrashed()->paginate(5);
        return view('admin.products.index',compact('products'));
    }
    public function recoverPro($id){
        $product = Product::onlyTrashed()->findOrFail($id);
        if($product->restore())
            return back()->with('message',"Product Restored Successfully");
        else
            return back()->with('message',"Error in Restoring");
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function remove(Product $product)
    {
        if($product->delete()){
            return back()->with('message',"Product Successfully Trashed");
        }else{
            return back()->with('message',"Error in Deleting");
        }
    }
}

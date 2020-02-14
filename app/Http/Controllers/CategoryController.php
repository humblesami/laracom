<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $categories = Category::simplePagunate(3);
        $categories = Category::paginate(3);
        return view('admin.categories.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories = Category::all();
        return view('admin.categories.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $request->validate([
            'title'=>'required|min:5',
            'slug'=>'required|min:5|unique:categories',
            'description'=>'required',
            'thumbnail'=>'required|mimes:jpg,jpeg,png,svg,bmp|max:2048',
        ]);
        $extension = ".".$request->thumbnail->getClientOriginalExtension();
        $name = basename($request->thumbnail->getClientOriginalName(), $extension).time();
        $name = $name.$extension;
        $path = $request->thumbnail->storeAs('images',$name,'public');
        $categories = Category::create([
            'title'=>$request->title,
            'description'=>$request->description,
            'slug'=>$request->slug,
            'thumbnail'=>$path
        ]);
        if ($request->parent_id != 0) {
            Category::find($request->parent_id)->childrens()->attach($categories->id);
        }
        return back()->with('message',"Category Added Successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        $categories = Category::where('id','!=',$category->id)->get();
        return view('admin.categories.create',['categories'=>$categories,'category'=>$category]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'title'=>'required|min:5',
            // 'slug'=>'required|min:5|unique:categories',
            'description'=>'required'
        ]);
        if($request->has('thumbnail')){
            $extension = ".".$request->thumbnail->getClientOriginalExtension();
            $name = basename($request->thumbnail->getClientOriginalName(), $extension).time();
            $name = $name.$extension;
            $path = $request->thumbnail->storeAs('images',$name,'public');
            $category->thumbnail = $path;
        }
        $category->title = $request->title;
        $category->description = $request->description;
        // $category->slug = $request->slug;
        //Remove Parent Categories
        $category->childrens()->detach();
        //Atttach Selected Parent Categories
        $category->childrens()->attach($request->parent_id);
        //Save Current Record
        $saved = $category->save();
        return back()->with('message',"Category Updated Successfully");
    }
    /**
     * Recover Category
    */
    public function recoverCat($id){
        $category = Category::onlyTrashed()->findOrFail($id);
        if($category->restore())
            return back()->with('message',"Category Restored Successfully");
        else
            return back()->with('message',"Error in Restoring");
    }
   /**
     * Trashed
    */
    public function trash(){
        $categories = Category::onlyTrashed()->paginate(5);
        return view('admin.categories.index',compact('categories'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {   
        try{
            $category->childrens()->detach();
            $category->forceDelete();
                $file_path ='public/storage/'.$category->thumbnail;
                unlink($file_path);
                return back()->with('message',"Category Deleted Successfully");
                
        }catch(\Exception $exception){
            dd($exception->getMessage(), $exception->getLine(), $exception->getFile() );
        }
        // if($category->childrens()->detach() && $category->forceDelete()){
        //     $file_path ='public/storage/'.$category->thumbnail;
        //     unlink($file_path);
        //     return back()->with('message',"Category Deleted Successfully");
        // }else{
        //     return back()->with('message',"Error in Deleting");
        // }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function remove(Category $category)
    {
        if($category->delete()){
            return back()->with('message',"Category Successfully Trashed");
        }else{
            return back()->with('message',"Error in Deleting");
        }
    }

}

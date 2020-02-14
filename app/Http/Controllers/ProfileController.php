<?php

namespace App\Http\Controllers;

use App\Profile;
use App\User;
use App\Role;
use App\Country;
use App\State;
use App\City;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUserProfile;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::with('role','profile')->paginate(5);
        // dd($users);
        return view('admin.users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        $countries = Country::all();
        $states = State::all();
        $cities = City::all();
        return view('admin.users.create',compact('roles','countries','states','cities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserProfile $request)
    {
        $path = 'public/images/no-thumbnail.png';
        if($request->has('thumbnail')){
            $extension = ".".$request->thumbnail->getClientOriginalExtension();
            $name = basename($request->thumbnail->getClientOriginalName(), $extension).time();
            $name = $name.$extension;
            $path = $request->thumbnail->storeAs('images/profile',$name,'public');
            $request->thumbnail = $path;
        }

        $user = User::create([
            'email'=>$request->email,
            'password'=>bcrypt($request->password),
            'status'=>$request->status,
            'role_id'=>$request->role_id
        ]);
        if($user){
            $profile = Profile::create([
                'user_id'=>$user->id,
                'firstName'=>$request->firstName,
                'lastName'=>$request->lastName,
                'country_id'=>$request->country_id,
                'state_id'=>$request->state_id,
                'city_id'=>$request->city_id,
                'thumbnail'=>$path,
                'phone'=>$request->phone,
                'slug'=>$request->slug
            ]);
        }
        if($user && $profile){
            return back()->with('message','User added successfully');
        }
        else{
            return back()->with('message','Error in inserting');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function show(Profile $profile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function edit(Profile $profile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Profile $profile)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function destroy(Profile $profile)
    {
        $user_id = User::where('id', $profile->id)->pluck('id');
        User::whereIn('id', $user_id)->forceDelete();
        if($profile->forceDelete($profile->id)){
            $file_path ='public/storage/'.$profile->thumbnail;
            unlink($file_path);
            return back()->with('message',"Profile Deleted Successfully");
        }else{
            return back()->with('message',"Error in Deleting");
        }
    }

    //Get States
    public function getStates(Request $request,$id){
        if($request->ajax())
            return State::where('country_id',$id)->get();
        else
            return 0;
    }
    //Get Cities
    public function getCities(Request $request,$id){
        if($request->ajax())
            return City::where('state_id',$id)->get();
        else
            return 0;
    }
    
}

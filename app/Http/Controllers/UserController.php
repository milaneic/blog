<?php

namespace App\Http\Controllers;

use App\User;
use App\Post;
use App\Role;
use App\Comment;
use Illuminate\Support\Facades\Hash;

use Carbon\Carbon;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        //
        return view('admin.users.index',['users'=>User::all()]);
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
    public function store(Request $request)
    {
        //
    }
    
    /**
    * Display the specified resource.
    *
    * @param  \App\User  $user
    * @return \Illuminate\Http\Response
    */
    public function show(User $user)
    {
        //
        return view('admin.users.show',['user'=>$user]);
    }
    
    /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\User  $user
    * @return \Illuminate\Http\Response
    */
    public function edit(User $user)
    {
        //
        return view('admin.users.edit',['user'=>$user,'role'=>Role::all()]);
    }
    
    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\User  $user
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request, User $user)
    {
        //
        //  dd($request->all());
        $input=$request->validate([
            'name'=>['string','required'],
            'email'=>['email','required','unique:users,email,'.$user->id],
            'password'=>['sometimes','min:8','confirmed'],
            'role_id'=>['required'],
            'avatar'=>['sometimes','mimes:jpeg,png,jpg,gif,svg']
            ]);
            
            $img=$request->file('avatar');
            if($img!=null){
                $img=$request->file('img');
                $img->store('images/avatar','public');
                $input['img']='storage/images/avatar/'.$img->hashName();
                $user->avatar=$input['img'];
            }

            if($input['password']!=null){
                $user->password=Hash::make($input['password']);
            }
            
            $user->name=$input['name'];
            $user->email=$input['email'];
            if($user->isDirty()){
                session()->flash('message','User has been successfuly updated!');
                session()->flash('alert-class','alert-success');
                $user->save();
            }else{
                session()->flash('message','You have not changed a user!');
            }
            return redirect()->route('users.edit',$user);
        }
        
        /**
        * Remove the specified resource from storage.
        *
        * @param  \App\User  $user
        * @return \Illuminate\Http\Response
        */
        public function destroy(User $user)
        {
            //
            $user->delete();
            session()->flash('message','User has been deleted!');
            return redirect()->route('users.index');
        }
    }
    
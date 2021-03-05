<?php

namespace App\Http\Controllers;

use App\User;
use App\Post;
use App\Role;
use App\Comment;
use App\Log;
use Illuminate\Support\Facades\DB;
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
        return view('admin.users.show',['user'=>$user,'logs'=>Log::where('user_id',$user->id)->orderBy('id')->get()]);
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
       //dd($request->all());
        $input=$request->validate([
            'name'=>['string','required'],
            'email'=>['email','required','unique:users,email,'.$user->id],
            'password'=>['sometimes','nullable','min:8','confirmed'],
            'role_id'=>['required'],
            'avatar'=>['sometimes','mimes:jpeg,png,jpg,gif,svg']
            ]);


            if($request->file('avatar')!=null){
                $img=$request->file('avatar');
                $img->store('images/avatar','public');
                $input['avatar']='storage/images/avatar/'.$img->hashName();
                $user->avatar=$input['avatar'];
            }

            if($input['password']!=null){
                $user->password=Hash::make($input['password']);
            }

            $user->name=$input['name'];
            $user->email=$input['email'];
            //TODO role attach
            //dd($user->isDirty());
            if($user->isDirty()){
                $user->save();
                Log::create(['user_id'=>auth()->user()->id,'logs_type_id'=>DB::table('logs_types')->where('slug','updated_user')->first()->id]);
                session()->flash('message','User has been successfuly updated!');
                session()->flash('alert-class','alert-success');
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
            Log::create(['user_id'=>auth()->user()->id,'logs_type_id'=>DB::table('logs_types')->select('id')->where('slug','deleted_user')->first()]);
            session()->flash('message','User has been deleted!');
            session()->flash('alert-class','alert-success');
            return redirect()->route('users.index');
        }

        public function home(){
            return view('admin.home');
        }
    }


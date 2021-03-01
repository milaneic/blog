<?php

namespace App\Http\Controllers;

use App\Post;
use App\Category;
use Illuminate\Http\Request;

class PostController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $this->data['categories']=Category::all();
        $this->data['posts']=Post::paginate(10);
        return view('index',$this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        // dd('dsaasd');
        return view('posts.create');
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
        $inputs=$request->validate([
            'caption'=>['string','max:255','required'],
            'description'=>['text','required'],
            'img'=>['mimes:jpeg,jpg,png,gif','required']
        ]);
        Post::create([
            'caption'=>$inputs['caption'],
            'description'=>$inputs['caption'],
            'description'=>['text','required'],
            'img'=>['mimes:jpeg,jpg,png,gif']
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
        return view('posts.show',['post'=>$post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
        return view('posts.edit',['post'=>$post]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //

        $request->validate([
            'caption'=>['required','max:255'],
            'description'=>['required'],
            'img'=>['sometimes','mimes:png,jpg']
        ]);

        if(isset($request['img'])){
            $img=$request->file('img');
            dd($img);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
        $post->delete();
        session()->flash('message','Post is successfuly deleted!');
        return redirect()->back();
    }
}

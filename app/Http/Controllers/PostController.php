<?php

namespace App\Http\Controllers;

use App\Post;
use App\Category;
use Illuminate\Http\Request;
use App\Log;
use Illuminate\Support\Facades\DB;

class PostController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     *
     */

    const POSTS_LIMIT = 6;

    public function index()
    {
        //
        $this->data['categories']=Category::all();
        $this->data['posts']=Post::paginate(10);
        return view('index',$this->data);
    }

    public function index2()
    {
        $this->data['categories']=Category::all();
        $this->data['posts']=Post::paginate(self::POSTS_LIMIT);
        return view('index2',$this->data);
    }
    /**
     *
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('posts.create',['categories'=>Category::all()]);
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
        //dd($request->all());
        $inputs=$request->validate([
            'caption'=>['string','max:255','required'],
            'description'=>['string','required'],
            'text'=>['string','required'],
            'categories'=>['required','min:1'],
            'img'=>['mimes:jpeg,jpg,png,gif','required']
        ]);
        $img=$request->file('img');
        $img->store('images/post','public');

        // dd(auth()->user());
        $post=Post::create([
            'caption'=>$inputs['caption'],
            'description'=>$inputs['description'],
            'text'=>$inputs['text'],
            'img'=>'images/post/'.$img->hashName(),
            'user_id'=>auth()->user()->id,
        ]);

        $categories=Category::findMany($inputs['categories']);

        foreach ($categories as $category) {
            $post->categories()->attach($category);
        }

        Log::create(['user_id'=>auth()->user()->id,'logs_type_id'=>DB::table('logs_types')->where('slug','created_post')->first()->id]);
        session()->flash('message','You have successfuly created a post!');
        session()->flash('alert-class','alert-success');
        return redirect()->route('posts.index');


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
        $belongs=array();
        $a=DB::table('category_post')->select('category_id')->where('post_id',$post->id)->get()->toArray();
        for ($i=0; $i <count($a) ; $i++) { 
            array_push($belongs,$a[$i]->category_id);
        }
        return view('posts.edit',['post'=>$post,'categories'=>Category::all(),'belongs'=>$belongs]);
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

        $input=$request->validate([
            'caption'=>['required','max:255'],
            'description'=>['required'],
            'img'=>['sometimes','mimes:png,jpg']
        ]);

        if(isset($request['img'])){
            $img=$request['img'];
            $img->store('images/post','public');
            $post->img='images/post'.$img->hashName();
        }

        $post->caption=$input['caption'];
        $post->description=$input['description'];
        if($post->isDirty()){
            $post->save();
            Log::create(['user_id'=>auth()->user()->id,'logs_type_id'=>DB::table('logs_types')->where('slug','updated_post')->first()->id]);
            session()->flash('message','You have successfuly updated a post!');
            session()->flash('alert-class','alert-success');

        }else{
            session()->flash('message','You didnot change anything!');
        }
        return redirect()->route('posts.index');

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
         Log::create(['user_id'=>auth()->user()->id,'logs_type_id'=>DB::table('logs_types')->where('slug','deleted_post')->first()->id]);
        session()->flash('message','Post is successfuly deleted!');
        return redirect()->back();
    }

    public function  filtera(Request $request){

         $p = new Post();
         $cat = $request->categories;
         $key = $request->key;
         $ddl = $request->ddl;
         $posts=$p->getPosts($cat, $ddl, $key)->paginate(self::POSTS_LIMIT);
         return response()->json($posts);
    }

    public function filter(Request $request)
    {
        $id=$request->id;
        $cat=Category::findOrFail($id);
        $posts=$cat->posts()->get();
        //$posts=POST::where('id',$id)->get();
        return response()->json($posts);
    }

    public function filters(Request $request)
    {
        $key=$request->key;
        $posts=POST::where('caption','like','%'.$key.'%')->get();
        return response()->json($posts);
    }

    public function filterd(Request $request)
    {
        $a=$request->a;
        $posts=POST::orderBy('caption',$a)->get();
        return response()->json($posts);
    }
}

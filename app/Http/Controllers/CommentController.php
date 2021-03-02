<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(Request $request,Post $post)
    {
        //
        $input=$request->validate([
            'text'=>['required','max:1000'],
        ]);
        Comment::create(['user_id'=>auth()->user()->id,'post_id'=>$post->id,'text'=>$input['text']]);
        Log::create(['user_id'=>auth()->user()->id,'logs_type_id'=>DB::table('logs_types')->where('slug','comment')->first()->id]);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        //
        $comment->delete();
        Log::create(['user_id'=>auth()->user()->id,'logs_type_id'=>DB::table('logs_types')->where('slug','deleted_comment')->first()->id]);
        session()->flash('message','Comment is successfuly deleted!');
        session()->flash('alert-class','alert-success');
        return redirect()->back();
    }
}

@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{$post->caption}}</h1>
    <h3>Categories:
    @foreach ($post->categories as $item)
       {{$item->name}},
    @endforeach    
    </h3>
    <img src="{{$post->img}}" alt="">
    <p>{{$post->description}}</p>
    <div class="comments">
        <h4>Comments</h4>
        @foreach ($post->comments as $item)
            <p class="user-nam"> <strong>{{$item->user->name}}</strong> </p>
            <span>{{$item->text}}</span>
            <br><br>
        @endforeach
    </div>
</div>

@endsection

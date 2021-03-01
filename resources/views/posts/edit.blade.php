@extends('layouts.app')
@section('content')
<div class="container">
    <h1>{{$post->caption}}</h1>
    <img src="{{$post->img}}" alt="">
    <p>{{$post->description}}</p>
</div>
@endsection

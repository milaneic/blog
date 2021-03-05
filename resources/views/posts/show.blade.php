@extends('layouts.app')

@section('content')
<div class="container mt-5 mb-3">

    <h1>{{$post->caption}}</h1>
    <h3>Categories:
    @foreach ($post->categories as $item)
       {{$item->name}},
    @endforeach
    </h3>
<img src="{{asset('storage/'.$post->img)}}" alt="" height="500px" width="500px">
    <p>{{$post->description}}</p>
    <div class="comments">
        <h4>Comments</h4>
        @foreach ($post->comments as $item)
            <p class="user-nam"> <strong>{{$item->user->name}}</strong> </p>
            <span>{{$item->text}}</span>
            <br><br>
        @endforeach
        <h4>Writte a comment</h4>
    </div>
    <section class="example">
        <div class="table-responsive">
            <x-errors></x-errors>
            <form method="POST" action="{{ route('roles.store') }}">
                @csrf
                @method('POST')
                <div class="input-group">
                    <textarea name="description" class="single-textarea" id="" cols="30" rows="10">Writte your comment...</textarea>
                </div>
                <input type="submit" value="Comment" class="btn btn-primary">
            </form>
        </div>
    </section>
</div>

@endsection

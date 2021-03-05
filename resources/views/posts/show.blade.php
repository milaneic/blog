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

    </div>
    <section class="example">
        @if (Auth::user()!==null)
        <h4>Writte a comment</h4>
        <div class="table-responsive">
            <x-errors></x-errors>
            <form class="form">
                <div class="input-group">
                    <textarea name="description" class="single-textarea" id="" cols="30" rows="10">Writte your comment...</textarea>
                </div>
                <input type="submit" value="Comment" id="btnComm" class="btn btn-primary">
            </form>
        </div>
        @else
            <h3><a class="ccl" href="{{ route('login') }}">Please login for comment</a></h3>
        @endif
    </section>
</div>

@endsection

@extends('layouts.app')

@section('content')
<div class="container">
<div class="row justify-content-center">
<div class="col-md-8">
<div class="card">
<div class="card-header">{{ __('Dashboard') }}</div>

<div class="card-body">
@if (session('status'))
<div class="alert alert-success" role="alert">
{{ session('status') }}
</div>
@endif

{{ __('You are logged in!') }}

{{-- @foreach($post in $posts)
<div class="post-body">
<h3 class="post-caption">{{$post->caption}}</h3>
@endforeach --}}



@foreach($posts as $post)
<div class="post-body">
<h3 class="post-caption">{{$post->caption}}</h3>
<img src="{{$post->img}}" alt="">
<p>{{$post->description}}</p>

@endforeach

<div class="page-links text-center">{{ $posts->links()}}</div>
</div>
</div>
</div>
</div>
</div>
</div>
@endsection

@extends('layouts.app')
@section('content')
<div class="container mt-5 mb-3">
    <h1>Update a post</h1>
    <form action="{{ route('posts.update',$post) }}" method="post">
        @csrf
        @method('PATCH')
    <input type="file" name="img" id="" multiple="FALSE"><br>
    <label for="img">Caption</label><br>
    <input type="text" class="single-input mt-2" value="{{ $post->caption }}" name="caption" ><br>
    <label for="category_id">Category</label><br>
    @foreach ($categories as $category)
    <p>{{ $category->name }}</p>
    <input type="checkbox" name="categories[]"
        @if (in_array($category->id,$belongs))
            checked
        @endif
    value="{{ $category->id }}" id="">
    @endforeach

    <label for="description">Description</label><br>
    <textarea name="description" class="single-textarea" value="{{ $post->description }}" id="" cols="30" rows="10">{{ $category->description  }}</textarea><br>
    <label for="text">Text</label><br>
    <textarea name="text" class="single-textarea" value="{{ $post->text }}"  id="" cols="30" rows="20">{{ $category->text  }}</textarea>
    <input type="submit" value="Create a post" class="genric-btn primary">
</form>
</div>
@endsection

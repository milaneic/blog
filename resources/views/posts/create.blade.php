@extends('layouts.layout')
@section('content')
<div class="container mt-5 mb-3">
<form method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data">
    @csrf
    @method('POST')
    <h2>Create a post</h2>
    <x-errors></x-errors>
    <input type="file" name="img" id="" multiple="FALSE"><br>
    <label for="img">Caption</label><br>
    <input type="text" class="single-input mt-2" name="caption" ><br>
    <label for="category_id">Category</label><br>
  
        @foreach ($categories as $category)
        <p>{{ $category->name }}</p>
        <input type="checkbox" name="categories[]" value="{{ $category->id }}" id="">
        @endforeach

    <label for="description">Description</label><br>
    <textarea name="description" class="single-textarea" id="" cols="30" rows="10"></textarea><br>
    <label for="text">Text</label><br>
    <textarea name="text" class="single-textarea" id="" cols="30" rows="20"></textarea>
    <input type="submit" value="Create a post" class="genric-btn primary">
    </form>
</div>
@endsection
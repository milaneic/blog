@extends('layouts.layout')
@section('content')
{{-- {{ $category->id }}
{{ $category->name }}
{{ $category->description }}
{{ $category->created_at}}
{{ $category->updated_at }}
<a href="{{ route('categories.show',$category) }}">Show category</a>
<a href="{{ route('categories.edit',$category) }}">Update category</a> --}}
{{-- <form action="{{ route('categories.update',$category) }}" method="post">
    <input type="submit" value="Delete a category"></form>
    <br>
    <h3>All posts from this class</h3> --}}
    <div class="container mt-5 mb-3">
        <x-alert></x-alert>
        <x-errors></x-errors>
    <form action="{{ route('categories.update',$category) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PATCH')

        <input type="file" name="img" multiple="FALSE" id="">
        <br>
        <div class="form-group">
            <label for="name">Name:</label><br>
            <input type="text" class="single-input" value="{{ $category->name }}" name="name" id="">
        </div>
        <div class="form-group">
            <label for="description">Description:</label><br>
            <textarea name="description" class="single-textarea" id="" cols="30" rows="10">{{ $category->description }}</textarea>
        </div>
        
        <input type="submit" class="genric-btn primary" value="Update a category">
    </form>
    <form action="{{ route('categories.destroy',$category) }}" method="post">
        @csrf
        @method('DELETE')
        <input type="submit" class="genric-btn danger" value="Delete a category"></form>
</div>
    @endsection
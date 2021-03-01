@extends('layouts.layout')
@section('content')
{{ $category->id }}
{{ $category->name }}
{{ $category->description }}
{{ $category->created_at}}
{{ $category->updated_at }}
<a href="{{ route('categories.show',$category) }}">Show category</a>
<a href="{{ route('categories.edit',$category) }}">Update category</a>
<form action="{{ route('categories.destroy',$category) }}" method="post">
    <input type="submit" value="Delete a category"></form>
    <br>
    <h3>All posts from this class</h3>
    
    <form action="{{ route('categories.update',$category) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PATCH')

        <input type="file" name="img" multiple="FALSE" id="">

        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" value="{{ $category->name }}" name="name" id="">
        </div>
        <div class="form-group">
            <label for="description">Description:</label>
            <textarea name="description" id="" cols="30" rows="10">{{ $category->description }}</textarea>
        </div>
        
        <input type="submit" value="Update a category">
    </form>
    
    @endsection
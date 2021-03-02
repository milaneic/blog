@extends('layouts.layout')
@section('content')

<div class="container mt-5 mb-3">
    <h3>Create a new post</h3>
    <x-errors></x-errors>
    <form action="{{ route('categories.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('POST')

        <input type="file" name="img" multiple="FALSE" id=""><br>

      
            <label for="name">Name:</label><br>
            <input type="text" class="single-input"  name="name" id=""><br>
    
    
            <label for="description">Description:</label><br>
            <textarea name="description" class="single-textarea" id="" cols="30" rows="10"></textarea>
    
        
        <input type="submit" class="genric-btn primary mt-2" value="Create a category">
    </form>
</div>
    @endsection
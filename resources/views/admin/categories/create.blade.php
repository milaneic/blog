@extends('layouts.layout')
@section('content')
    <h3>Create a new post</h3>
    {{-- <x-errors></x-errors> --}}
    <form action="{{ route('categories.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('POST')

        <input type="file" name="img" multiple="FALSE" id="">

        <div class="form-group">
            <label for="name">name:</label>
            <input type="text"  name="name" id="">
        </div>
        <div class="form-group">
            <label for="description">Description:</label>
            <textarea name="description" id="" cols="30" rows="10"></textarea>
        </div>
        
        <input type="submit" value="Update a category">
    </form>
    
    @endsection
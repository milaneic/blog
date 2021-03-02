@extends('layouts.layout')
@section('content')
    @foreach ($categories as $category)
    {{ $category->id }}
    {{ $category->name }}
    {{ $category->description }}
    {{ $category->created_at}}
    {{ $category->updated_at }}
    <a href="{{ route('categories.show',$category) }}">Show category</a>
    <a href="{{ route('categories.edit',$category) }}">Update category</a>
    <form action="{{ route('categories.destroy',$category) }}" method="post">
        @csrf
        @method('DELETE')
    <input type="submit" value="Delete a category"></form>
    <br>
    @endforeach
@endsection
@extends('layouts.layout')
@section('content')
<form method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data">
    @csrf
    @method('POST')
    <input type="file" name="img"  id="" multiple="false">
    <label for="caption">Caption</label>
    <input type="text" name="caption" >
    <label for="description">Text</label>
    <textarea name="description" id="" cols="30" rows="10"></textarea>
    <label for="img">Caption</label>
    <input type="file" name="img" id="">
   
    </form>
@endsection
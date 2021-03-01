@extends('layouts.layout')
@section('content')
<form method="POST" action="{{ route('categories.store') }}" enctype="multipart/form-data">
    @csrf
    @method('POST')
    <input type="file" name="img"  id="" multiple="false">

    <label for="name">Caption</label>
    <input type="text" name="name" >

    <label for="description">Text</label>
    <textarea name="description" id="" cols="30" rows="10"></textarea>

    <input type="submit" value="Add category">
   
    </form>
@endsection
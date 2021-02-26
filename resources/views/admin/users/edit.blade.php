@extends('layouts.app')
@section('content')
<form method="POST" action="{{ route('users.update',$user) }}">
    @csrf
    @method('PATCH')
    
    <label for="name">Name</label>
    <input type="text" name="name" value="{{ $user->name }}">
    <label for="email">Email</label>
    <input type="email" name="email" value="{{ $user->email }}">
    <label for="role_id">Role</label>
    <select name="role_id" id="">
        @foreach ($role as $item)
        @if($user->role->id ==$item->id){
            <option value="{{ $item->id }}" selected>{{ $item->name }}</option>
        @else
        <option value="{{ $item->id }}" >{{ $item->name }}</option>
        @endif
        @endforeach
    </select>
    <input type="submit" value="UPDATE">
    </form>
@endsection
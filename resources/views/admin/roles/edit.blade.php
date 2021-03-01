@extends('layouts.layout')
@section('content')
<x-alert></x-alert>
 <form method="POST" action="{{ route('roles.update',['role'=>$role]) }}">
@csrf
@method('PATCH')
    <div class="input-group">
        <label for="id">Id of role:</label>
        <input type="number" name="id" value="{{ $role->id }}" readonly placeholder="Please insert you role id...">
    </div>
    <div class="input-group">
        <label for="name">Name of role:</label>
        <input type="text" name="name" value="{{ $role->name }}" placeholder="Please insert you role name...">
    </div>
<input type="submit" value="" class="btn btn-primary">
</form>
@endsection
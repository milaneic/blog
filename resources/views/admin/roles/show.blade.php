@extends('layouts.layout')
@section('content')
<x-alert></x-alert>
<div>
    <h3>ID: {{ $role->id }}</h3>
    <h3>Name: {{ $role->name }}</h3>
</div>

<h2>All users</h2>
<table class="table">
    <thead>
        <th class="text-center">#</th>
        <th class="text-center">User name</th>
        <th class="text-center">Show information</th>
        <th class="text-center">Update user</th>
        <th class="text-center">Delete user</th>
    </thead>
    <tbody>
@foreach ($role->users as $item)

<tr>
    <td class="text-center">{{ $item->id }}</td>
    <td class="text-center">{{ $item->name }}</td>
    <td class="text-center"><a href="{{ route('users.show',$item) }}">Show</a></td>
    <td class="text-center"><a href="{{ route('users.edit',$item) }}">Update</a></td>
    <form method="POST" action="{{ route('users.delete',$item) }}">
        @csrf
        @method('DELETE')
            <td class="text-center">
                <input type="submit" value="Delete" class="btn btn-danger">
            </td>
        
        </form>
</tr>
@endforeach
</tbody>
</table>
@endsection
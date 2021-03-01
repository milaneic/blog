@extends('layouts.layout')
@section('content')
<x-alert></x-alert>
<table class="table">
    <thead>
        <th class="text-center">#</th>
        <th class="text-center">Name</th>
        <th class="text-center">Show information</th>
        <th class="text-center">Update</th>
        <th class="text-center">Delete</th>
    </thead>
    <tbody>
@foreach ($roles as $item)
<tr>
    <td class="text-center">{{ $item->id }}</td>
    <td class="text-center">{{ $item->name }}</td>
    <td class="text-center"><a href="{{ route('roles.show',$item) }}">Show information</a></td>
    <td class="text-center"><a href="{{ route('roles.edit',$item) }}">Update role</a></a></td>

    <form action="{{ route('roles.destroy',$item) }}" method="post">
    @csrf
@method('DELETE')
        <td class="text-center">
            <input type="submit" class="btn btn-danger" value="Delete a role">
        </td>
</form>

</tr>
@endforeach
</tbody>
</table>
@endsection
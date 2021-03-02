@extends('layouts.app')
@section('content')
<div class="container-max mt-5 mb-3">
<h1>All users</h1> 
<table class="table table-striped text-center">
    <thead>
        <th>#</th>
        <th>Name</th>
        <th>Email</th>
        <th>Role</th>
        <th>Email verified</th>
        <th>Last login</th>          
        <th>Created at</th>
        <th>Updated at</th> 
        <th>Update</th>
        <th>Delete</th>
    </thead>
    <tbody>
        @foreach ($users as $item)
        <tr>
            <td class="text-center">{{ $item->id }}</td>
            <td class="text-center">{{ $item->name }}</td>
            <td class="text-center">{{ $item->email }}</td>
            <td class="text-center">{{ $item->role->name }}</td>
            @if ($item->verified_at!=null)
            <td class="text-center"><input type="checkbox" name="" checked readonly id=""></td>
            @else
            <td class="text-center"><input type="checkbox" name=""  readonly id=""></td>
            @endif
            <td class="text-center">{{ $item->last_login }}</td>
            <td class="text-center">{{ $item->created_at }}</td>
            <td class="text-center">{{ $item->updated_at }}</td>
            <td class="text-center"><a href="{{ route('users.edit',$item) }}" class="genric-btn primary">Update</a></td>
            <td class="text-center">
                <form action="{{ route('users.delete',$item) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <input type="submit" class="genric-btn danger" value="DELETE">
                </form>
            </td>
        </tr>   
        @endforeach
    </tbody>
</table>
</div>
@endsection
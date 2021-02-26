@extends('layouts.app')
@section('content')

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
            <td>{{ $item->id }}</td>
            <td>{{ $item->name }}</td>
            <td>{{ $item->email }}</td>
            <td>{{ $item->role->name }}</td>
            @if ($item->verified_at!=null)
            <td><input type="checkbox" name="" checked readonly id=""></td>
            @else
            <td><input type="checkbox" name=""  readonly id=""></td>
            @endif
            <td>{{ $item->last_login }}</td>
            <td>{{ $item->created_at }}</td>
            <td>{{ $item->updated_at }}</td>
            <td><a href="{{ route('users.edit',$item) }}">Update</a></td>
            <td>
                <form action="{{ route('users.delete',$item) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <input type="submit" value="DELETE">
                </form>
            </td>
        </tr>   
        @endforeach
    </tbody>
</table>
@endsection
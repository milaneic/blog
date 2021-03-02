@extends('layouts.app')
@section('content')

<div class="container mt-5 mb-3">

    <h2>Informations about {{ $user->names }}</h2>
    
    
    @if ($user->avatar!=null)
    <img src="{{ asset($user->avatar) }}" alt="Users avatar" class="rounded" width="100px" height="100px">
    @endif
    
    <p>Name:</p>
    <input type="text" readonly value="{{ $user->name }}" class="single-input">
    <p>Email:</p>
    <input type="text" readonly value="{{ $user->email }}" class="single-input">
    <p>Role:</p>
    <input type="text" readonly value="{{ $user->role->name }}" class="single-input">
    <p>Email verified at:</p>
    <input type="text" readonly value="{{ $user->email_verified_at }}" class="single-input">
    <p>Last login at:</p>
    <input type="text" readonly value="{{ $user->last_login }}" class="single-input">
    <p>Number of posts:</p>
    <input type="text" readonly value="{{ count($user->posts) }}" class="single-input">

    <a href="{{ route('users.edit',$user) }}" class="genric-btn primary mt-3">Update a user</a>
</div>

<h3>All activites</h3>
<table class="table table-striped">
    <thead>
        <th class="text-center">#</th>
        <th class="text-center">Name</th>
        <th class="text-center">Date</th>
    </thead>
    <tbody>
       
        @if (count($logs)>0)
        @foreach ($logs as $log)
        <tr>
            <td class="text-center">{{ $log->id }}</td>
            <td class="text-center">{{ $log->getNameType($log->logs_type_id) }}</td>
            <td class="text-center">{{ $log->created_at}}</td>
        </tr>
        @endforeach
        @else
        <tr>
            <td class="text-center" colspan="3">No logs for this user yet.</td>
        </tr>
        @endif
        
    </tbody>
</table>

{{-- <table>
    <h1>List of all activities</h1>
    <h3>User {{ $user->name }}</h3>
    
    <h2>All posts</h2>
    <table class="table-striped">
        <thead>
            <th>#</th>
            <th>Caption</th>
            <th>Description</th>
            <th>Text</th>
            <th>Date</th>
            <th>Edit</th>
            <th>Delete</th>
        </thead>
        <tbody>
            @foreach ($user->posts as $post)
            <tr>
                <td>{{ $post->id }}</td>
                <td>{{ $post->caption }}</td>
                <td>{{ Str::limit($post->description,80,'...') }}</td>
                <td>{{ Str::limit($post->text,80,'...') }}</td>
                <td>{{ $post->updated_at }}</td>
                <td><a href="{{ route('posts.edit',$post) }}">Edit</a></td>
                <td>
                    
                    <form action="{{ route('posts.delete',$post) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <input type="submit" value="DELETE A POST">
                    </form>
                    
                </td>
            </tr>   
            @endforeach
        </tbody>
    </table>
    <h2>All comments</h2>
    
    <table class="table-striped">
        <thead>
            <th>#</th>
            <th>Post id</th>
            <th>Post caption</th>
            <th>Text of comment</th>
            <th>Date</th>
            <th>Edit</th>
            <th>Delete</th>
        </thead>
        <tbody>
            @foreach ($user->comments as $com)
            <tr>
                <td>{{ $com->id }}</td>
                <td>{{ $com->post->id }}</td>
                <td>{{ Str::limit($com->post->caption ,80,'...')}}</td>
                <td>{{ Str::limit($com->text ,80,'...')}}</td>
                <td>{{ $com->updated_at }}</td>
                <td><a href="{{ route('comments.edit',$com) }}">Edit</a></td>
                <td>
                    
                    <form action="{{ route('comments.delete',$com) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <input type="submit" value="DELETE A COMMENT">
                    </form>
                    
                </td>
            </tr>   
            @endforeach
        </tbody>
    </table> --}}
    
    @endsection
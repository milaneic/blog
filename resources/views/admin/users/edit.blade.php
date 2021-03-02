@extends('layouts.layout')
@section('content')
<div class="container mt-5 mb-5">
    <form method="POST" action="{{ route('users.update',$user) }}" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <x-alert></x-alert>
        <x-errors></x-errors>
        
        <label for="image">Avatar:</label><br>
        <input type="file" name="avatar"  id="avatar" class="form-file" multiple="false"><br>
        
        
        <label for="name">Name</label><br>
        <input type="text" name="name" class="single-input" value="{{ $user->name }}"><br>
        
        
        
        <label for="email">Email</label><br>
        <input type="email" name="email" class="single-input" value="{{ $user->email }}"><br>
        
        
        
        <label for="password">Password</label><br>
        <input type="password" name="password" id="" class="single-input" placeholder="Input your new password"><br>
        
        
        
        <label for="password">Password confirmation:</label><br>
        <input id="password-confirm" type="password" class="single-input"  name="password_confirmation"  autocomplete="new-password"><br>
        
        <label for="role_id">Role</label><br>
        <select name="role_id" class="nice-select"
        @if (auth()->user()->hasRole())
            
        @else
            readonly
        @endif
        id="">
            @foreach ($role as $item)
            @if($user->role->id ==$item->id){
                <option class="option" value="{{ $item->id }}" selected>{{ $item->name }}</option>
                @else
                <option class="option" value="{{ $item->id }}" >{{ $item->name }}</option>
                @endif
                @endforeach
            </select>
            
            
            <br><br>
            <input type="submit" class="genric-btn primary" value="UPDATE">
        </form>
    </div>

    <h2 class="m-5">All posts</h2>
    <table class="table table-striped">
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
                <td><a href="{{ route('posts.edit',$post) }}" class="genric-btn primary">Edit</a></td>
                <td>
                    
                    <form action="{{ route('posts.delete',$post) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <input type="submit" class="genric-btn danger" value="DELETE A POST">
                    </form>
                    
                </td>
            </tr>   
            @endforeach
        </tbody>
    </table>
    {{--  <h2>All comments</h2>
        
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
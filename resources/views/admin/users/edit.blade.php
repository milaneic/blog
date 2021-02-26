@extends('layouts.app')
@section('content')
<div class="container mt-5 mb-5">
    <form method="POST" action="{{ route('users.update',$user) }}">
        @csrf
        @method('PATCH')
        
    
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" value="{{ $user->name }}">
        </div>
    
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" value="{{ $user->email }}">
        </div>
        <div class="form-group">
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
        </div>
     
        <input type="submit" value="UPDATE">
        </form>

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
    </table>


</div>
@endsection
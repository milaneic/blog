@extends('layouts.app')
@section('content')
<table>
    <h1>List of all activities</h1>
    <h3>User {{ $user->name }}</h3>
    
    <h2>All posts</h2>
    <table>
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

<table>
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

@endsection
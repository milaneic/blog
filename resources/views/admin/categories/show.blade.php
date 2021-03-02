@extends('layouts.layout')
@section('content')
    {{ $category->id }}
    {{ $category->name }}
    {{ $category->description }}
    {{ $category->created_at}}
    {{ $category->updated_at }}
    <a href="{{ route('categories.show',$category) }}">Show category</a>
    <a href="{{ route('categories.edit',$category) }}">Update category</a>
    <form action="{{ route('categories.destroy',$category) }}" method="post">
    <input type="submit" value="Delete a category"></form>
    <br>
    <h3>All posts from this class</h3>
    <table class="table table-striped">
        <thead>
            <th class="text-center">#</th>
            <th class="text-center">Caption</th>
            <th class="text-center">Description</th>
            <th class="text-center">Created at</th>
            <th class="text-center">Update</th>
            <th class="text-center">Delete</th>
        </thead>
        <tbody>
            @foreach ($category->posts()->get() as $post)
            <tr>
                <td class="text-center">{{ $post->id }}</td>
                <td class="text-center">{{ $post->caption }}</td>
                <td class="text-center">{{ $post->description }}</td>
                <td class="text-center">{{ $post->created_at }}</td>
                <td class="text-center"><a href="{{ route('posts.edit',$post) }}">Update</a></td>
                <td class="text-center">
                    <form action="{{ route('posts.delete',$post) }}" method="post">
                    @csrf
                @method('DELETE')
                        <input type="submit" value="Delete">
            </form>
                </td>

        </tr>
            @endforeach
        </tbody>
    </table>
@endsection
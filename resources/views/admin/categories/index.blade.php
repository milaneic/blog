@extends('layouts.layout')
@section('content')
<div class="container mt-5 mb-3">

    <h2>All categories</h2>
    <x-alert></x-alert>
    <table class="table table-striped mt-5">
        <thead>
            <th class="text-center">#</th>
            <th class="text-center">Name</th>
            <th class="text-center">Description</th>
            <th class="text-center">Number of posts</th>
            <th class="text-center">Updated at</th>
            <th class="text-center">Created at</th>
            <th class="text-center">Update</th>
            <th class="text-center">Delete</th>
        </thead>
        <tbody>
            @foreach ($categories as $category)
            <tr>
                <td class="text-center">{{ $category->id }}</td>
                <td class="text-center">{{ $category->name }}</td>
                <td class="text-center">{{ Str::limit( $category->description, 50, '...') }}</td>
                <td class="text-center">{{ count($category->posts()->get())}}</td>
                <td class="text-center">{{ $category->updated_at }}</td>
                <td class="text-center">{{ $category->created_at }}</td>
                <td class="text-center"><a href="{{ route('categories.edit',$category) }}" class="genric-btn primary">Update</a></td>
                <td class="text-center"><form action="{{ route('categories.destroy',$category) }}" method="post">
                    @csrf
                    @method('DELETE')
                <input type="submit" class="genric-btn danger" value="Delete"></form></td>
            </tr>
    @endforeach
</tbody>
</table>
</div>
@endsection
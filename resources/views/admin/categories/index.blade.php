@extends('layouts.admin')
@section('content')

    <article class="content responsive-tables-page">
        <div class="title-block">
            <h1 class="title"> Categories Table </h1>
        </div>
        <section class="section">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-block">
                            <div class="card-title-block">
                                <h3 class="title"> Responsive simple </h3>
                            </div>
                            <section class="example">
                                <div class="table-responsive">
                                    <x-alert></x-alert>
                                    <table class="table table-striped table-bordered table-hover">
                                        <thead>
                                        <tr>
                                            <th class="text-center">#</th>
                                            <th class="text-center">Name</th>
                                            <th class="text-center">Description</th>
                                            <th class="text-center">Number of posts</th>
                                            <th class="text-center">Updated at</th>
                                            <th class="text-center">Created at</th>
                                            <th class="text-center">Update</th>
                                            <th class="text-center">Delete</th>
                                        </tr>
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
                                                        <input type="submit" class="genric-btn btn btn-danger" value="Delete"></form></td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </section>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </article>
@endsection

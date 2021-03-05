@extends('layouts.admin')
@section('content')
    <div class="container">
    <div class="row justify-content-center mt-5 mb-5">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"></div>
                <h3 class="text-center">Edit category</h3>
                <div class="card-body">
                    <x-alert></x-alert>
                    <x-errors></x-errors>
                    <form action="{{ route('categories.update',$category) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')

                        <input type="file" name="img" multiple="FALSE" id="">
                        <br>
                        <div class="form-group">
                            <label for="name">Name:</label><br>
                            <input type="text" class="single-input" value="{{ $category->name }}" name="name" id="">
                        </div>
                        <div class="form-group">
                            <label for="description">Description:</label><br>
                            <textarea name="description" class="single-textarea" id="" cols="30" rows="10">{{ $category->description }}</textarea>
                        </div>

                        <input type="submit" class="genric-btn btn btn-primary" value="Update a category">
                    </form>
                    <form action="{{ route('categories.destroy',$category) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <input type="submit" class="genric-btn btn btn-danger" value="Delete a category"></form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

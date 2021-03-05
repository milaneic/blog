@extends('layouts.admin')
@section('content')

<div class="container">
    <div class="row justify-content-center mt-5 mb-5">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"></div>
                <h3 class="text-center">Edit user</h3>
                <div class="card-body">
                    <x-alert></x-alert>
                    <x-errors></x-errors>
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
                        <input type="submit" class="genric-btn btn btn-primary" value="UPDATE">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<article class="content responsive-tables-page">
    <div class="title-block">
        <h1 class="title"> All posts </h1>
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
                                        <th>#</th>
                                        <th>Caption</th>
                                        <th>Description</th>
                                        <th>Text</th>
                                        <th>Date</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
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
                                                    <input type="submit" class="genric-btn btn btn-danger" value="DELETE">
                                                </form>

                                            </td>
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

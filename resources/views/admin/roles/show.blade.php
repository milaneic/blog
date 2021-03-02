@extends('layouts.admin')
@section('content')


<article class="content responsive-tables-page">
    <x-alert></x-alert>
    <div>
        <h3>ID: {{ $role->id }}</h3>
        <h3>Name: {{ $role->name }}</h3>
    </div>
    <div class="title-block">
        <h1 class="title"></h1>
    </div>
    <section class="section">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-block">
                        <div class="card-title-block">
                            <h3 class="title"> All users </h3>
                        </div>
                        <section class="example">
                            <div class="table-responsive">
                                <x-alert></x-alert>
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th class="text-center">User name</th>
                                        <th class="text-center">Show information</th>
                                        <th class="text-center">Update user</th>
                                        <th class="text-center">Delete user</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($role->users as $item)

                                        <tr>
                                            <td class="text-center">{{ $item->id }}</td>
                                            <td class="text-center">{{ $item->name }}</td>
                                            <td class="text-center"><a href="{{ route('users.show',$item) }}">Show</a></td>
                                            <td class="text-center"><a href="{{ route('users.edit',$item) }}">Update</a></td>
                                            <form method="POST" action="{{ route('users.delete',$item) }}">
                                                @csrf
                                                @method('DELETE')
                                                <td class="text-center">
                                                    <input type="submit" value="Delete" class="btn btn-danger">
                                                </td>

                                            </form>
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

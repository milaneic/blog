@extends('layouts.admin')

@section('content')

    <article class="content responsive-tables-page">
        <div class="title-block">
            <h1 class="title"> Roles Table </h1>
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
                                        <th>Name</th>
                                        <th>Show information</th>
                                        <th>Update</th>
                                        <th>Delete</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($roles as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td><a href="{{ route('roles.show',$item) }}">Show information </a></td>
                                        <td><a href="{{ route('roles.edit',$item) }}">Update role</a></td>
                                        <form action="{{ route('roles.destroy',$item) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                        <td><input type="submit" class="btn btn-danger" value="Delete a role"></td>
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

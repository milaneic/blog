@extends('layouts.admin')

@section('content')

    <article class="content responsive-tables-page">
        <div class="title-block">
            <h1 class="title"> Users Table </h1>
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
                                            <th>Email</th>
                                            <th>Role</th>
                                            <th>Email verified</th>
                                            <th>Last login</th>
                                            <th>Created at</th>
                                            <th>Updated at</th>
                                            <th>Update</th>
                                            <th>Delete</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($users as $item)
                                            <tr>
                                                <td>{{ $item->id }}</td>
                                                <td>{{ $item->name }}</td>
                                                <td>{{ $item->email }}</td>
                                                <td>{{ $item->role->name }}</td>
                                                @if ($item->verified_at!=null)
                                                    <td><input type="checkbox" name="" checked readonly id=""></td>
                                                @else
                                                    <td><input type="checkbox" name=""  readonly id=""></td>
                                                @endif
                                                <td>{{ $item->last_login }}</td>
                                                <td>{{ $item->created_at }}</td>
                                                <td>{{ $item->updated_at }}</td>
                                                <td><a href="{{ route('users.edit',$item) }}">Update</a></td>
                                                <td>
                                                    <form action="{{ route('users.delete',$item) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <input type="submit" class="btn btn-danger" value="DELETE">
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

@extends('layouts.admin')
@section('content')
<x-alert></x-alert>

    <div class="container">
        <div class="row justify-content-center mt-5 mb-5">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"></div>
                    <h3 class="text-center">Edit role</h3>
                    <div class="card-body">
                        <form method="POST" action="{{ route('roles.update',['role'=>$role]) }}">
                            @csrf
                            @method('PATCH')
                            <div class="form-group row">
                                <label for="role" class="col-md-4 col-form-label text-md-right">Role id:</label>

                                <div class="col-md-6">
                                    <input id="roleid" type="number" class="form-control @error('roleid') is-invalid @enderror" name="id" value="{{ $role->id }}" placeholder="Please insert you role id..." autofocus>

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">Role name:</label>

                                <div class="col-md-6">
                                    <input id="rolename" type="text" class="form-control @error('rolename') is-invalid @enderror" name="name" value="{{ $role->name }}" placeholder="Please insert you role name...">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Edit
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

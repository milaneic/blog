@extends('layouts.admin')
@section('content')

    <article class="content responsive-tables-page">
        <div class="title-block">
            <h1 class="title"> Create role </h1>
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
                                    <x-errors></x-errors>
                                    <form method="POST" action="{{ route('roles.store') }}">
                                        @csrf
                                        @method('POST')
                                        <div class="input-group">
                                            <label for="name">Name of role: </label><br>
                                            <input type="text" class="single-input" name="name" id="" placeholder="Insert role name..."><br>
                                        </div>
                                        <input type="submit" value="Create" class="btn btn-primary">
                                    </form>
                                </div>
                            </section>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </article>
@endsection

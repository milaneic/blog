@extends('layouts.admin')
@section('content')

<article class="content responsive-tables-page">
    <div class="title-block">
        <h1 class="title"> Create category </h1>
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
                                <form action="{{ route('categories.store') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    @method('POST')

                                    <input type="file" name="img" multiple="FALSE" id=""><br>


                                    <label for="name">Name:</label><br>
                                    <input type="text" class="single-input"  name="name" id=""><br>


                                    <label for="description">Description:</label><br>
                                    <textarea name="description" class="single-textarea" id="" cols="30" rows="10"></textarea><br>


                                    <input type="submit" class="genric-btn btn btn-primary mt-2" value="Create a category">
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

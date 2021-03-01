@extends('layouts.layout')
@section('content')
 <form method="POST" action="{{ route('roles.store') }}">
@csrf
@method('POST')
    <div class="input-group">
        <label for="name">Name of role:</label>
        <input type="text" name="name" id="" placeholder="Please insert you role name...">
    </div>
<input type="submit" value="" class="btn btn-primary">
</form>
@endsection
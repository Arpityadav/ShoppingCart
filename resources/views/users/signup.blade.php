@extends('layouts.master')

@section('content')
    <h3>Sign Up</h3>
    <form method="POST" action="/signup">

    {{ csrf_field() }}

    <div class="form-group">
        <label for="name">Name</label>
        <input type="name" name="name" class="form-control" id="name" placeholder="Name">
    </div>

    <div class="form-group">
        <label for="exampleInputEmail1">Email address</label>
        <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Password</label>
        <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
    </div>

    <div class="form-group">
        <label for="exampleInputPassword2">Password</label>
        <input type="password" name="password_confirmation" class="form-control" id="exampleInputPassword2" placeholder="Password">
    </div>

    <button type="submit" class="btn btn-info">Submit</button>

    @include('errors.errors')
    </form>
@endsection

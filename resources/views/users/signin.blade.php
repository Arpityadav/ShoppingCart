@extends('layouts.master')

@section('content')
    <h3>Log In</h3>
    <form method="POST" action="{{ route('login') }}">

    {{ csrf_field() }}

    <div class="form-group">
        <label for="exampleInputEmail1">Email address</label>
        <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
    </div>

    <div class="form-group">
        <label for="exampleInputPassword1">Password</label>
        <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
    </div>

    <button type="submit" class="btn btn-info">Log In</button>

    <div class="row my-2">
        @include('errors.errors')
    </div>
    </form>
        <p class="mt-4 mx-auto">Don't have an account, <a href="{{ route('signup') }}">Signup here</a></p>
@endsection

@extends('layouts.main')

@section('title', "")

@section('content')

    <form method="POST" action="{{ route('login.attempt') }}">
        @csrf
        <div class="card-body">
            <h1>LOGIN PAGE</h1><br>
            <label for="email1">Username:</label><br>
            <input type="text" class="form-control" id="email1" name="email1" placeholder="Enter your username"/><br>
            <label for="password1">Password:</label><br>
            <input type="password" class="form-control" id="password1" name="password1" placeholder="Enter your password"/><br>
            <button type="submit" class="btn btn-outline-primary">Login</button>
        </div>
    </form>

@endsection
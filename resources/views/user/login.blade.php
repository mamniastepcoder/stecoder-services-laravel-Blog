@extends('layouts.app')
@section('content')
    <div class="mt-5">
        <h1 class="text-center mb-4 text-success">Login</h1>

        @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
        @endif

        <form method="POST" action="{{ route('login.form') }}" class="border border-success rounded p-5 mx-auto" style="max-width: 500px;">
            @csrf

            <div class="form-group">
                <label for="email"><b class="text-info">Email</b></label>
                <input id="email" type="text" name="email" value="{{ old('email') }}" class="form-control" autofocus>
                @error('email')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="password"><b class="text-info">Password</b></label>
                <input id="password" type="password" name="password" class="form-control">
                @error('password')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary btn-block">Login</button>
            <a href="{{ route('register') }}" class="d-block text-center mt-3">Click to Register</a>
            <a href="{{ route('posts') }}" class="d-block text-center mt-3">Without Login</a>
        </form>
    </div>
@endsection


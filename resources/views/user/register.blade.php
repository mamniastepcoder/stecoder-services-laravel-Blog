<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4 text-danger">New Registration</h1>
          @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
   @endif
   @if (session('error'))
    <div>{{ session('error') }}</div>
@endif
        <form method="POST" action="{{ route('register.insert') }}" class="border border-success rounded p-5 mx-auto" style="max-width: 500px;">
            @csrf

            <div class="form-group">
                <label for="name"><b>Name</b></label>
                <input id="name" type="text" name="name" value="{{ old('name') }}" class="form-control" autofocus>
                @error('name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="email"><b>Email</b></label>
                <input id="email" type="text" name="email" value="{{ old('email') }}" class="form-control">
                @error('email')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="password"><b>Password</b></label>
                <input id="password" type="password" value="{{ old('password') }}" name="password" class="form-control">
                @error('password')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="password_confirmation"><b>Confirm Password</b></label>
                <input id="password_confirmation" type="password" value="{{ old('password_confirmation') }}" name="password_confirmation" class="form-control">
                 @error('password_confirmation')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary btn-block">Register</button>
             <a href="{{ route('login') }}" class="d-block text-center mt-3">Click to Login</a>
        </form>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

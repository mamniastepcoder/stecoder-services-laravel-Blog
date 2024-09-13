<!DOCTYPE html>
<html>
<head>
    <title>Blog Posts</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <div class="container">
        <h1 class="mt-4 text-center text-danger">All Blog Posts</h1>

        @auth
            <a href="{{ route('posts.create') }}" class="btn btn-success mb-3 float-right mr-5">Create New Post</a>
             <a href="{{ route('logout') }}" class="btn btn-secondary mb-3" title="Logout">
            <i class="fas fa-sign-out-alt"></i> Logout
        </a>
        @endauth

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
          @guest
            <a href="{{ route('login') }}" class="btn btn-secondary btn-sm text-center mt-3 text-white">Back to Login</a>
        @endguest

       
   <div class="list-group mt-5">
            @foreach ($posts as $post)
                <div class="list-group-item mt-2">
                    <h5 class="mb-1">{{ $post->title }}</h5>

                    <a href="{{ route('posts.view', $post->id) }}" class="btn btn-info btn-sm">View</a>

                    @auth
                        <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('posts.delete', $post->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure you want to delete this item?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    @endauth
                </div>
            @endforeach
        </div>
    </div>
</body>
</html>

<!DOCTYPE html>
<html>
<head>
    <title>View Post</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
       <h1 class="text-danger">View Post</h1> 
        <table class="table table-bordered mt-5">
            <thead>
                <tr>
                    <th>Author Name</th>
                    <th>Title</th>
                    <th>Content</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $post->author_name }}</td>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->content }}</td>
                </tr>
            </tbody>
        </table>
        
        <a href="{{ route('posts') }}" class="btn btn-secondary">Back to Posts</a>
    </div>
</body>
</html>

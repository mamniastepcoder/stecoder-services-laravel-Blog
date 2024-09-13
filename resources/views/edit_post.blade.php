<!DOCTYPE html>
<html>
<head>
    <title>Edit Post</title>
     <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  

     <div class="container w-50">
        <h1 class="mt-4  text-center p-3 mb-2 bg-info text-white">Edit Post</h1>
        <form action="{{ route('posts.update', $post->id) }}" class="border border-warning mt-5 p-4"  method="POST"  >
            @csrf
             <div class="form-group">
                <label ><b class="text-info">Author Name</b></label>
                <input type="text" class="form-control" value="{{ $post->author_name }}" name="author_name" >
                  @error('author_name')
            <div class="text-danger">{{$message}}</div>
            @enderror
            </div>
          
            <div class="form-group">
                <label for="title"><b class="text-info">Title</b></label>
                <input type="text" class="form-control" value="{{ $post->title }}" name="title" >
                   @error('title')
            <div class="text-danger">{{$message}}</div>
            @enderror
            </div>
            <div class="form-group">
                <label for="body"><b class="text-info">Content</b></label>
                <textarea class="form-control" name="content" rows="5" >{{ $post->content }}</textarea>
                   @error('content')
            <div class="text-danger">{{$message}}</div>
            @enderror
            </div>
           
            <button type="submit" class="btn btn-success">Update</button>
             <a href="{{ route('posts') }}" class="btn btn-secondary">Back to Posts</a>
        </form>
    </div>
</body>
</html>

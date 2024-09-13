<!DOCTYPE html>
<html>
<head>
    <title>Edit Post</title>
     <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  

     <div class="container w-50">
        <h1 class="mt-4 text-success">Edit Post</h1>
        <form action="{{ route('posts.update', $post->id) }}" class="border mt-2 p-3"  method="POST"  >
            @csrf
             <div class="form-group">
                <label ><b>Author Name</b></label>
                <input type="text" class="form-control" value="{{ $post->author_name }}" name="author_name" >
                  @error('author_name')
            <div class="text-danger">{{$message}}</div>
            @enderror
            </div>
          
            <div class="form-group">
                <label for="title"><b>Title</b></label>
                <input type="text" class="form-control" value="{{ $post->title }}" name="title" >
                   @error('title')
            <div class="text-danger">{{$message}}</div>
            @enderror
            </div>
            <div class="form-group">
                <label for="body"><b>Content</b></label>
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

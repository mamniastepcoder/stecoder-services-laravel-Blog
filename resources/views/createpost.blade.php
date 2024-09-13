<!DOCTYPE html>
<html>
<head>
    <title>Create Post</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container w-50">
        <h1 class="mt-4 text-center">Create New Post</h1>
        <form action="{{route('posts.insert')}}" class="border mt-2 p-3"  method="POST"  >
            @csrf
             <div class="form-group">
                <label ><b>Author Name</b></label>
                <input type="text" class="form-control" name="author_name" >
                  @error('author_name')
            <div class="text-danger">{{$message}}</div>
            @enderror
            </div>
          
            <div class="form-group">
                <label for="title"><b>Title</b></label>
                <input type="text" class="form-control"  name="title" >
                   @error('title')
            <div class="text-danger">{{$message}}</div>
            @enderror
            </div>
            <div class="form-group">
                <label for="body"><b>Content</label>
                <textarea class="form-control" name="content" rows="5" ></textarea>
                   @error('content')
            <div class="text-danger">{{$message}}</div>
            @enderror
            </div>
           
            <button type="submit" class="btn btn-primary">submit</button>
        </form>
    </div>
</body>
</html>

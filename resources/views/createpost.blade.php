@extends('layouts.app')
@section('content')
    <div class="w-50 mx-auto">
        <h1 class="mt-4 text-center p-3 mb-2 bg-info text-white">Create New Post</h1>
        <form action="{{route('posts.insert')}}" class="border border-warning border-3 mt-5 p-4"   method="POST"  >
            @csrf
             <div class="form-group">
                <label ><b class="text-info">Author Name</b></label>
                <input type="text" class="form-control" name="author_name" >
                  @error('author_name')
            <div class="text-danger">{{$message}}</div>
            @enderror
            </div>
          <div class="form-group">
                <label for="title"><b class="text-info">Title</b></label>
                <input type="text" class="form-control"  name="title" >
                   @error('title')
            <div class="text-danger">{{$message}}</div>
            @enderror
            </div>
            <div class="form-group">
                <label for="body"><b class="text-info">Content</label>
                <textarea class="form-control" name="content" rows="5" ></textarea>
                   @error('content')
            <div class="text-danger">{{$message}}</div>
            @enderror
            </div>
            <button type="submit" class="btn btn-success">submit</button>
             <a href="{{ route('posts') }}" class="btn btn-secondary">Back to Posts</a>
        </form>
    </div>
@endsection
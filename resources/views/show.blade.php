@extends('layouts.app')
@section('content')
    <div class="mt-4">
       <h1 class="mt-4 text-center  p-3 mb-2 bg-info text-white">View Post</h1> 
        <table class="table table-bordered mt-5">
            <thead>
                <tr>
                    <th class="text-info">Author Name</th>
                    <th class="text-info">Title</th>
                    <th class="text-info">Content</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td >{{ $post->author_name }}</td>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->content }}</td>
                </tr>
            </tbody>
        </table>
      <a href="{{ route('posts') }}" class="btn btn-secondary">Back to Posts</a>
    </div>
@endsection

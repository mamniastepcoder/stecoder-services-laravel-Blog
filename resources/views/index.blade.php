@extends('layouts.app')
@section('content')
        <h1 class="mt-4 text-center  p-3 mb-2 bg-info text-white">All Blog Posts</h1>
        @auth
            <a href="{{ route('posts.create') }}" class="btn btn-success mb-3 float-right mr-5 mt-3">Create New Post</a>
             <a href="{{ route('api-data') }}" class=" mb-3 float-right mr-5 mt-3">Api Data Fetch</a>
              <a href="{{ route('books-search') }}" class=" mb-3 float-right mr-5 mt-3">Books List</a>
            <a href="{{ route('logout') }}" class="btn btn-secondary mb-3 mt-3" title="Logout">
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
        <div class="list-group mt-4">
            @foreach ($posts as $post)
                <div class="list-group-item mt-2">
                    <h3 class="text-success">Title</h3>
                    <h5 class="mb-1">{{ $post->title }}</h5>
                    <a href="{{ route('posts.view', $post->id) }}" class="btn btn-info btn-sm mt-3"> <i class="fas fa-eye"></i>
                    </a>
                    @auth
                        <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-warning btn-sm mt-3 ml-2">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form action="{{ route('posts.delete', $post->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure you want to delete this item?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm mt-3 ml-2"><i class="fas fa-trash"></i></button>
                        </form>
                    @endauth
                    <h4 class=" text-danger mt-4">Comment</h4>
                    @auth
                        <div class="mb-4">
                            <form action="{{ route('posts.comments') }}" method="POST">
                                @csrf
                                <input type="hidden" name="post_id" value="{{ $post->id }}">
                                <div class="form-group">
                                    <textarea name="comment" class="form-control w-50" rows="3" placeholder="Add your comment..."></textarea>
                                    @error('comment')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <select name="visibility" class="form-control w-50" id="visibility">
                                        <option >Select Visibility</option>
                                        <option value="public">Public</option>
                                        <option value="private">Private</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-secondary">Post Comment</button>
                            </form>
                        </div>
                    @endauth
                     @forelse ($post->comments as $comment)
                      @if ($comment->visibility == 'public' || (Auth::check() && Auth::user()->id == $comment->user_id))
                        <div class="media mb-3">
                            <div class="media-body">
                                <h5 class="mt-0">{{ $comment->user->name }} <small><i>{{ $comment->created_at->diffForHumans() }}</i></small></h5>
                                <p>{{ $comment->content }}</p>
                            </div>
                        </div>
                        @endif
                    @empty
                        <p>No comments yet.</p>
                    @endforelse
                </div>
            @endforeach
        </div>
@endsection
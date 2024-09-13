<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index()
{
   $posts = Post::with(['comments' => function($query) {
        $query->orderBy('created_at', 'desc');
    }, 'comments.user'])
    ->orderBy('created_at', 'desc')
    ->get();

    return view('index', compact('posts'));
}
   public function create()
    {
        return view('createpost');
    }

    public function insert(Request $request)
    {
        $request->validate([
            'author_name' => 'required|string',
            'title' => 'required|string',
            'content' => 'required|string',
        ]);

        $post = new Post;
        $post->author_name = $request->author_name;
        $post->title = $request->title;
        $post->content = $request->content;
        $post->save();

        return redirect()->route('posts')->with('success', 'Your post has been added successfully.');
    }

    public function view($id)
    {
        $post = Post::find($id);
        return view('show', compact('post'));
    }

    public function edit($id)
    {
        $post = Post::find($id);
        return view('edit_post', compact('post'));
    }

    public function update(Request $request, $id)
    {
        $post = Post::find($id);

        $request->validate([
            'author_name' => 'required|string',
            'title' => 'required|string',
            'content' => 'required|string',
        ]);

        $post->author_name = $request->author_name;
        $post->title = $request->title;
        $post->content = $request->content;
        $post->save();

        return redirect()->route('posts')->with('success', 'Your post has been updated successfully.');
    }

    public function delete($id)
    {
        $post = Post::find($id);
        $post->delete();

        return redirect()->route('posts')->with('success', 'Your post has been deleted successfully.');
    }
}

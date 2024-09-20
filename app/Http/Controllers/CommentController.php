<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Comment;

class CommentController extends Controller
{
    public function store(Request $request)
    {
         $request->validate([
            'comment' => 'required',
            'post_id' => 'required|exists:posts,id',
        ]);
         $comment = new Comment();
         $comment->content = $request->input('comment');
         $comment->post_id = $request->input('post_id');
         $comment->user_id = Auth()->id();
         $comment->visibility = $request->input('visibility');
         $comment->save();
        return redirect()->back()->with('success','Your comment add successfully');
 }
}

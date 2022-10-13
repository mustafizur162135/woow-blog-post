<?php

namespace App\Http\Controllers;

use App\Models\Comments;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $comment = new Comments();
        $comment->comment = $request->commentbody;
        $comment->user()->associate($request->user());
        $post = Post::find($request->get('post_id'));
        $post->Comments()->save($comment);

        return back();
    }

    public function replyStore(Request $request)
    {
        $reply = new Comments();
        $reply->comment = $request->commentbody;
        $reply->user()->associate($request->user());
        $reply->parent_id = $request->get('comment_id');
        $post = Post::find($request->get('post_id'));

        $post->comments()->save($reply);

        return back();

    }
}

<?php

namespace App\Http\Controllers;
use App\Http\Requests\Comment\StoreCommentRequest;
use App\Http\Resources\CommentResource;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Tests\Models\User;

class CommentController extends Controller
{
    public function store(Request $request)
    {
            $comment= Comment::create([
            'body'=> $request->body,
            'user_id'=> $request->user_id,
            'post_id'=> $request->post_id,
        ]);
        return back()->with('success', 'Your comment has been posted.');
        }
}

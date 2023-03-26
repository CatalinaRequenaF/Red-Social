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
        //If it's a comment post:
            $comment= Comment::create([
            'body'=> $request->body,
            'user_id'=> $request->user_id
            ]);

            $post= Post::find($request->post_id);
            $comment->posts()->save($post);

            //return response()->json($post);


        //If its a comment's reply->
        /*$comment= Comment::create([
            'body'=> $request->body,
            'user_id'=> $request->user_id
            ]);

            $parent= Comment::find($request->commentable_id);
            $comment->comments()->save($parent); 
            */
        return back()->with('success', 'Your comment has been posted.');
        }


        public function show(Post $post){

        }

        public function delete(Post $post){
            
        }
}

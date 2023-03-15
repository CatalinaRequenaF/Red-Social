<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\StorePostRequest;
use App\Http\Requests\Post\UpdatePostRequest;
use App\Http\Resources\PostResource;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class PostController extends Controller
    {
        public function index()
        {
            return response()->json(Post::all());
        }
    
        /**
         * Store a newly created resource in storage.
         */
        public function store(StorePostRequest $request)
        {
            $post= Post::create([
                'title'=> $request->title,
                'body'=> $request->body,
                'user_id'=> $request->user_id,
                'community_id'=> $request->community_id,
            ]);
            return new PostResource($post);
        }
    
        /**
         * Display the specified resource.
         */
        public function show(Post $post)
        {
            return new PostResource($post);
        }
    
        /**
         * Update the specified resource in storage.
         */
        public function update(UpdatePostRequest $request, Post $post)
        {
            //Puerta (si te fijas se llama como a un middleware)
            if (! Gate::allows('update-post', $post)) {
                abort(403, 'To update a post you have to be its owner.');
            }

            $post -> update([
                'title'=> $request->title,
                'body'=> $request->body,
            ]);
            return new PostResource($post);
        }
    
        /**
         * Remove the specified resource from storage.
         */
        public function destroy(Post $post)
        {
            return $post->delete();
        }
    }
  
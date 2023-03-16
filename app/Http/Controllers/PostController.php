<?php

namespace App\Http\Controllers;

use App\Models\Community;
use App\Models\Post;
use Illuminate\Contracts\Routing\UrlRoutable;
use Illuminate\Http\Request;

class PostController extends Controller
{

    //Ruta personalizada
    public function getRouteKey(): mixed
    {
        return 'slug';
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //$request['slug'] = Str::slug($request->title);
    }

    /**
     * Display the specified resource.
     */
    public function show(Community $community, Post $post)
    {   
        $comments= $post->comments->sortBy('created_at')->reverse();

        return view('posts.show', compact('post', 'community','comments'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

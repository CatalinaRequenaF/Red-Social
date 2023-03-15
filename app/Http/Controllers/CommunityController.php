<?php

namespace App\Http\Controllers;

use App\Models\Community;
use App\Models\Post;
use Illuminate\Http\Request;

class CommunityController extends Controller
{

    //Costum uri
    public function getRouteKey(): mixed
    {
        return 'title';
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $communities = Community::orderBy('created_at', 'desc')->get();
        //$posts = Post::get();
        return (view('communities.index', ['communities' => $communities]));//,['posts'=>$posts]));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('community.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $community = new Community;
        $community->title = $request->title;
        $community->description = $request->description;
        $community->user_id = $request->user()->id;


        $community->save();

        session()->flash('status', 'Comunidad creada!');

        return redirect()->route(('communities.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Community $community)
    {
        $posts= $community->posts;
        return view('communities.show', compact('community', 'posts'));
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

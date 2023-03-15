<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\StoreCommunityRequest;
use App\Http\Requests\Post\UpdateCommunityRequest;
use App\Http\Resources\CommunityResource;
use App\Models\Community;
use Illuminate\Http\Request;

class CommunityController extends Controller
{
    public function index()
    {
        return response()->json(Community::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCommunityRequest $request)
    {
        $community= Community::create([
            'title'=> $request->title,
            'body'=> $request->body,
            'user_id'=> $request->user_id,
            'community_id'=> $request->community_id,
        ]);
        return new CommunityResource($community);
    }

    /**
     * Display the specified resource.
     */
    public function show(Community $community)
    {
        return new CommunityResource($community);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCommunityRequest $request, Community $community)
    {
        $community -> update([
            'title'=> $request->title,
            'body'=> $request->body,
        ]);
        return new CommunityResource($community);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Community $community)
    {
        return $community->delete();
    }
}

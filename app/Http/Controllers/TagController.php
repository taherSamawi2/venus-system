<?php

namespace App\Http\Controllers;
use App\Http\Requests\TagRequest;
use App\Http\Resources\Tag as TagResource;
use App\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    //Show All Tags
    public function index()
    {
        $tags = Tag::paginate(10);
        return  TagResource::collection($tags);
    }

    //show a single Tag
    public function show(Tag $tag)
    {
        return new TagResource($tag);
    }

    //save the new Tag
    public function store(TagRequest $request){
        $tag = Tag::create([
            'name' => $request->name
        ]);
        return response()->json([
            "message" => "added successfully",
            "item" => "Tag",
            "data" => $tag
        ], 201);
    }

    // persist the edited Tag
    public function update(TagRequest $request,Tag $tag){
        $tag= $tag->update([
            'name' => $request->name
        ]);
        return response()->json([
            "message" => "successfully updated",
            "item" => "Tag",
            "data" => $tag
        ], 200);
    }

    // Delete Tag
    public function delete(Tag $tag){
        $tag->delete();
        return response()->json([
            "message" => "successfully deleted",
            "item" => "Tag",
        ], 204);
    }



}

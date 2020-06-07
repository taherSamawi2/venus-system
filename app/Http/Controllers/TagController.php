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
        $tags = Tag::all();
        return  TagResource::collection($tags);
    }

    //show a single Tag
    public function show(Tag $tag)
    {
        return new TagResource($tag);
    }

    // save the new Tag
    public function store(Tag $request){
        $validatedData  = $request->validated();
        Tag::create($validatedData);
        return response()->json('The Group was added successfully');
    }

    // show a view to edit Tag
    public function edit(Tag $tag){
        return new TagResource($tag);
    }

    // persist the edited Tag
    public function update(TagRequest $request,Tag $tag){
        $tag->update($request);
        return response()->json('successfully updated');
    }

    // Delete Tag
    public function delete(Tag $tag){
        $tag->delete();
        return response()->json('successfully deleted');
    }



}

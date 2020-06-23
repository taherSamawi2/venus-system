<?php

namespace App\Http\Controllers;
use App\Group;
use App\Http\Requests\GroupRequest;
use App\Http\Resources\Group as GroupResource;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    //Show All Groups
    public function index()
    {
        $Groups = Group::paginate(10);;
        return  GroupResource::collection($Groups);
    }

    //show a single Group
    public function show(Group $group)
    {
        return new GroupResource($group);
    }

    // save the new Group
    public function store(GroupRequest $request){
        $group = Group::create([
            'name' => $request->name
        ]);
        return response()->json([
            "message" => "added successfully",
            "item" => "Group",
            "data" => $group
        ], 201);
    }

    // persist the edited Group
    public function update(GroupRequest $request,Group $group){
        $group = $group->update([
            'name' => $request->name
        ]);
        return response()->json([
            "message" => "successfully updated",
            "item" => "Group",
            "data" => $group
        ], 200);
    }

    // Delete Group
    public function delete(Group $group){
        $group->delete();
        return response()->json([
            "message" => "successfully deleted",
            "item" => "Group",
        ], 204);
    }

}

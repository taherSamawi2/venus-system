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
        $Groups = Group::all();
        return  GroupResource::collection($Groups);
    }

    //show a single Group
    public function show(Group $group)
    {
        return new GroupResource($group);
    }

    // save the new Group
    public function store(GroupRequest $request){
        $validatedData = $request->validated();
        Group::create($validatedData);
        return response()->json('The Group was added successfully');
    }

    // show a view to edit Group
    public function edit(Group $group){
        return new GroupResource($group);
    }

    // persist the edited Group
    public function update(GroupRequest $request,Group $group){
        $group->update($request);
        return response()->json('successfully updated');
    }

    // Delete Group
    public function delete(Group $group){
        $group->delete();
        return response()->json('successfully deleted');
    }

}

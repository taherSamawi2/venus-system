<?php

namespace App\Http\Controllers;
use App\Http\Requests\ProjectRequest;
use App\Http\Resources\Project as ProjectResource;
use App\Project;
use App\Member;
use App\Customer;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /* Show All Projects */
    public function index()
    {
        $projects = Project::with('customer')->get();
        return ProjectResource::collection($projects);
    }

    //show a single Project
    public function show(Project $project)
    {
        return new ProjectResource($project::with('customer')->get());
    }

    // save the new project
    public function store(ProjectRequest $request)
    {
        $project = new Project();
        $project->name = $request->name;
        $project->customer_id = $request->customer;
        $project->description = $request->description;
        $project->billingType = $request->billingType;
        $project->status = $request->status;
        $project->totalRate = $request->totalRate;
        $project->estimatedHours = $request->estimatedHours;
        $project->date_start = $request->dateStart;
        $project->deadline = $request->deadline;
        $project->save();
        if ($request->has('tags')) {
            $project->tags()->attach($request->tags);
        }
        return response()->json('The project was added successfully');
    }

    // show a view to edit project
    public function edit(Project $project)
    {
        return new ProjectResource($project::with('customer')->get());
    }

    // persist the edited project
    public function update(ProjectRequest $request, Project $project)
    {
        $project->update([
            'name' => $request->name,
            'customer_id' => $request->customer,
            'description' => $request->description,
            'billingType' => $request->billingType,
            'status' => $request->status,
            'totalRate' => $request->totalRate,
            'estimatedHours' => $request->estimatedHours,
            'dateStart' => $request->dateStart,
            'deadline' => $request->deadline,
        ]);
        if($request->has('tags')) {
            $project->groups()->sync($request->tags,false);
        }
        return response()->json('successfully updated');
    }

    // Delete Project
    public function delete(Project $project)
    {
        $project->delete();
        return response()->json('successfully deleted');
    }

}

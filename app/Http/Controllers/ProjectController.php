<?php
namespace App\Http\Controllers;
use App\Http\Requests\ProjectRequest;
use App\Http\Resources\Project as ProjectResource;
use App\Project;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Auth\Access\Gate;
class ProjectController extends Controller
{
    public function __construct()
    {
    }
    /* Show All Projects */
    public function index()
    {
        $projects = Project::paginate(10);
        return ProjectResource::collection($projects);

    }

    //show a single Project
    public function show(Project $project)
    {
        return new ProjectResource($project);
    }

    //save the new project
    public function store(ProjectRequest $request)
    {
        $project  = $this->SaveProject($request , new Project());
        return response()->json([
            "message" => "added successfully",
            "item" => "project",
            "data" => $project
        ], 201);
    }

    public function SaveProject($request ,$project)
    {
        $project->name = $request->name;
        $project->customer_id = $request->customer;
        $project->description = $request->description;
        $project->status = $request->status;
        $project->totalRate = $request->totalRate;
        $project->estimatedHours = $request->estimatedHours;
        $project->dateStart = $request->dateStart;
        $project->deadline = $request->deadline;
        $project->save();
        if ($request->has('tags')) {
            $project->tags()->sync($request->tags,false);
        }
        return $project;
    }

    // persist the edited project
    public function update(Request $request,Project $project )
    {
        $project  = $this->SaveProject($request,$project);
        return response()->json([
            "message" => "successfully updated",
            "item" => "project",
            "data" => $project
        ], 200);
    }

    // Delete Project
    public function delete(Project $project)
    {
        $project->delete();
        return response()->json([
            "message" => "successfully deleted",
            "item" => "project",
        ], 204);
    }

}

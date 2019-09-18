<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProjectValidationRequest;
use Illuminate\Http\Request;
use App\Project;
use App\Team;
use App\User;

class ProjectController extends UserController
{
    

    public function index(){
        $projects = Project::all();
        return view('projects.index')->with('projects',$projects);
    }

    public function create(){
        return view('projects.create');
    }

    public function assign($id){
        $teams = Team::all();
        $project = Project::find($id);
        return view('projects.assign',['teams' => $teams, 'project' => $project]);
    }

    public function store(ProjectValidationRequest $request){
        $project = new Project;

        $project->title = $request->input('title');
        $project->description = $request->input('description');
        $project->start_date = $request->input('start_date');
        $project->end_date = $request->input('end_date');
        $project->duration = $request->input('duration');
        $project->department = $request->input('department');

        $project->save();
        return back()->with('projectSuccess','Project successfully created!');
    }

    public function changeID(Request $request,$id){
        $teamName = $request->teamName;
        $team = Team::where('name',$teamName)->first();
        $team->project_id = $id;
        $team->save();
        return back()->with('assignSuccess','Team assigned successfully!');
    }

    public function myProject($username){
        $user = User::where('username',$username)->first();
        $team_id = $user->team_id;
        if($team_id == null)
            return view('projects.none');
        else{
            $team = Team::where('id',$team_id)->first();
            if($team->project_id == null){
                return view('projects.none');
            }
        }
        $project = Project::where('id',$team->project_id)->first();
        return view('projects.myProject')->with('project',$project);
    }
}

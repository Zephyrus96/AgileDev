<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use App\User;
use App\Team;

class TeamController extends UserController
{
    public function index(){
        $teams = Team::all();
        return view('teams.index')->with('teams',$teams);
    }

    public function create(){
        $users= User::all();
        return view("teams.create")->with('users',$users);
    }

    public function store(Request $request){
        #Create a new team.
        $team = new Team;
        $id = DB::table('teams')->max('id') + 1;
        $team->name = 'Team '.$id;

        #Get the data from the form.
        $scrum_master = $request->scrum_masters;
        $developer = $request->developers;
        $product_owner = $request->product_owners;

        Log::info("Scrum master: ".$scrum_master);
        Log::info("Developer: ".$developer);
        Log::info("Product Owner: ".$product_owner);

        // Check if any of the data is null
        if(empty($scrum_master) || empty($developer) || empty($product_owner)){
            return back()->with('teamFail','One or more team members are missing.');
        }

        #Get the rows from the users table.
        $selected_scrum_master = User::where('username',$scrum_master)->first();
        $selected_developer = User::where('username',$developer)->first();
        $selected_product_owner = User::where('username',$product_owner)->first();

        #Fill the fields and save the new team.
        $team->scrum_master = $selected_scrum_master->username;
        $team->product_owner = $selected_product_owner->username;
        $team->developer = $selected_developer->username;
        $team->save();
        
        #Assign the newly created team's id to the selected users' team_id.
        $selected_scrum_master->team()->associate($id);
        $selected_developer->team()->associate($id);
        $selected_product_owner->team()->associate($id);
        $selected_scrum_master->save();
        $selected_developer->save();
        $selected_product_owner->save();

        return back()->with('teamSuccess','Team successfully created!');
    }

    public function myTeam($username){
        $user = User::where('username',$username)->first();
        if($user->team_id==null){
            return view('teams.none');
        }
        else{
            $team = Team::where('id',$user->team_id)->first();
            return view('teams.myTeam')->with('team',$team);
        }
    }
}

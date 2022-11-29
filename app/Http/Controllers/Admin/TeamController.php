<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Team;
use App\Models\Owner;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Str;



class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    $user = Auth::user();
    $user->authorizeRoles('admin');
    //lazy loading gets all teams
    // $teams = Team::all();

    //eager loading
    // $teams = Team::with('owner')->get();

    //gets teams and paginates by 10
    $teams = Team::paginate(10);

    //fetch Teams in order of when they were last update - latest updated returned first
    //paginate displays whatever amount is placed e.g i have 10
    // $teams = Team::where('user_id', Auth::id())->latest('updated_at')->paginate(10);
    
    //die and dump
    //dd($teams);
    return view('admin.teams.index')->with('teams', $teams);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        $user->authorizeRoles('admin');

        $owners = Owner::all();
        //shows the create view from create.blade.php
        return view('admin.teams.create')->with('owners',$owners);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        //   dd($request);
        $request->validate([
            'name' => 'required|max:120',
            'category' => 'required',
            'description' => 'required',
            'team_image' => 'required',
            'owner_id' => 'required',
            
        ]);
        //creating variable for image and its extension
        $team_image = $request->file('team_image');
        $extension = $team_image->getClientOriginalExtension();

        //file name has to be unique so i added in this for a unqiue name so it can be definitly be found
        $filename= date('Y-m-d-His') . '_' . $request->input('title') . '.' . $extension;
        
        // store the file $team_image in /public/images, and name is $filename
        $path = $team_image->storeAs('public/images', $filename);

        // Creating a new team function
            $team = new Team;

            // $team->uuid = Str::uuid();
            $team->user_id =Auth::id();
            $team->name =$request->name;
            $team->category =$request->category;
            $team->description =$request->description;
            $team->team_image =$filename;
            $team->owner_id = $request->owner_id;

            $team->save();
            
      

        return to_route('admin.teams.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Team $team)
    {
        //if statement which doesnt allow another user to view other teams
        // if($team->user_id != Auth::id()){
        //     return abort(403);
        // }
        //This shows the information of the chosen id under that specific user
        // $team = Team::where('uuid',$uuid)->where('user_id',Auth::id())->first();
        return view('admin.teams.show')->with('team',$team);

    }  

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Team $team)
    {
        $user = Auth::user();
        $user->authorizeRoles('admin');

        $owners = Owner::all();
          //if statement which doesnt allow another user to edit other teams
        //   if($team->user_id != Auth::id()){
        //     return abort(403);
        // }
        //This shows the information of the chosen id under that specific user
        return view('admin.teams.edit')->with('team',$team)->with('owners',$owners);

     
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Team $team)
    {
   
             //creating variable for image and its extension
             $team_image = $request->file('team_image');
             $extension = $team_image->getClientOriginalExtension();
     
             //file name has to be unique so i added in this for a unqiue name so it can be definitly be found
             $filename= date('Y-m-d-His') . '_' . $request->input('title') . '.' . $extension;
             
             // store the file $team_image in /public/images, and name is $filename
             $path = $team_image->storeAs('public/images', $filename);

         //if statement which doesnt allow another user to update other teams
        //  if($team->user_id != Auth::id()){
        //     return abort(403);
        // }

        // dd($request);
        //validates updated database
        $request->validate([
            'name' => 'required|max:120',
            'category' => 'required',
            'description' => 'required',
            'owner_id' => 'required',
            // 'team_image' => 'required'
        ]);
            //updates the variables in database
        $team->update([
            'name' => $request->name,
            'category' => $request->category,
            'description' => $request->description,
            'team_image' => $filename,
            'owner_id' => $request->owner_id
        ]);

        return to_route('admin.teams.show',$team);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Team $team)
    {
         //if statement which doesnt allow another user to update other teams
        //  if($team->user_id != Auth::id()){
        //     return abort(403);
        // }
        //deletes the team
        $team->delete();

        return to_route('admin.teams.index');
    }
}

    

<?php

namespace App\Http\Controllers;
use App\Models\Team;
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
    //fetch Teams in order of when they were last update - latest updated returned first
    //paginate displays whatever amount is placed e.g i have 10
    $teams = Team::where('user_id', Auth::id())->latest('updated_at')->paginate(10);
    //dd($teams);
    return view('teams.index')->with('teams', $teams);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //shows the create view from create.blade.php
        return view('teams.create');

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
            // 'team_image' => 'required'
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

            $team->user_id =Auth::id();
            // $team->uuid = Str::uuid();
            $team->name =$request->name;
            $team->category =$request->category;
            $team->description =$request->description;
            $team->team_image =$filename;
            

            $team->save();
            
      

        return to_route('teams.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //This shows the information of the chosen id under that specific user
        $team = Team::where('id',$id)->where('user_id',Auth::id())->first();
        return view('teams.show')->with('team',$team);

    }  

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

    

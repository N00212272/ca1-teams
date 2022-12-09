<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sponsor;
use Illuminate\Support\Facades\Auth;

//controller for sponsor 
class SponsorController extends Controller
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

       $sponsors = Sponsor::all();

        return view('admin.sponsors.index')->with('sponsors', $sponsors);
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

        //shows the create view from create.blade.php
        return view('admin.sponsors.create');
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
            'address' => 'required',
            'bio' => 'required'
        ]);

        $sponsor = new Sponsor;

        $sponsor->name =$request->name;
        $sponsor->address =$request->address;
        $sponsor->bio =$request->bio;

        $sponsor->save();
        
  

    return to_route('admin.sponsors.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(sponsor $sponsor)
    {
        $user = Auth::user();
        $user->authorizeRoles('admin');

        if(!Auth::id()) {
           return abort(403);
         }


        return view('admin.sponsors.show')->with('sponsor', $sponsor);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Sponsor $sponsor)
    {
        $user = Auth::user();
        $user->authorizeRoles('admin');
        

        return view('admin.sponsors.edit')->with('sponsor',$sponsor);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sponsor $sponsor)
    {
           //   dd($request);
           $request->validate([
            'name' => 'required|max:120',
            'address' => 'required',
            'bio' => 'required'
        ]);

        $sponsor->update([
            'name' => $request->name,
            'address' => $request->address,
            'bio' => $request->bio,
          
        ]);

 
        
  

    return to_route('admin.sponsors.show', $sponsor);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sponsor $sponsor)
    {
        $sponsor->delete();

        return to_route('admin.sponsors.index');
    }
}

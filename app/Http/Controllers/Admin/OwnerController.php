<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Owner;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;



class OwnerController extends Controller
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

       $owners = Owner::all();

        return view('admin.owners.index')->with('owners', $owners);
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
        return view('admin.owners.create');
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
            'address' => 'required'
        ]);

        $owner = new Owner;

        $owner->name =$request->name;
        $owner->address =$request->address;

        $owner->save();
        
  

    return to_route('admin.owners.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Owner $owner)
    {
        $user = Auth::user();
        $user->authorizeRoles('admin');

        if(!Auth::id()) {
           return abort(403);
         }


        return view('admin.owners.show')->with('owner', $owner);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Owner $owner)
    {
        $user = Auth::user();
        $user->authorizeRoles('admin');

        return view('admin.owners.edit')->with('owner',$owner);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Owner $owner)
    {
                //   dd($request);
                $request->validate([
                    'name' => 'required|max:120',
                    'address' => 'required'
                ]);
        
                $owner = new Owner;
        
                $owner->name =$request->name;
                $owner->address =$request->address;
        
                $owner->save();
                
          
        
            return to_route('admin.owners.show', $owner);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Owner $owner)
    {
        $owner->delete();

        return to_route('admin.owners.index');
    }
}

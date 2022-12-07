<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Admin;
use App\Models\Owner;
use App\Models\Sponsor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{
       /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index(Request $request)
    {

        $user = Auth::user();
        $home = 'home';

        if($user->hasRole('admin')){
            $home = 'admin.teams.index';
        }
        else if ($user->hasRole('user')){
            $home = 'user.teams.index';
        }
        return redirect()->route($home);
    }
    //This function brings you to the owner index
    public function ownerIndex(Request $request)
    {

        $user = Auth::user();
        $home = 'home';

        if($user->hasRole('admin')){
            $home = 'admin.owners.index';
        }
        else if ($user->hasRole('user')){
            $home = 'user.owners.index';
        }
        return redirect()->route($home);
    }
     //This function brings you to the Sponsors index
     public function sponsorIndex(Request $request)
     {
 
         $user = Auth::user();
         $home = 'home';
 
         if($user->hasRole('admin')){
             $home = 'admin.sponsors.index';
         }
         else if ($user->hasRole('user')){
             $home = 'user.sponsors.index';
         }
         return redirect()->route($home);
     }
     
 }
    

<?php
//Tells VSC where to find teamcontroller
use App\Http\Controllers\TeamController;
use App\Http\Controllers\Admin\TeamController as AdminTeamController;
use App\Http\Controllers\User\TeamController as UserTeamController;
use App\Http\Controllers\Admin\OwnerController as AdminOwnerController;
use App\Http\Controllers\User\OwnerController as UserOwnerController;

use Illuminate\Support\Facades\Route;
use App\Models\Team;
use App\Models\Owner;
use Illuminate\Support\Facades\Input;


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home.index');

//This is the controller for owners
Route::get('/home/owners', [App\Http\Controllers\HomeController::class, 'OwnerIndex'])->name('home.owner.index');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

//This line create a route every function in the team resource controller
// Route::resource('/teams', TeamController::class)->middleware(['auth']);
Route::resource('/admin/teams', AdminTeamController::class)->middleware(['auth'])->names('admin.teams');

Route::resource('/user/teams', UserTeamController::class)->middleware(['auth'])->names('user.teams')->only(['index', 'show']);

Route::resource('/admin/owners', AdminOwnerController::class)->middleware(['auth'])->names('admin.owners');

Route::resource('/user/owners', UserOwnerController::class)->middleware(['auth'])->names('user.owners')->only(['index', 'show']);


// This function searchs through the db for the input at any position in "name" 
Route::post ( '/search', function () {
	$q = Request::input ( 'q' );

	if($q != ""){
		$team = Team::where ( 'name', 'LIKE', '%' . $q . '%' )->get ();
		if (count ( $team ) > 0)
			return view ( 'query' )->withDetails ( $team )->withQuery ( $q );
		else
			return view ( 'query' )->withMessage( 'No Details found. Return back to TEAMS!');
	}
	
	return view ( 'search-functionality-in-laravel/query' )->withMessage ( 'No Details found. Try to search again !' );
} );

require __DIR__.'/auth.php';

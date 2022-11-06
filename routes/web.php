<?php
//Tells VSC where to find teamcontroller
use App\Http\Controllers\TeamController;
use Illuminate\Support\Facades\Route;
use App\Models\Team;
use Illuminate\Support\Facades\Input;




Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

//This line create a route every function in the team resource controller
Route::resource('/teams', TeamController::class)->middleware(['auth']);

Route::post ( '/search', function () {
	$q = Request::input ( 'q' );

	if($q != ""){
		$team = Team::where ( 'name', 'LIKE', '%' . $q . '%' )->get ();
		if (count ( $team ) > 0)
			return view ( 'welcome' )->withDetails ( $team )->withQuery ( $q );
		else
			return view ( 'welcome' )->withMessage ( 'No Details found. Try to search again !' );
	}
	
	return view ( 'search-functionality-in-laravel/welcome' )->withMessage ( 'No Details found. Try to search again !' );
} );

require __DIR__.'/auth.php';

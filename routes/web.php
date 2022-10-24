<?php
//Tells VSC where to find teamcontroller
use App\Http\Controllers\TeamController;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

//This line create a route every function in the team resource controller
Route::resource('/teams', TeamController::class)->middleware(['auth']);

require __DIR__.'/auth.php';

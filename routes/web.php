<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MoviesController;
// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [MoviesController::class, 'index'])->name('movies.index');
// The controller is the class that will handle what happens when you send a get request.
// the '/' is path that the route responds to. The controller is a class and the 'index' is a method in the class. the movies.index is the name of the route. Inside the controller we view the index page or any corresponding page.
Route::get('/movies/{movie}', [MoviesController::class, 'show'])->name('movies.show');

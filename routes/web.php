<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});


//routes qui s'affiche que quand on est connecter
Route::middleware(['auth:sanctum', 'verified'])->group(function () {

    //pour les user
    Route::get('/dashboard','App\Http\Controllers\UserController@dashboard')->name('dashboard');
    Route::get('/user/{id}','App\Http\Controllers\UserController@show')->name('user.show');
    Route::get('/search/user/{search}', 'App\Http\Controllers\UserController@search')->name('user.search');
    Route::post('/abonnement/sabonné','App\Http\Controllers\UserController@sabonné')->name('user.sabonné');

    //pour les cours
    Route::resource('/cours', 'App\Http\Controllers\CoursController');
    Route::get('/search/{search}', 'App\Http\Controllers\CoursController@search')->name('cours.search');
    
    //pour les episodes
    Route::prefix('/cours/{cour}')->group(function () {
        Route::resource('/episodes', 'App\Http\Controllers\EpisodesController');
    });
    Route::post('/episodes/ToggelProg','App\Http\Controllers\EpisodesController@toggelProg')->name('episode.toggel');

    //pour le darkmod
    Route::get('/dark', 'App\Http\Controllers\UserController@dark')->name('dark');
   
});
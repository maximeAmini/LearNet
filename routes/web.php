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
Route::group(['auth:sanctum', 'verified'], function(){
    Route::get('/dashboard','App\Http\Controllers\UserController@dashboard')->name('dashboard');
    Route::get('/user/{id}','App\Http\Controllers\UserController@show')->name('user.show');

    //pour les cours
    Route::resource('/cours', 'App\Http\Controllers\CoursController');
    Route::get('/search/{search}', 'App\Http\Controllers\CoursController@search');
    
    //pour les episodes
    Route::prefix('/cours/{cour}')->group(function () {
        Route::resource('/episodes', 'App\Http\Controllers\EpisodesController');
    });
    Route::post('/episodes/ToggelProg','App\Http\Controllers\EpisodesController@toggelProg')->name('episode.toggel');
   
});
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

Route::get('/cours','App\Http\Controllers\CoursController@index')->name('cours');

Route::group(['auth:sanctum', 'verified'], function(){

    Route::get('/dashboard','App\Http\Controllers\PagesController@dashboard')->name('dashboard');

    //pour les cours
    Route::prefix('/cours')->group(function () {
        Route::get('/add', 'App\Http\Controllers\CoursController@add')->name('cours.add');
        Route::post('/add', 'App\Http\Controllers\CoursController@store')->name('cours.add');

        Route::prefix('/{id}')->group(function () {
            Route::get('/', 'App\Http\Controllers\CoursController@show')->name('cours.show');
            //pour les episodes
            Route::prefix('/episodes')->group(function () {
                Route::get('/', 'App\Http\Controllers\CoursController@show')->name('cours.show');
                Route::get('/{idE}','App\Http\Controllers\EpisodesController@show')->name('episode.show');
            });//end episodes prifix

        });//end cours/id prefix

    });//end cours prefix

    Route::post('/episodes/ToggelProg','App\Http\Controllers\EpisodesController@toggelProg')->name('episode.toggel');

});
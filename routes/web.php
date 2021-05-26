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

    Route::get('/dashboard',function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');

    Route::prefix('/cours')->group(function () {
        Route::get('/{id}', 'App\Http\Controllers\CoursController@show')->name('cours.show');
    });

    Route::prefix('/episodes')->group(function () {
        Route::get('/{id}','App\Http\Controllers\EpisodesController@show')->name('episode.show');
    });



    /*
    Route::get('/cours/{id}','App\Http\Controllers\CoursController@show')->name('cours.show');
    Route::get('/episode/{id}/','App\Http\Controllers\EpisodesController@show')->name('episode.show');
    */

});
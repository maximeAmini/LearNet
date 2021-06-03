<?php
Route::prefix('/cours')->group(function () {
        Route::get('/add', 'App\Http\Controllers\CoursController@add')->name('cours.add');
        Route::post('/add', 'App\Http\Controllers\CoursController@store')->name('cours.add');
        // cours/idCours
        Route::prefix('/{id}')->group(function () {
            Route::get('/', 'App\Http\Controllers\CoursController@show')->name('cours.show');
            Route::get('/edit', 'App\Http\Controllers\CoursController@edit')->name('cours.edit');
            Route::patch('/edit', 'App\Http\Controllers\CoursController@update')->name('cours.edit');
            Route::delete('/delete', 'App\Http\Controllers\CoursController@destroy')->name('cours.delete');
            //pour les episodes
            Route::prefix('/episodes')->group(function () {
                Route::get('/add','App\Http\Controllers\EpisodesController@add')->name('episode.add');
                Route::post('/add','App\Http\Controllers\EpisodesController@store')->name('episode.store');
                // episoides/idEp
                Route::prefix('/{idE}')->group(function () {
                    Route::get('/','App\Http\Controllers\EpisodesController@show')->name('episode.show');
                    Route::get('/edit', 'App\Http\Controllers\EpisodesController@edit')->name('episode.edit');
                    Route::patch('/edit', 'App\Http\Controllers\EpisodesController@update')->name('episode.edit');
                    Route::delete('/delete', 'App\Http\Controllers\EpisodesController@destroy')->name('episode.delete');
                });//end id ep prefix
            });//end episodes prifix
        });//end cours/id prefix
    });//end cours prefix
    Route::post('/episodes/ToggelProg','App\Http\Controllers\EpisodesController@toggelProg')->name('episode.toggel');
<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'api'], function () {
    Route::group(['prefix' => 'sample', 'middleware' => ['auth:sanctum'], 'namespace' => 'App\Http\Controllers\Api', 'as' => ''], function () {
        Route::match(['get', 'head'], 'list', 'SampleController@index')->name('api.sample.list');
        Route::match(['get', 'head'], '{model}/read', 'SampleController@show')->name('api.sample.show');
        Route::match(['post'], 'store', 'SampleController@store')->name('api.sample.store');
        Route::match(['put', 'patch'], '{model}/update', 'SampleController@update')->name('api.sample.update');
        Route::match(['delete'], '{model}/delete', 'SampleController@destroy')->name('api.sample.destroy');
    });
});

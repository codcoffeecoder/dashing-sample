<?php

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['web', 'auth_admin', 'can:access-admin-panel']], function () {
    Route::group(['prefix' => 'sample', 'as' => '', 'namespace' => 'App\Http\Controllers\Admin'], function () {
        Route::match(['get'], '', 'SampleController@index')->name('sample');
        Route::match(['get'], '{model}/read', 'SampleController@show')->name('sample.show');
        Route::match(['get'], 'create', 'SampleController@create')->name('sample.create');
        Route::match(['post'], 'create', 'SampleController@store')->name('sample.store');
        Route::match(['get'], '{model}/edit', 'SampleController@edit')->name('sample.edit');
        Route::match(['put', 'patch'], '{model}/edit', 'SampleController@update')->name('sample.update');
        Route::match(['delete'], '{model}/delete', 'SampleController@destroy')->name('sample.destroy');
        
    });
});

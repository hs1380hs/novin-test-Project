<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CountryController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/search-ajax', function () {
    return view('searchAjax');
});

Route::get('/import-countries', [CountryController::class, 'importCountriesData']);
Route::get('/search', 'App\Http\Controllers\SearchController@index');



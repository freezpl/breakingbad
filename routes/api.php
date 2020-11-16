<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


//api
Route::group(['middleware' => ['auth:api']], function(){
    Route::get('episodes', 'Api\EpisodesController@list');
    Route::get('episodes/{id}', 'Api\EpisodesController@getById')->where('id', '[0-9]+');
    
    Route::get('characters', 'Api\CharactersController@list');
    Route::get('characters/random', 'Api\CharactersController@random');
    
    Route::get('quotes', 'Api\QuotesController@list');
    Route::get('quotes/random', 'Api\QuotesController@randomQuoteByAuthorName');
});


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
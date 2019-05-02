<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::group(['middleware' => ['web']], function () {
    Route::any('station/index', ['uses' => 'StationController@index']);
    Route::any('station/save', ['uses' => 'StationController@save']);
    Route::any('station/success', ['uses' => 'StationController@success']);
    Route::any('station/draw', ['uses' => 'StationController@draw']);
    Route::any('station/ticket', ['uses' => 'StationController@ticket']);
    Route::any('station/portal', ['uses' => 'StationController@portal']);
});
Route::get('/', function () {
    return view('welcome');
});

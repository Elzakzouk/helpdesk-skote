<?php

use App\Http\Controllers\CityController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Auth::routes(['register' => false]);

Route::get('/', [App\Http\Controllers\HomeController::class, 'root'])->name('root');


//Update User Details
Route::post('/update-profile/{id}', [App\Http\Controllers\HomeController::class, 'updateProfile'])->name('updateProfile');
Route::post('/update-password/{id}', [App\Http\Controllers\HomeController::class, 'updatePassword'])->name('updatePassword');



// Route::group(['prefix' => 'users'], function() {
//     Route::get('/', 'UsersController@index')->name('users.index');
//     Route::get('/create', 'UsersController@create')->name('users.create');
//     Route::post('/create', 'UsersController@store')->name('users.store');
//     Route::get('/{user}/show', 'UsersController@show')->name('users.show');
//     Route::get('/{user}/edit', 'UsersController@edit')->name('users.edit');
//     Route::patch('/{user}/update', 'UsersController@update')->name('users.update');
//     Route::delete('/{user}/delete', 'UsersController@destroy')->name('users.destroy');
//     Route::post('/{user}/restore', 'UsersController@restore')->name('users.restore');
//     Route::delete('/{user}/force-delete', 'UsersController@forceDelete')->name('users.force-delete');
//     Route::post('/restore-all', 'UsersController@restoreAll')->name('users.restore-all');
// });











route::get('/archive', [CityController::class,'trashed']);

Route::resource('cities', CityController::class);
Route::delete('/cities/{city}/force-delete', [CityController::class,'forceDelete'])->name('cities.force-delete');
Route::post('/cities/{city}/restore', [CityController::class,'restore'])->name('cities.restore');


Route::get('{any}', [App\Http\Controllers\HomeController::class, 'index'])->name('index');

//Language Translation
Route::get('index/{locale}', [App\Http\Controllers\HomeController::class, 'lang']);

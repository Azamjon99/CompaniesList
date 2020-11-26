<?php

use Illuminate\Support\Facades\Artisan;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');



Route::group(['middleware'=>'auth'], function(){
    Route::resource('companies', App\Http\Controllers\Resources\CompaniesController::class)->middleware('auth');
    Route::resource('employees', App\Http\Controllers\Resources\ReestrController::class,  ['except' => 'store']);
    Route::post('employees/{id}', [
        'as' => 'employees.store',
        'uses' => 'App\Http\Controllers\Resources\ReestrController@store'
    ]);
});
// Update image
Route::post('/company/update/{id}', [App\Http\Controllers\HomeController::class, 'update'])->name('updateImage');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/foo', function () {
    Artisan::call('storage:link');
});

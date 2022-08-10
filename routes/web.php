<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Conf\RoleController;
use App\Http\Controllers\Conf\UserController;
use App\Http\Controllers\HomeController;

Auth::routes();

Route::get('/', function () {
    return view('auth.login');
});


Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth']], function() {
    //Home 

    

    
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
});

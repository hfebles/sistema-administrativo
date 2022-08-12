<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Conf\RoleController;
use App\Http\Controllers\Conf\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Conf\CompaniaController;
use App\Http\Controllers\Conf\MenuController;

use App\Http\Controllers\Accounting\LedgerAccountController;
use App\Http\Controllers\Accounting\SubLedgerAccountController;
use App\Http\Controllers\Accounting\SubGroupController;
use App\Http\Controllers\Accounting\GroupController;
use App\Http\Controllers\Accounting\AccountingEntriesController;
use App\Http\Controllers\Accounting\RecordAccoutingController;

Auth::routes();

Route::get('/', function () {
    return view('auth.login');
});


Route::get('/', [HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth']], function() {


    

    
    Route::resource('/mantenice/roles', RoleController::class);
    
    // Users
    Route::resource('/mantenice/users', UserController::class);
    Route::get('/mantenice/users/profile/{id}', [UserController::class, 'profile'])->name('users.profile');


    // Compañia
    Route::resource('/mantenice/compania', CompaniaController::class);

    // menus
    Route::resource('/mantenice/menu', MenuController::class);


    /**
     * 
     * CONTABILIDAD
     * 
     */

    Route::resource('/accounting/ledger-account', LedgerAccountController::class);
    Route::resource('/accounting/sub-ledger-account', SubLedgerAccountController::class);
    Route::resource('/accounting/sub-group-accounting', SubGroupController::class);
    Route::resource('/accounting/group-accounting', GroupController::class);

    Route::resource('/accounting/accounting-entries', AccountingEntriesController::class);
    Route::resource('/accounting/accounting-records', RecordAccoutingController::class);

     

});

<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;

use App\Http\Controllers\Conf\RoleController;
use App\Http\Controllers\Conf\UserController;
use App\Http\Controllers\Conf\CompaniaController;
use App\Http\Controllers\Conf\MenuController;
use App\Http\Controllers\Conf\Warehouse\ProductCategoryController;
use App\Http\Controllers\Conf\Warehouse\PresentationProductController;
use App\Http\Controllers\Conf\Warehouse\UnitProductController;

use App\Http\Controllers\Accounting\LedgerAccountController;
use App\Http\Controllers\Accounting\SubLedgerAccountController;
use App\Http\Controllers\Accounting\SubGroupController;
use App\Http\Controllers\Accounting\GroupController;
use App\Http\Controllers\Accounting\AccountingEntriesController;
use App\Http\Controllers\Accounting\RecordAccoutingController;

use App\Http\Controllers\Warehouse\WarehouseController;

use App\Http\Controllers\Products\ProductController;

use App\Http\Controllers\Sales\ClientController;




Auth::routes();

Route::get('/', function () {
    return view('auth.login');
});


Route::get('/', [HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth']], function() {


    /**
     * 
     * CONFIGURACIONES
     * 
     */

    
    Route::resource('/mantenice/roles', RoleController::class);
    
    // Users
    Route::resource('/mantenice/users', UserController::class);
    Route::get('/mantenice/users/profile/{id}', [UserController::class, 'profile'])->name('users.profile');


    // Compañia
    Route::resource('/mantenice/compania', CompaniaController::class);

    // menus
    Route::resource('/mantenice/menu', MenuController::class);

    // PRODUCTOS
    Route::resource('/mantenice/product/category', ProductCategoryController::class);
    Route::resource('/mantenice/product/unit', UnitProductController::class);
    Route::resource('/mantenice/product/presentation', PresentationProductController::class);

    /**
     * 
     * FIN CONFIGURACIONES
     * 
     */


    /**
     * 
     * CONTABILIDAD
     * 
     */

    // PLAN CONTABLE
    Route::resource('/accounting/ledger-account', LedgerAccountController::class);
    Route::resource('/accounting/sub-ledger-account', SubLedgerAccountController::class);
    Route::resource('/accounting/sub-group-accounting', SubGroupController::class);
    Route::resource('/accounting/group-accounting', GroupController::class);


    // ASIENTOS CONTABLES
    Route::resource('/accounting/accounting-entries', AccountingEntriesController::class);
    Route::resource('/accounting/accounting-records', RecordAccoutingController::class);

    /**
     * 
     * FIN CONTABILIDAD
     * 
     */


    /**
     * 
     * VENTAS
     * 
     */
    
    // CLIENTES

    Route::resource('/sales/clients', ClientController::class);
    Route::post('/sales/clients/search', [ClientController::class, 'searchCliente'])->name('clients.search-client');




     /**
     * 
     * FIN VENTAS
     * 
     */


    /**
     * 
     * ALMACEN
     * 
     */
    
    // ALMACEN

    Route::resource('/warehouse/warehouse', WarehouseController::class);
    
     /**
     * 
     * FIN ALMACEN
     * 
     */


     /**
     * 
     * PRODUCTOS
     * 
     */
    
    // PRODUCTOS

    Route::get('/products/product/salable', [ProductController::class, 'indexSalable'])->name('product.salable');
    Route::resource('/products/product', ProductController::class);
    Route::post('/products/product/search-code', [ProductController::class, 'searchCode'])->name('product.search-code');
    
    
    /**
    * 
    * FIN PRODUCTOS
    * 
    */
     
     

});

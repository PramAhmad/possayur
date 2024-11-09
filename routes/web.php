<?php

use App\Http\Controllers\ChartController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppsController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TableController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UtilityController;
use App\Http\Controllers\WidgetsController;
use App\Http\Controllers\SetLocaleController;
use App\Http\Controllers\ComponentsController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\CustomerGroupController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\DatabaseBackupController;
use App\Http\Controllers\GeneralSettingController;
use App\Http\Controllers\OutletController;
use App\Http\Controllers\PointOfSalesController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductPriceByCustomer;
use App\Http\Controllers\PurchaseOrderController;
use App\Http\Controllers\SalesOrderControllre;
use App\Http\Controllers\SuplierController;
use App\Models\Coupon;
use App\Models\SalesOrder;

require __DIR__ . '/auth.php';

Route::get('/', function () {
    return to_route('login');
});

Route::group(['middleware' => ['auth', 'verified']], function () {
    // Dashboards
    Route::get('dashboard', [HomeController::class, 'index'])->name('dashboard.index');
    // Locale
    Route::get('setlocale/{locale}', SetLocaleController::class)->name('setlocale');

    // User
    Route::resource('users', UserController::class);
    // Permission
    Route::resource('permissions', PermissionController::class)->except(['show']);
    // Roles
    Route::resource('roles', RoleController::class);
    // Profiles
    Route::resource('profiles', ProfileController::class)->only(['index', 'update'])->parameter('profiles', 'user');
    // outlets
    Route::resource('outlets', OutletController::class);
    // Env
    Route::singleton('general-settings', GeneralSettingController::class);
    Route::post('general-settings-logo', [GeneralSettingController::class, 'logoUpdate'])->name('general-settings.logo');

    // Database Backup
    Route::resource('database-backups', DatabaseBackupController::class);
    Route::get('database-backups-download/{fileName}', [DatabaseBackupController::class, 'databaseBackupDownload'])->name('database-backups.download');
    
    // data master
    Route::resource('category', CategoryController::class);
    Route::resource('brand', BrandController::class);
    Route::resource('customer_group', CustomerGroupController::class);
    Route::resource('customer', CustomerController::class);
    Route::resource('supplier', SuplierController::class);
    Route::resource('coupon',CouponController::class);

    Route::resource('product', ProductController::class);
    Route::get('product/{id}/customer',[ProductPriceByCustomer::class,'index'])->name('product.customer.index');
    Route::get('product/{id}/customer/create',[ProductPriceByCustomer::class,'create'])->name('product.customer.create');
    Route::post('product/{id}/customer',[ProductPriceByCustomer::class,'store'])->name('product.customer.store');
    Route::get('product/{id}/customer/{customer_id}/edit',[ProductPriceByCustomer::class,'edit'])->name('product.customer.edit');
    Route::put('product/{id}/customer/{customer_id}',[ProductPriceByCustomer::class,'update'])->name('product.customer.update');
    Route::delete('product/{id}/customer/{customer_id}',[ProductPriceByCustomer::class,'destroy'])->name('product.customer.destroy');
    
    Route::resource('purchaseorder', PurchaseOrderController::class);
    Route::get('pos/{outletuuid}', [PointOfSalesController::class, 'index'])->name('pos.index');

    Route::get('sales/order', [PointOfSalesController::class, 'index'])->name('salesorder.index');
    Route::get('pos/order/{id}', [PointOfSalesController::class, 'show'])->name('salesorder.show');

    Route::post('pos/order', [PointOfSalesController::class, 'store'])->name('salesorder.store');


    // sales order 
    Route::get('sales/order/{id}', [SalesOrderControllre::class, 'index'])->name('salesorder.list');
});


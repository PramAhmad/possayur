<?php

use App\Exports\ReturnSalesOrderExport;
use App\Http\Controllers\ChartController;
use App\Http\Controllers\InoviceController;
use App\Http\Controllers\InvoicePenagihanExportController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppsController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CertSignController;
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
use App\Http\Controllers\CurencyController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\CustomerGroupController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\DatabaseBackupController;
use App\Http\Controllers\GeneralSettingController;
use App\Http\Controllers\HistoryLogController;
use App\Http\Controllers\InvoicePenagihanController;
use App\Http\Controllers\InvoicePurchaseController;
use App\Http\Controllers\ListOrderController;
use App\Http\Controllers\OutletController;
use App\Http\Controllers\PointOfSalesController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductPriceByCustomer;
use App\Http\Controllers\PurchaseOrderController;
use App\Http\Controllers\PurchasePOSController;
use App\Http\Controllers\ReturnPurchaseController;
use App\Http\Controllers\ReturnSalesOrderController;
use App\Http\Controllers\ReturnSalesOrderExportController;
use App\Http\Controllers\SalesOrderController;
use App\Http\Controllers\SalesOrderExportController;
use App\Http\Controllers\StockOpNameController;
use App\Http\Controllers\SuplierController;
use App\Http\Controllers\SuratJalanController;
use App\Http\Controllers\SuratJalanExport;
use App\Http\Controllers\SuratJalanExportController;
use App\Http\Controllers\TaxController;
use App\Http\Controllers\UnitController;
use App\Models\Coupon;
use App\Models\SalesOrder;
use Illuminate\Support\Facades\Auth;
use Spatie\Activitylog\Models\Activity;

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
    // history log
    Route::get('history-log',[HistoryLogController::class,'index'])->name('history-log.index');
    // data master
    Route::resource('category', CategoryController::class);
    Route::resource('brand', BrandController::class);
    Route::resource('customer_group', CustomerGroupController::class);
    Route::resource('customer', CustomerController::class);
    Route::resource('supplier', SuplierController::class);
    Route::resource('coupon', CouponController::class);
    Route::resource('curency', CurencyController::class);
    Route::resource('tax', TaxController::class);
    Route::post('/taxes/make-active', [TaxController::class, 'makeActive'])
    ->name('tax.make-active');
    Route::get('/this/tax/get', [TaxController::class, 'getTax'])->name('tax.get');
    Route::post('/curencies/make-active', [CurencyController::class, 'makeActive'])->name('curency.make-active');
    // coupon.get
    Route::get('/this/coupon/get', [CouponController::class, 'getCoupon'])->name('coupon.get');
    Route::resource('unit', UnitController::class);

    Route::resource('product', ProductController::class);
    Route::get('product/{id}/customer', [ProductPriceByCustomer::class, 'index'])->name('product.customer.index');
    Route::get('product/{id}/customer/create', [ProductPriceByCustomer::class, 'create'])->name('product.customer.create');
    Route::post('product/{id}/customer', [ProductPriceByCustomer::class, 'store'])->name('product.customer.store');
    Route::get('product/{id}/customer/{customer_id}/edit', [ProductPriceByCustomer::class, 'edit'])->name('product.customer.edit');
    Route::put('product/{id}/customer/{customer_id}', [ProductPriceByCustomer::class, 'update'])->name('product.customer.update');
    Route::delete('product/{id}/customer/{customer_id}', [ProductPriceByCustomer::class, 'destroy'])->name('product.customer.destroy');
    Route::get('download/product/download-template', [ProductController::class, 'downloadTemplate'])
    ->name('product.download-template');
    // import
    Route::post('download/product/import-excel', [ProductController::class, 'import'])->name('product.import-excel');

    Route::resource('purchaseorder', PurchaseOrderController::class);
    Route::get('purchaseorder/{id}/products', [PurchaseOrderController::class, 'getProducts'])->name('purchaseorder.getProducts');
    // invoicepurchase
    Route::get('invoicepurchase', [InvoicePurchaseController::class, 'index'])->name('invoicepurchase.index');
    Route::get('invoicepurchase/show/{id}', [InvoicePurchaseController::class, 'show'])->name('invoicepurchase.show');
    Route::get('invoicepurchase/create', [InvoicePurchaseController::class, 'create'])->name('invoicepurchase.create');
    Route::post('invoicepurchase', [InvoicePurchaseController::class, 'store'])->name('invoicepurchase.store');
    Route::get('invoicepurchase/get-products/{id}', [InvoicePurchaseController::class, 'getProducts'])->name('invoicepurchase.getproduct');
    
    // return purchase
    Route::get('returnpurchase', [ReturnPurchaseController::class, 'index'])->name('returnpurchase.index');
    Route::get('returnpurchase/show/{id}', [ReturnPurchaseController::class, 'show'])->name('returnpurchase.show');
    Route::delete('returnpurchase/{id}', [ReturnPurchaseController::class, 'destroy'])->name('returnpurchase.destroy');


    Route::get('purchasepos', [PurchasePOSController::class, 'index'])->name('purchasepos.index');
    Route::get('purchasepos/{id}', [PurchasePOSController::class, 'show'])->name('purchasepos.show');
    Route::post('purchasepos', [PurchasePOSController::class, 'store'])->name('purchasepos.store');



    Route::get('/sales/order/list', [PointOfSalesController::class, 'index'])->name('pos.index');
    Route::get('pos/order/{id}', [PointOfSalesController::class, 'show'])->name('pos.show');
    Route::get('/search-products', [PointOfSalesController::class, 'searchProducts'])->name('pos.searchProducts');
    Route::get('/price-by-customer', [PointOfSalesController::class, 'getPriceByCustomer'])->name('pos.getPriceByCustomer');
    Route::post('pos/order', [PointOfSalesController::class, 'store'])->name('pos.store');


    // sales order 
    Route::resource('salesorder', SalesOrderController::class);

    // surat jalan
    Route::resource('suratjalan', SuratJalanController::class);
    Route::get('/suratjalan/get-products/{salesOrderId}', [SuratJalanController::class, 'getProducts'])->name('suratjalan.getProducts');
    Route::resource('invoice', InvoicePenagihanController::class);
    Route::get('/invoice/get-products/{salesOrderId}', [InvoicePenagihanController::class, 'getProducts'])->name('invoice.getProducts');
    Route::resource('returnsalesorder', ReturnSalesOrderController::class);
    Route::get('listorder', [ListOrderController::class, 'index'])->name('listorder.index');
    Route::get('listorder/{id}', [ListOrderController::class, 'show'])->name('listorder.show');
    Route::resource('stockopname', StockOpNameController::class);
    Route::get('json/stockopname/{id}', [StockOpNameController::class, 'showStock'])->name('stockopname.showStock');
    Route::get('download/stockopname/download-template', [StockOpnameController::class, 'downloadTemplate'])
    ->name('stockopname.download-template');
Route::post('download/stockopname/import-excel', [StockOpnameController::class, 'importExcel'])
    ->name('stockopname.import-excel');
    Route::post('json/stockopname/{id}/adjust', [StockOpNameController::class, 'adjust'])->name('stockopname.adjust');



    // export
    Route::get('export/salesorder', [SalesOrderExportController::class, 'export'])->name('salesorder.export');
    Route::get('export/suratjalan', [SuratJalanExportController::class, 'export'])->name('suratjalan.export');
    Route::get('export/invoice', [InvoicePenagihanExportController::class, 'export'])->name('invoice.export');
    Route::get('export/returnsalesorder', [ReturnSalesOrderExportController::class, 'export'])->name('returnsalesorder.export');
    Route::get('export/listorder', [ListOrderController::class, 'export'])->name('listorder.export');
    Route::get('export/stockopname', [StockOpNameController::class, 'export'])->name('stockopname.export');
    Route::get('export/purchaseorder', [PurchaseOrderController::class, 'export'])->name('purchaseorder.export');
    Route::get('export/invoicepurchase', [InvoicePurchaseController::class, 'export'])->name('invoicepurchase.export');
    Route::get('export/returnpurchase', [ReturnPurchaseController::class, 'export'])->name('returnpurchase.export');

    // pdf
    Route::get('pdf/salesorder/{id}', [SalesOrderExportController::class, 'pdf'])->name('salesorder.pdf');
    Route::get('pdf/suratjalan/{id}', [SuratJalanExportController::class, 'pdf'])->name('suratJalan.pdf');
    Route::get('pdf/invoice/{id}', [InvoicePenagihanExportController::class, 'pdf'])->name('invoice.pdf');
    Route::get('pdf/returnsalesorder/{id}', [ReturnSalesOrderExportController::class, 'pdf'])->name('returnsalesorder.pdf');
    Route::get('pdf/listorder', [ListOrderController::class, 'pdf'])->name('listorder.pdf');
    Route::get('pdf/purchaseorder/{id}', [PurchaseOrderController::class, 'pdf'])->name('purchaseorder.pdf');
    Route::get('pdf/invoicepurchase/{id}', [InvoicePurchaseController::class, 'pdf'])->name('invoicepurchase.pdf');
    Route::get('pdf/returnpurchase/{id}', [ReturnPurchaseController::class, 'pdf'])->name('returnpurchase.pdf');

    // print
    Route::get('print/suratjalan/{id}', [SuratJalanExportController::class, 'print'])->name('suratJalan.print');
    Route::get('print/salesorder/{id}', [SalesOrderExportController::class, 'print'])->name('salesorder.print');

    /** CERTIFICATE SIGN QZ.IO */
    Route::get('cert-sign', [CertSignController::class, 'index'])->name('cert-sign.index');
});

// test log

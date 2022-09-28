<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\{
    DashboardController,
    TestController,
    TransferController,
    PaymentController,
    SaleController,
    ExpenseController,
    IncomeController,
    TransactionController,
    TransactionStatsController,
    ClientController,
    InventoryStatsController,
    ProductsController,
    ProductCategoriesController,
    ReceiptController,
    ProviderController,
    PaymentMethodsController,

};



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

// Route::get('/', function () {
//     return view('auth.login');
// })->name('home');

Route::get('/admin-dashboard', [DashboardController::class, 'adminIndex'])->name('admin-dashboard');
Route::get('/sales-dashboard', [DashboardController::class, 'saleIndex'])->name('sale-dashboard');
Route::post('sale/store', ['as' => 'sales.store', 'uses' => 'App\Http\Controllers\SaleController@store']);
Route::get('/', [LoginController::class, 'Index']);
Route::prefix('admin')->group(function() {
    Route::post('/login-post', [LoginController::class, 'Login'])->name('loginPost');


    Route::prefix('/transactions')->group(function()
    {
        Route::get('/income', [IncomeController::class, 'index'])->name('income');
        Route::get('/transfers', [TransferController::class, 'index'])->name('transfer');
        Route::get('/sales', [SaleController::class, 'index'])->name('sales');
        Route::get('sales/{sale}', ['as' => 'sales.product.create', 'uses' => 'App\Http\Controllers\SaleController@createProductSale']);
        Route::get('/sales/{sale}/view', [SaleController::class, 'show'])->name('sales-view');
        Route::get('/sale/product/{id}', [ProductsController::class, 'fetchProduct'])->name('json-product');

        Route::get('/all', [TransactionController::class, 'index'])->name('transactions');
        Route::get('/stats', [TransactionStatsController::class, 'index'])->name('transaction-stats');

        Route::get('/show/{client}', [ClientController::class, 'show'])->name('clientShow');
        Route::get('/clients', [ClientController::class, 'index'])->name('clients');

        //post endpoint
        Route::post('/client', [ClientController::class, 'store'])->name('createClient');

    });
    Route::prefix('/inventory')->group(function()
    {
        Route::get('/receipts', [ReceiptController::class, 'index'])->name('inventory-receipt');
        Route::get('/receipts/{receipt}/create', [ReceiptController::class, 'create'])->name('receipt-create');
        Route::get('/receipts/{receipt}/view', [ReceiptController::class, 'show'])->name('receipt-view');
        Route::get('/categories', [ProductCategoriesController::class, 'index'])->name('inventory-category');
        Route::get('/categories/{product_categories}/view', [ProductCategoriesController::class, 'show'])->name('category-view');
        Route::get('/products', [ProductsController::class, 'index'])->name('inventory-product');
        Route::get('/products/view/{products}', [ProductsController::class, 'show'])->name('product-view');
        Route::get('/stats', [InventoryStatsController::class, 'index'])->name('inventory-stats');


    });
    Route::get('/suppliers', [ProviderController::class, 'index'])->name('supplier');
    Route::get('/suppliers/{provider}/view', [ProviderController::class, 'show'])->name('supplier-view');
    Route::get('/methods', [PaymentMethodsController::class, 'index'])->name('payment-methods');
    Route::get('/methods/{method}/view', [PaymentMethodsController::class, 'show'])->name('method-view');

    //post endpoint

    Route::post('/create/methods', [PaymentMethodsController::class, 'store'])->name('createMethod');
    Route::post('/category/create',[ProductCategoriesController::class, 'store'])->name('createCategory');
    Route::post('/product/create',[ProductsController::class, 'store'])->name('createProduct');

    Route::post('/create/provider',[ProviderController::class, 'store'])->name('createSupplier');






});

Route::post('sales/{sale}/product', ['as' => 'sales.product.store', 'uses' => 'App\Http\Controllers\SaleController@storeProduct']);
Route::get('transactions/{type}', ['as' => 'transactions.type', 'uses' => 'App\Http\Controllers\TransactionController@type']);
Route::get('transactions/{type}/create', ['as' => 'transactions.create', 'uses' => 'App\Http\Controllers\TransactionController@create']);
Route::post('transactions/store', ['as' => 'transactions.store', 'uses' => 'App\Http\Controllers\TransactionController@store']);
Route::get('transactions/{id}/print-sales', ['as' => 'sales.receipt.print', 'uses' => 'App\Http\Controllers\TransactionStatsController@showSales']);
Route::post('transfer/store', ['as' => 'transfer.store', 'uses' => 'App\Http\Controllers\TransferController@store']);
Route::post('receipt/store', ['as' => 'receipt.store', 'uses' => 'App\Http\Controllers\ReceiptController@store']);
Route::post('receipts/{receipt}/product', ['as' => 'receipts.product.store', 'uses' => 'App\Http\Controllers\ReceiptController@storeproduct']);
Route::get('products/{product}/edit', ['as' => 'products.edit', 'uses' => 'App\Http\Controllers\ProductsController@edit']);
Route::post('products/{product}/update', ['as' => 'products.update', 'uses' => 'App\Http\Controllers\ProductsController@update']);
Route::delete('products/{product}/delete', ['as' => 'products.delete', 'uses' => 'App\Http\Controllers\ProductsController@delete']);
Route::get('inventory/receipts/{receipt}/finalize', ['as' => 'receipts.finalize', 'uses' => 'App\Http\Controllers\ReceiptController@finalize']);
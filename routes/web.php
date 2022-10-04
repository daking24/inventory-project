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
    ProfileController,
    UserController,
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
Route::get('/', [LoginController::class, 'Index'])->name('login');
Route::prefix('admin')->group(function() {
    Route::post('/login-post', [LoginController::class, 'Login'])->name('loginPost');


    Route::prefix('/transactions')->group(function()
    {
        Route::get('/transfers', [TransferController::class, 'index'])->name('transfer');
        Route::delete('/transfer/{transfer}/delete', [TransferController::class, 'destroy'])->name('transfer.delete');
        Route::get('/sales', [SaleController::class, 'index'])->name('sales');
        Route::get('sales/{sale}', ['as' => 'sales.product.create', 'uses' => 'App\Http\Controllers\SaleController@createProductSale']);
        Route::get('/sales/{sale}/view', [SaleController::class, 'show'])->name('sales-view');
        Route::delete('/sales/{sale}/delete', [SaleController::class, 'destroy'])->name('sales.delete');
        Route::get('/sale/product/{id}', [ProductsController::class, 'fetchProduct'])->name('json-product');

        Route::get('/all', [TransactionController::class, 'index'])->name('transactions');
        Route::get('/stats', [TransactionStatsController::class, 'index'])->name('transaction-stats');

    });


        Route::get('/clients/{client}/show', [ClientController::class, 'show'])->name('clientShow');
        Route::get('/clients', [ClientController::class, 'index'])->name('clients');
        Route::post('/clients/{client}/update', [ClientController::class, 'update'])->name('clients.update');
        Route::delete('/clients/{client}/delete', [ClientController::class, 'destroy'])->name('clients.delete');

        //post endpoint
        Route::post('/client', [ClientController::class, 'store'])->name('createClient');
    Route::prefix('/inventory')->group(function()
    {
        Route::get('/receipts', [ReceiptController::class, 'index'])->name('inventory-receipt');
        Route::get('/receipts/{receipt}/create', [ReceiptController::class, 'create'])->name('receipt-create');
        Route::get('/receipts/{receipt}/view', [ReceiptController::class, 'show'])->name('receipt-view');
        Route::get('/categories', [ProductCategoriesController::class, 'index'])->name('inventory-category');
        Route::post('/categories/{category}/update', [ProductCategoriesController::class, 'update'])->name('inventory-category.update');
        Route::delete('/categories/{category}/delete', [ProductCategoriesController::class, 'destroy'])->name('inventory-category.delete');
        Route::get('/categories/{product_categories}/view', [ProductCategoriesController::class, 'show'])->name('category-view');
        Route::get('/products', [ProductsController::class, 'index'])->name('inventory-product');
        Route::get('/products/view/{products}', [ProductsController::class, 'show'])->name('product-view');
        // route for product receipt
        Route::get('/products/receipt', [ProductsController::class, 'getProducts'])->name('product-receipt');
        Route::get('/stats', [InventoryStatsController::class, 'index'])->name('inventory-stats');


    });
    Route::get('/suppliers', [ProviderController::class, 'index'])->name('supplier');
    Route::post('/suppliers/{provider}/update', [ProviderController::class, 'update'])->name('supplier.update');
    Route::delete('/suppliers/{provider}/delete', [ProviderController::class, 'destroy'])->name('supplier.delete');
    Route::get('/suppliers/{provider}/view', [ProviderController::class, 'show'])->name('supplier-view');
    Route::get('/methods', [PaymentMethodsController::class, 'index'])->name('payment-methods');
    Route::post('/methods/{method}/update', [PaymentMethodsController::class, 'update'])->name('payment-methods.update');
    Route::delete('/methods/{method}/delete', [PaymentMethodsController::class, 'destroy'])->name('payment-methods.delete');
    Route::get('/methods/{method}/view', [PaymentMethodsController::class, 'show'])->name('method-view');

    //post endpoint

    Route::post('/create/methods', [PaymentMethodsController::class, 'store'])->name('createMethod');
    Route::post('/category/create',[ProductCategoriesController::class, 'store'])->name('createCategory');
    Route::post('/product/create',[ProductsController::class, 'store'])->name('createProduct');

    Route::post('/create/provider',[ProviderController::class, 'store'])->name('createSupplier');






});

Route::post('sales/{sale}/product', ['as' => 'sales.product.store', 'uses' => 'App\Http\Controllers\SaleController@storeProduct']);
Route::get('sales/{sale}/receipt', ['as' => 'sales.receipt', 'uses' => 'App\Http\Controllers\SaleController@show']);
Route::get('sales/{sale}/receipt/print', ['as' => 'sales.receipts.printFormat', 'uses' => 'App\Http\Controllers\SaleController@saleReceipt']);
Route::get('sales/{sale}/finalize', ['as' => 'sales.finalize', 'uses' => 'App\Http\Controllers\SaleController@finalizeSale']);
Route::post('sales/{sale}/product/{soldproduct}/update', ['as' => 'sales.product.update', 'uses' => 'App\Http\Controllers\SaleController@updateproduct']);
Route::delete('sales/{sale}/product/{soldproduct}/delete', ['as' => 'sales.product.delete', 'uses' => 'App\Http\Controllers\SaleController@destroyproduct']);
Route::get('transactions/{type}', ['as' => 'transactions.type', 'uses' => 'App\Http\Controllers\TransactionController@type']);
Route::get('transactions/{type}/create', ['as' => 'transactions.create', 'uses' => 'App\Http\Controllers\TransactionController@create']);
Route::post('transactions/store', ['as' => 'transactions.store', 'uses' => 'App\Http\Controllers\TransactionController@store']);
Route::get('transactions/{id}/print-sales', ['as' => 'sales.receipt.print', 'uses' => 'App\Http\Controllers\TransactionStatsController@showSales']);
Route::post('transfer/store', ['as' => 'transfer.store', 'uses' => 'App\Http\Controllers\TransferController@store']);
Route::post('receipt/store', ['as' => 'receipt.store', 'uses' => 'App\Http\Controllers\ReceiptController@store']);
Route::post('receipts/{receipt}/product', ['as' => 'receipts.product.store', 'uses' => 'App\Http\Controllers\ReceiptController@storeproduct']);
Route::get('products/{product}/edit', ['as' => 'products.edit', 'uses' => 'App\Http\Controllers\ProductsController@edit']);
Route::post('products/{product}/update', ['as' => 'products.update', 'uses' => 'App\Http\Controllers\ProductsController@update']);
Route::delete('products/{product}/delete', ['as' => 'products.delete', 'uses' => 'App\Http\Controllers\ProductsController@destroy']);
Route::get('inventory/receipts/{receipt}/finalize', ['as' => 'receipts.finalize', 'uses' => 'App\Http\Controllers\ReceiptController@finalize']);
Route::get('transactions/edit/{transaction}', ['as' => 'transaction.edit', 'uses' => 'App\Http\Controllers\TransactionController@edit']);
Route::post('transactions/update/{transaction}', ['as' => 'transaction.update', 'uses' => 'App\Http\Controllers\TransactionController@update']);
Route::delete('transactions/delete/{transaction}', ['as' => 'transaction.delete', 'uses' => 'App\Http\Controllers\TransactionController@destroy']);


Route::get('profile', ['as' => 'profile', 'uses' => 'App\Http\Controllers\ProfileController@index']);
Route::get('staff/view', ['as' => 'staffs', 'uses' => 'App\Http\Controllers\UserController@index']);
Route::post('staff/{id}/view', ['as' => 'staffs.update', 'uses' => 'App\Http\Controllers\UserController@update']);


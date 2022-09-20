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
Route::get('/', [LoginController::class, 'Index']);
Route::prefix('admin')->group(function() {
    Route::post('/login-post', [LoginController::class, 'Login'])->name('loginPost');
    

    Route::prefix('/transactions')->group(function()
    {
        Route::get('/expenses', [ExpenseController::class, 'index'])->name('expense');
        Route::get('/income', [IncomeController::class, 'index'])->name('income');
        Route::get('/transfers', [TransferController::class, 'index'])->name('transfer');
        Route::get('/payments', [PaymentController::class, 'index'])->name('payment');
        Route::get('/sales', [SaleController::class, 'index'])->name('sales');
        Route::get('/sales/create', [SaleController::class, 'create'])->name('sales-create');
        // Route::get('/sales/client', [ClientController::class, 'create'])->name('client-create');
        Route::get('/all', [TransactionController::class, 'index'])->name('transactions');
        Route::get('/stats', [TransactionStatsController::class, 'index'])->name('transaction-stats');

        Route::get('/show', [ClientController::class, 'show'])->name('clientShow');

        //post endpoint
        Route::post('/client', [ClientController::class, 'store'])->name('createClient');
        
    });
    Route::prefix('/inventory')->group(function()
    {
        // Route::get('/expenses', [ExpenseController::class, 'index'])->name('expense');
        // Route::get('/income', [IncomeController::class, 'index'])->name('income');
        // Route::get('/transfers', [TransferController::class, 'index'])->name('transfer');
        // Route::get('/payments', [PaymentController::class, 'index'])->name('payment');
        // Route::get('/sales', [SaleController::class, 'index'])->name('sales');
        Route::get('/receipts', [ReceiptController::class, 'index'])->name('inventory-receipt');
        Route::get('/receipts/create', [ReceiptController::class, 'create'])->name('receipt-create');
        Route::get('/receipts/view/1', [ReceiptController::class, 'show'])->name('receipt-view');
        Route::get('/categories', [ProductCategoriesController::class, 'index'])->name('inventory-category');
        Route::get('/categories/view/1', [ProductCategoriesController::class, 'show'])->name('category-view');
        Route::get('/products', [ProductsController::class, 'index'])->name('inventory-product');
        Route::get('/products/view/1', [ProductsController::class, 'show'])->name('product-view');
        Route::get('/stats', [InventoryStatsController::class, 'index'])->name('inventory-stats');

        //post endpoint
        // Route::post('/client', [ClientController::class, 'store'])->name('client');

    });
    Route::get('/suppliers', [ProviderController::class, 'index'])->name('supplier');
    Route::get('/suppliers/view/1', [ProviderController::class, 'show'])->name('supplier-view');
    Route::get('/methods', [PaymentMethodsController::class, 'index'])->name('payment-methods');
    Route::get('/methods/view/1', [PaymentMethodsController::class, 'show'])->name('method-view');


});



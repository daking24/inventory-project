<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;

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

});

Route::get('/expenses', [TestController::class, 'expense'])->name('expense');
Route::get('/income', [TestController::class, 'income'])->name('income');


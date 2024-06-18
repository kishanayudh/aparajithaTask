<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\AccountantController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IncomeExpenseController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::post('login', [LoginController::class, 'login']);

Route::group(['middleware' => ['role:admin|accountant']] , function() {

    Route::get('dashboard', [HomeController::class, 'index']);
    Route::get('logout', [LoginController::class, 'logout']);

    Route::resource('permissions', PermissionController::class);
    Route::get('permissions/{permissionId}/delete', [PermissionController::class, 'destroy']);

    Route::resource('roles', RoleController::class);
    Route::get('roles/{roleId}/delete', [RoleController::class, 'destroy']);
    Route::get('roles/{roleId}/give-permisions', [RoleController::class, 'addPermissionToRole']);
    Route::put('roles/{roleId}/give-permissions', [RoleController::class, 'givePermissionToRole']);

    Route::resource('accountants', AccountantController::class);
    Route::get('accountants/{accountantId}/delete', [AccountantController::class, 'destroy']);

    Route::resource('income_and_expense', IncomeExpenseController::class);
    Route::get('income_and_expense/{income_and_expenseId}/delete', [IncomeExpenseController::class, 'destroy']);

});

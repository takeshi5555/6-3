<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Hellocontroller;
use App\Http\Controllers\DisplayController;
use App\Http\Controllers\RegistrationController;
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

Route::get('/hello' , [Hellocontroller::class,'index']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/' , [DisplayController::class,'index']);

Route::get('/spend/{id}/detail', [DisplayController::class, 'spendDetail'])->name('spend.detail');

Route::get('/income/{id}/detail', [DisplayController::class, 'incomeDetail'])->name('income.detail');

Route::get('/create_spend', [RegistrationController::class, 'createSpendForm'])->name('create.spend');

Route::post('/create_spend', [RegistrationController::class, 'createSpend']);

Route::get('/create_income', [RegistrationController::class, 'createIncomeForm'])->name('create.income');

Route::post('/create_income', [RegistrationController::class, 'createIncome']);

Route::prefix('types')->group(function () {
    Route::get('/create', [RegistrationController::class, 'createTypeForm'])->name('types.create');
    Route::post('/', [RegistrationController::class, 'storeType'])->name('types.store');;
});

Route::get('/edit_spend/{id}', [RegistrationController::class, 'editSpendForm'])->name('edit.spend');
Route::post('/edit_spend/{id}', [RegistrationController::class, 'editSpend'])->name('update.spend');

Route::get('/edit_income/{id}', [RegistrationController::class, 'editIncomeForm'])->name('edit.income');
Route::post('/edit_income/{id}', [RegistrationController::class, 'editIncome'])->name('update.income');;

Route::delete('/delete_spend/{id}', [RegistrationController::class, 'deleteSpend'])->name('delete.spend');
Route::post('/softdelete_spend/{id}', [RegistrationController::class, 'softDeleteSpend'])->name('softdelete.spend');

Route::delete('/delete_income/{id}', [RegistrationController::class, 'deleteIncome'])->name('delete.income');
Route::post('/softdelete_income/{id}', [RegistrationController::class, 'softDeleteIncome'])->name('softdelete.income');

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
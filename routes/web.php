<?php

use App\Http\Controllers\SalaryController;
use Illuminate\Support\Facades\Route;

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

Route::middleware(['basicAuth'])->group(function (){
    Route::prefix("salary")->group(function (){
        Route::post('', [SalaryController::class, 'salaryInformation'])->name('salary.info');
    });
});

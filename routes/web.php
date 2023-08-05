<?php

use App\Http\Controllers\admin\PlanController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->group(function () {
    Route::any('plans/search', [PlanController::class, 'search'])->name('plans.search');
    Route::resource('plans', PlanController::class);
    Route::get('', [PlanController::class, 'index'])->name('admin.index');
});



Route::get('/', function () {
    return view('welcome');
});

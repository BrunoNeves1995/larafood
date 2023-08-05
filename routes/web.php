<?php

use App\Http\Controllers\Admin\DetailPlanController;
use App\Http\Controllers\Admin\PlanController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->group(function () {
    /* *
    *   Routes Plan
    */
    Route::any('plans/search', [PlanController::class, 'search'])->name('plans.search');
    Route::get('', [PlanController::class, 'index'])->name('admin.index');
    Route::resource('plans', PlanController::class);
    
    /* *
    *   Routes DetailsPlan
    */
    Route::resource('plans.details', DetailPlanController::class);
});



Route::get('/', function () {
    return view('welcome');
});

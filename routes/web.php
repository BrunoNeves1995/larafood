<?php

use App\Http\Controllers\admin\PlanController;
use Illuminate\Support\Facades\Route;


Route::any('admin/plans/search', [PlanController::class, 'search'])->name('plans.search');
Route::resource('admin/plans', PlanController::class);
Route::get('admin', [PlanController::class, 'index'])->name('admin.index');

Route::get('/', function () {
    return view('welcome');
});

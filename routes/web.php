<?php

use App\Http\Controllers\admin\PlanController;
use Illuminate\Support\Facades\Route;


Route::resource('admin/plans', PlanController::class);

Route::get('/', function () {
    return view('welcome');
});

<?php

use App\Http\Controllers\Admin\ACL\PermissionController;
use App\Http\Controllers\Admin\ACL\PermissionProfileController;
use App\Http\Controllers\Admin\ACL\ProfileController;
use App\Http\Controllers\Admin\DetailPlanController;
use App\Http\Controllers\Admin\PlanController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->group(function () {

    /* *
    *   Routes Permissions x Profiles
    */
    Route::post('profiles/{profile}/permissions', [PermissionProfileController::class, 'addProfilePermission'])->name('profiles.permissions.store');
    Route::get('profiles/{profile}/permissions', [PermissionProfileController::class, 'permissions'])->name('profiles.permissions.index');
    Route::get('profiles/{profile}/permissions/create', [PermissionProfileController::class, 'permissionsAvailable'])->name('profiles.permissions.create');
    Route::any('profiles/{profile}/permissions/create/search', [PermissionProfileController::class, 'filterPermissionsAvailable'])->name('profiles.permissions.search');
    Route::get('profiles/{profile}/permissions/{permission}/detach', [PermissionProfileController::class, 'detachProfilePermission'])->name('profiles.permissions.detach');

    /* *
    *   Routes Permissions
    */
    Route::any('permissions/search', [PermissionController::class, 'search'])->name('permissions.search');
    Route::resource('permissions', PermissionController::class);

    /* *
    *   Routes DetailsPlan
    */
    Route::resource('plans.details', DetailPlanController::class);

    /* *
    *   Routes Profiles
    */
    Route::any('profiles/search', [ProfileController::class, 'search'])->name('profiles.search');
    Route::resource('profiles', ProfileController::class);

    /* *
    *   Routes Plan
    */
    Route::any('plans/search', [PlanController::class, 'search'])->name('plans.search');
    Route::get('', [PlanController::class, 'index'])->name('admin.index');
    Route::resource('plans', PlanController::class);
});



Route::get('/', function () {
    return view('welcome');
});

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController; 
use App\Http\Controllers\UsersController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PermissionController;

Route::resource('permissions', PermissionController::class);
Route::resource('roles', RoleController::class); 
Route::get('roles/{roleId}/give-permission', [RoleController::class, 'addPermissionToRole'])->name('roles.addPermissionToRole');

Route::patch('roles/{roleId}/give-permission', [RoleController::class, 'givePermissionToRole'])->name('roles.givePermissionToRole');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::get('users/export/', [UsersController::class, 'export'])->name('users.export');
require __DIR__ . '/auth.php';

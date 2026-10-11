<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\AdminController;

Route::get('/', function () {
    return view('welcome');
});

use App\Http\Controllers\DashboardController;

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
Route::middleware('auth')->group(function () {
    Route::get('/reports', [ReportController::class, 'index'])
        ->name('reports.index');

    Route::get('/reports/create', [ReportController::class, 'create'])
        ->name('reports.create');

    Route::post('/reports', [ReportController::class, 'store'])
        ->name('reports.store');
    
    Route::get('/reports/{report}/edit', [ReportController::class, 'edit'])
        ->name('reports.edit');

    Route::put('/reports/{report}', [ReportController::class, 'update'])
        ->name('reports.update');

    Route::delete('/reports/{report}', [ReportController::class, 'destroy'])
        ->name('reports.destroy');

});
Route::middleware('auth')->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])
        ->name('admin.index');

    Route::patch('/admin/reports/{report}/status', [AdminController::class, 'updateStatus'])
        ->name('admin.reports.updateStatus');

    Route::patch('/notifications/{notification}/read', [
    \App\Http\Controllers\DashboardController::class,
    'markNotificationRead',
])->name('notifications.read');
});
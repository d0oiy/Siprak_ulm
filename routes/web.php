<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminReportController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ReportController;
use App\Http\Middleware\RoleMiddleware;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// ✅ Redirect ke halaman login
Route::get('/', function () {
    return redirect()->route('login');
});

// ✅ Redirect ke dashboard sesuai role user
Route::get('/dashboard', function () {
    $user = Auth::user();

    if ($user->role === 'admin') {
        return redirect()->route('admin.dashboard');
    }

    return redirect()->route('user.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// ✅ Route profile (untuk semua role yang login)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// ✅ Admin routes
Route::middleware(['auth', RoleMiddleware::class . ':admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        // Dashboard utama
        Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');

        // (Opsional jika kamu punya AdminReportController)
        Route::resource('/reports', AdminReportController::class);

        // Tambahan dari AdminController langsung
        Route::get('/laporan/{id}', [AdminController::class, 'show'])->name('reports.show');
        Route::post('/laporan/{id}/status', [AdminController::class, 'updateStatus'])->name('reports.updateStatus');
        Route::delete('/laporan/{id}', [AdminController::class, 'destroy'])->name('reports.destroy');
    });

// ✅ User (mahasiswa/dosen) routes
Route::middleware(['auth', RoleMiddleware::class . ':user'])->group(function () {
    Route::get('/user/dashboard', [UserController::class, 'index'])->name('user.dashboard');
    Route::get('/reports', [ReportController::class, 'index'])->name('reports.index');
    Route::get('/reports/create', [ReportController::class, 'create'])->name('reports.create');
    Route::post('/reports', [ReportController::class, 'store'])->name('reports.store');
});

// ✅ Auth routes (Laravel Breeze/Fortify/etc)
require __DIR__.'/auth.php';

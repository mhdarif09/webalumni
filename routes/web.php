<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Redirect generic dashboard to role-specific dashboard
Route::get('/dashboard', function () {
    if (auth()->user()->role === 'admin') {
        return redirect()->route('admin.dashboard');
    }
    return redirect()->route('alumni.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    
    // Admin Routes
    Route::middleware('role:admin')->prefix('admin')->name('admin.')->group(function () {
        Route::get('/dashboard', [App\Http\Controllers\AdminController::class, 'index'])->name('dashboard');
    });

    // Alumni Routes
    Route::middleware('role:alumni')->prefix('alumni')->name('alumni.')->group(function () {
        Route::get('/dashboard', function () {

    $user = auth()->user();

    return view('dashboard', [
        'user' => $user,
        'avatarInitials' => strtoupper(substr($user->name, 0, 1)),
        'lastUpdated' => now()->format('d M Y'),
        'updatedAgo' => 'Hari ini',
    ]);

})->name('dashboard');

        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
        
        Route::get('/directory', [App\Http\Controllers\DirectoryController::class, 'index'])->name('directory.index');

        Route::prefix('pendidikan')->name('pendidikan.')->group(function () {
            Route::get('/', [App\Http\Controllers\PendidikanController::class, 'index'])->name('index');
            Route::get('/create', [App\Http\Controllers\PendidikanController::class, 'create'])->name('create');
            Route::post('/', [App\Http\Controllers\PendidikanController::class, 'store'])->name('store');
            Route::get('/{pendidikan}/edit', [App\Http\Controllers\PendidikanController::class, 'edit'])->name('edit');
            Route::put('/{pendidikan}', [App\Http\Controllers\PendidikanController::class, 'update'])->name('update');
            Route::delete('/{pendidikan}', [App\Http\Controllers\PendidikanController::class, 'destroy'])->name('destroy');
        });
    });
});


require __DIR__.'/auth.php';

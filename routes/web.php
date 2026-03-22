<?php

use App\Http\Controllers\JobController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\TagController;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Route;

Route::get('/', [JobController::class,'index' ]);
Route::get('/search', SearchController::class);
Route::get('/tags/{tag:name}', TagController::class);

 Route::get('/job/create', [JobController::class, 'create'])->middleware('auth');
 Route::post('/job', [JobController::class, 'store'])->middleware('auth');

Route::middleware('guest')->group(function () {
    Route::get('/register', [RegisteredUserController::class, 'create']);
    Route::post('/register', [RegisteredUserController::class, 'store']);

    Route::get('/login', [SessionController::class, 'create']);
    Route::post('/login', [SessionController::class, 'store']);
});

Route::get('/debug', function () {
    return [
        'php' => phpversion(),
        'storage_writable' => is_writable(storage_path()),
        'database_exists' => file_exists(database_path('database.sqlite')),
        'env' => app()->environment(),
        'key' => config('app.key') ? 'set' : 'missing',
    ];
});
// Route::get('/register', [RegisteredUserController::class, 'create']);
// Route::post('/register', [RegisteredUserController::class, 'store']);


// Route::get('/login', [SessionController::class, 'create']);
// Route::post('/login', [SessionController::class, 'store']);


Route::delete('/logout', [SessionController::class, 'destroy'])->middleware('auth');

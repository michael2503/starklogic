<?php

use App\Http\Controllers\LinkController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/{linkName}', [LinkController::class, 'viewLink'])->name('viewLink');



Route::group(['prefix' => 'user'], function() {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->middleware(['auth', 'verified'])->name('dashboard');

    Route::middleware('auth')->group(function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

        Route::controller(LinkController::class)->group(function () {
            Route::group(['prefix' => 'links'], function() {
                Route::get('/', 'index')->name('getLinks');
                Route::post('/add', 'addLink')->name('addLink');
                Route::get('/single/{id}', 'singleLink')->name('singleLink');
                Route::post('/single/update/{id}', 'updateLink')->name('updateLink');
                Route::post('/delete', 'deleteLink')->name('deleteLink');
            });
        });
    });
});

require __DIR__.'/auth.php';

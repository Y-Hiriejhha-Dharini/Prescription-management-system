<?php

use App\Http\Controllers\PrescriptionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QuotataionController;
use App\Http\Controllers\QuotationConfirmCancel;
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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('prescription', PrescriptionController::class)->only(['create', 'store'])->middleware('can:user-only');
    Route::resource('quotation', QuotataionController::class)->only(['create', 'store'])->middleware('can:pharmacy-only');
});

    Route::get('confirm/{token}', [QuotationConfirmCancel::class,'confirm'])->name('confirm');
    Route::get('cancel/{token}', [QuotationConfirmCancel::class,'cancel'])->name('cancel');


require __DIR__.'/auth.php';

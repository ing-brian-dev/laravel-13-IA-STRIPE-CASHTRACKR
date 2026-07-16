<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\BudgetController;
use App\Http\Controllers\LogoutController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/auth/register', [RegisterController::class, 'index'])->name('register');
Route::post('/auth/register', [RegisterController::class, 'store'])->name('register.store');

Route::get('/auth/login', [LoginController::class, 'index'])->name('login');
Route::post('/auth/login', [LoginController::class, 'store'])->name('login.store');

Route::post('/auth/logout', [LogoutController::class, 'store'])->name('logout.store');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect()
        ->route('dashboard')
        ->with('success', 'Tu correo fue verificado correctamente. Ya puedes Crear Presupuestos y Gastos.');
})->middleware(['auth'], 'signed')->name('verification.verify');

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('success', 'Se ah enviado el correo de verificación');
})->middleware('auth', 'throttle:1,1')->name('verification.send');

Route::prefix('dashboard')->group(function () {
    Route::get('/', [BudgetController::class, 'index'])->name('dashboard');
    Route::get('/budgets/create', [BudgetController::class, 'create'])->name('budgets.create');
    Route::post('/budgets', [BudgetController::class, 'store'])->name('budgets.store');

    Route::get('/budgets/{budget}/edit', [BudgetController::class, 'edit'])->name('budget.edit');
});

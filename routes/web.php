<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\BudgetChatController;
use App\Http\Controllers\BudgetController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\TicketScanController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
    Route::get('/budgets/{budget}', [BudgetController::class, 'show'])->name('budgets.show');
    Route::get('/budgets/{budget}/edit', [BudgetController::class, 'edit'])->name('budgets.edit');
    Route::put('/budgets/{budget}', [BudgetController::class, 'update'])->name('budgets.update');
    Route::delete('/budgets/{budget}', [BudgetController::class, 'destroy'])->name('budgets.destroy');

    Route::post('/budgets/{budget}/expenses', [ExpenseController::class, 'store'])->name('expenses.store');
    Route::put('/budgets/{budget}/expenses/{expense}', [ExpenseController::class, 'update'])->name('expenses.update');
    Route::delete('/budgets/{budget}/expenses/{expense}', [ExpenseController::class, 'destroy'])->name('expenses.destroy');

    Route::post('/budgets/{budget}/chat', [BudgetChatController::class, 'store'])->name('budgets.chat');
    Route::post('/budgets/{budget}/scan-ticket', [TicketScanController::class, 'store'])->name('budgets.scan-ticket');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::post('/subscription-checkout/{plan}', function (Request $request, string $plan) {
        
        $prices = [
            'monthly' => config('services.stripe.price_ai_monthly'),
            'yearly' => config('services.stripe.price_ai_yearly'),
        ];

        abort_unless(isset($prices[$plan]), 404, 'Plan no válido');

        $checkout = $request->user()->newSubscription('default', $prices[$plan])
            ->allowPromotionCodes()
            ->checkout([
                'success_url' => route('billing.success'),
                'cancel_url' => route('billing.cancel'),
            ]);

        return Inertia::location($checkout->url);
    })->name('subscription.checkout')->whereIn('plan', ['monthly', 'yearly']);

    Route::view('/billing/success', 'billing.success')->name('billing.success');
    Route::view('/billing/cancel', 'billing.cancel')->name('billing.cancel');

    Route::get('/plans', function () {
        return Inertia::render('Pro/Plans');
    })-> name('plans');
});

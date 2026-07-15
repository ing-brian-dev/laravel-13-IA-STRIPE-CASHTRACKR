<?php

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Event;

uses(RefreshDatabase::class);

it('shows the registration screen', function () {
    $response = $this->get(route('register'));
    $response->assertOk();
    $response->assertStatus(200);
    $response->assertSee('Registrarme');
    $response->assertSeeInOrder([
        'Crear cuenta',
        'Registrarme',
    ]);
});

it('register a new user as unverified and dispatches the registered event', function () {

    Event::fake();

    $response = $this->post(route('register.store'), [
        'name' => 'Pedriti',
        'email' => 'pedtiri@gmail.com',
        'password' => 'ickkcki3p2.W',
        'password_confirmation' => 'ickkcki3p2.W',
    ]);

    $response->assertRedirect(route('verification.notice'));
    $user = User::where('email', 'pedtiri@gmail.com')->first();

    expect($user)->not->toBeNull();
    expect($user->name)->toBe('Pedriti');
    expect($user->email)->toBe('pedtiri@gmail.com');
    expect($user->hasVerifiedEmail())->toBeFalse();

    Event::assertDispatched(Registered::class);
});

it('should validate required fields wjen the request body is empty', function () {
    $response = $this->post(route('register.store'), []);

    $response->assertSessionHasErrors([
        'name' => 'El nombre es requerido',
        'email' => 'El email es requerido',
        'password' => 'La contraseña es requerida',
    ]);
});

it('prevents duplicate email addresses', function () {

    User::factory()->create([
        'email' => 'pedtiri@gmail.com',
    ]);

    $response = $this->post(route('register.store'), [
        'name' => 'Pedriti',
        'email' => 'pedtiri@gmail.com',
        'password' => 'ickkcki3p2.W',
        'password_confirmation' => 'ickkcki3p2.W',
    ]);

    $response->assertRedirect();

    $response->assertSessionHasErrors([
        'email' => 'El email ya esta registrado',
    ]);
});

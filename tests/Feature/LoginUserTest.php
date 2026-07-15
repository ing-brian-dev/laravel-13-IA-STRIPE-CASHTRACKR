<?php

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('shows the login screen', function () {
    $response = $this->get(route('login'));

    $response->assertOk();
});

it('logs in a virified user successfully', function () {
    User::factory()->create([
        'email' => 'brian@gmail.com',
        'password' => bcrypt('ickkcki3p2.W'),
        'email_verified_at' => now(),
    ]);

    $response = $this->post(route('login.store'), [
        'email' => 'brian@gmail.com',
        'password' => 'ickkcki3p2.W',
    ]);

    $response->assertRedirect(route('dashboard'));
    $this->assertAuthenticated();
});

it('does not log in with invalid credentials', function () {
    User::factory()->create([
        'email' => 'brian@gmail.com',
        'password' => bcrypt('ickkcki3p2.W'),
    ]);

    $response = $this->from(route('login'))->post(route('login.store'), [
        'email' => 'brian@gmail.com',
        'password' => 'incorrect-password',
    ]);

    $response->assertRedirect(route('login'));
    $response->assertSessionHas('error', 'credenciales incorrectas');

    $this->assertGuest();
});

it('prevents unverified user from accessing dashboard', function () {
    User::factory()->unverified()->create([
        'email' => 'brian@gmail.com',
        'password' => bcrypt('ickkcki3p2.W'),
    ]);

    $response = $this->post(route('login.store'), [
        'email' => 'brian@gmail.com',
        'password' => 'ickkcki3p2.W',
    ]);

    $response->assertRedirect(route('dashboard'));
    $this->assertAuthenticated();

    $dashboardResponse = $this->get(route('dashboard'));
    $dashboardResponse->assertRedirect(route('verification.notice'));
});

it('does not allow access to dashboard if email is not verified', function () {
    $user = User::factory() -> create([
        'email_verified_at' => null
    ]);

    $response = $this -> actingAs($user) -> get(route('dashboard'));
    $response -> assertRedirect(route('verification.notice'));
});

it('allow access to dashboard if email is verified', function () {
    $user = User::factory() -> create([
        'email_verified_at' => now()
    ]);

    $response = $this -> actingAs($user) -> get(route('dashboard'));
    $response -> assertOk();
});

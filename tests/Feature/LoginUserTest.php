<?php

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('shows the login screen', function () {
    $response = $this -> get(route('login'));

    $response -> assertOk();
});

it('logs in a virified user successfully', function(){
    User::factory() -> create([
        'email' => 'brian@gmail.com',
        'password' => bcrypt('ickkcki3p2.W'),
        'email_verified_at' => now()
    ]);

    $response = $this -> post(route('login.store'),[
        'email' => 'brian@gmail.com',
        'password' => 'ickkcki3p2.W'
    ]);

    $response -> assertRedirect(route('dashboard'));
    $this -> assertAuthenticated();
});

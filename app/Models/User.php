<?php

namespace App\Models;

use App\Notifications\VerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Cashier\Billable;

#[Fillable(['name', 'email', 'password'])]
#[Hidden(['password', 'remember_token'])]
class User extends Authenticatable implements MustVerifyEmail
{
    /** @use HasFactory<UserFactory> */
    use Billable, HasFactory, Notifiable;

    public function sendEmailVerificationNotification()
    {
        $this->notify(new VerifyEmail);
    }

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function budgets()
    {
        return $this->hasMany(Budget::class);
    }

    public function currentPlan(): ?string
    {
        if (! $this->subscribed('default')) {
            return null;
        }

        return match (true) {
            $this->subscribedToPrice(config('services.stripe.price_ai_monthly'), 'default') => 'monthly',
            $this->subscribedToPrice(config('services.stripe.price_ai_yearly'), 'default') => 'yearly',
            default => null
        };
    }

    public function isOnMonthlyPlan() : bool {
        return $this -> currentPlan() === 'monthly';
    }

        public function isOnYearlyPlan() : bool {
        return $this -> currentPlan() === 'yearly';
    }
}

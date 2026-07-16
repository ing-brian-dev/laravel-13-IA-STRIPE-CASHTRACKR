<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['name', 'amount', 'type', 'user_id'])]
class Budget extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

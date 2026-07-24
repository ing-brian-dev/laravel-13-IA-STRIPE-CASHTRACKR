<?php

namespace App\Models;

use App\BudgetType;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

#[Fillable(['name', 'amount', 'type', 'user_id'])]
class Budget extends Model
{

    use SoftDeletes;

    protected $casts = [
        'type' => BudgetType::class // convert to string
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function expenses(){
        return $this -> hasMany(Expense::class);
    }

    public function isGeneral(): bool {
        return $this -> type === BudgetType::General;
    }

    public function isGoal(): bool {
        return $this -> type === BudgetType::Goal;
    }
}

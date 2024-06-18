<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Income_And_Expense extends Model
{
    use HasFactory;

    protected $table = 'income_and_expenses';

    protected $fillable = [
        'item',
        'type',
        'amount',
    ];
}

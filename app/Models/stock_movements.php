<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class stock_movements extends Model
{
    protected $fillable = [
        'product_id',
        'user_id',
        'type',
        'quantity',
        'reference_id',
        'notes'
    ];
}
     
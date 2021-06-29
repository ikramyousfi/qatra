<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;

    protected $fillable = [
        'max',
        'ABp',
        'ABn',
        'Ap',
        'An',
        'Bp',
        'Bn',
        'Op',
        'On'
    ];

    public function gestionnaire()
    {
        return $this->belongsTo(Gestionnaire::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;

    protected $fillable = [
        'AB+',
        'maxAB+',
        'AB-',
        'maxAB-',
        'A+',
        'maxA+',
        'A-',
        'maxA-',
        'B+',
        'maxB+',
        'B-',
        'maxB-',
        'O+',
        'maxO+',
        'O-',
        'maxO-',
    ];

    public function gestionnaire()
    {
        return $this->belongsTo(Gestionnaire::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certificade extends Model


{

    protected $fillable = [
        'name',
        'url',
        'institution',
        'hours',
        'type',
        'end_date',
    ];

    protected $dates = [
        'end_date',
    ];
    
    use HasFactory;
}

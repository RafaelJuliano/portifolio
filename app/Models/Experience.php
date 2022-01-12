<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    protected $fillable = ['description', 'start_date', 'end_date', 'company', 'location', 'position'];

    protected $dates = ['start_date', 'end_date'];

    use HasFactory;
}

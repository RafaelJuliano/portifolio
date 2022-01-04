<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bio extends Model
{
    protected $fillable = ['name', 'email', 'phone', 'about', 'linkedin', 'github', 'occupation'];

    public function returnBio(){
        return $this->all();
    }

    use HasFactory;
}

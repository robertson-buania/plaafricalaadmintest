<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class lawyer extends Model
{
    use HasFactory;
    protected $fillable = [
        'first_name', 'last_name', 'photo', 'phone', 'gender', 'birth_date', 'email', 'function', 'cv', 'level', 'description_en', 'description_fr'
    ];
}

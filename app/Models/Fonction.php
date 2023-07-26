<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fonction extends Model
{
    use HasFactory;

   protected $fillable=["id","nom_fr","nom_en"];

   public function avocats()
    {
        return $this->belongsToMany(Avocat::class, 'avocat_fonction');
    }
}

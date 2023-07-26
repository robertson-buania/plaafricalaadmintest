<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bureau extends Model
{
    protected $fillable=[
        "id",'nom',"photo","adresse_physique_fr","adresse_physique_en","pays_fr","pays_en",
        "email","telephone","description_fr","description_en"
    ];
    public function avocats()
    {
        return $this->belongsToMany(Avocat::class, 'avocat_bureau');
    }
}


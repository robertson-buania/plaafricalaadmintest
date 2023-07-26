<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Avocat extends Model
{


    protected $fillable=[
        "id","linkedin","twitter","nom","prenom","adresse","description_en","description_fr","email","cv","niveau","telephone","sexe","date_naissance","photo"
    ];
    public function publications()
    {
        return $this->hasMany(Publication::class);
    }

    public function bureaux()
    {
        return $this->belongsToMany(Bureau::class);
    }

    public function fonctions()
    {
        return $this->belongsToMany(Fonction::class);
    }
}

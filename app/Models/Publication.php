<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publication extends Model
{

    protected $fillable=[
        "id","titre_fr","titre_en","sous_titre_fr","sous_titre_en","pdf_fr","pdf_en","photo","contenu_fr",
        "contenu_en","domaine_id","avocat_id"
    ];
    public function avocat()
    {
        return $this->belongsTo(Avocat::class);
    }

    public function domaine()
    {
        return $this->belongsTo(Domaine::class);
    }
}


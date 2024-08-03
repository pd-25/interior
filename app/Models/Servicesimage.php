<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servicesimage extends Model
{
    use HasFactory;

    public function serviceTeel()
    {
        return $this->belongsTo(Categorie::class, 'categorie_id', 'id');
    }
}

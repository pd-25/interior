<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServicesCategory extends Model
{
    use HasFactory;

    protected $table = 'services_category';

    public function serviceData()
    {
        return $this->belongsTo(Categorie::class, 'categorie_id', 'id');
    }

    public function servicecategoryimage()
    {
        return $this->hasMany(ServicesCategoryImage::class, 'categorie_id', 'id');
    }

}

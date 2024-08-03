<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServicesCategoryImage extends Model
{
    use HasFactory;

    protected $table = 'services_category_images';

    public function servicecategory()
    {
        return $this->belongsTo(ServicesCategory::class, 'categorie_id', 'id');
    }
}

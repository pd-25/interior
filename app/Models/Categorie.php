<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug', 'icon', 'description', 'show_child_images', 'status'];

    public function serviceimage()
    {
        return $this->hasMany(Servicesimage::class, 'categorie_id', 'id');
    }

    public function servicebanner()
    {
        return $this->hasMany(ServicesBanner::class, 'categorie_id', 'id');
    }

    public function servicecategory()
    {
        return $this->hasMany(ServicesCategory::class, 'categorie_id', 'id');
    }
}

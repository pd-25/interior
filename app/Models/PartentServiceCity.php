<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PartentServiceCity extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'city_name',
        'city_status',
    ];

    public function subCities()
    {
        return $this->hasMany(SubCities::class, 'partent_service_city_id');
    }
}

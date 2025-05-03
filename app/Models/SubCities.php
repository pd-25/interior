<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SubCities extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'sub_city_name',
        'partent_service_city_id',
        'sub_city_status',
    ];
    public function partentServiceCity()
    {
        return $this->belongsTo(PartentServiceCity::class, 'partent_service_city_id');
    }
}

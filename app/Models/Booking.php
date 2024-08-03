<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $table = 'bookings';

    protected $fillable = [
        'user_id',
        'service_id',
        'category',
        'home_requirements',
        'renovation',
        'service',
        'budget',
        'pincode',
        'city',
        'date',
        'time',
        'expert_id'
    ];

    public function user_details()
    {
        return $this->belongsTo('App\Models\User','user_id','id');
    }

    public function partner_details()
    {
        return $this->belongsTo('App\Models\User','expert_id','id');
    }
}

<?php

namespace App\Models;

use Carbon\Carbon;
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

    public function getCreatedAtAttribute($value)
    {
        // return Carbon::parse($value)->setTimezone(config('app.timezone'))->toDateTimeString();
        return Carbon::parse($value)->timezone('Asia/Kolkata')->toDateTimeString();
    }
}

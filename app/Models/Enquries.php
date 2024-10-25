<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enquries extends Model
{
    use HasFactory;
    public function getCreatedAtAttribute($value)
    {
        // return Carbon::parse($value)->setTimezone(config('app.timezone'))->toDateTimeString();
        return Carbon::parse($value)->timezone('Asia/Kolkata')->toDateTimeString();
    }
}

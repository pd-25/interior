<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class, 'users_id'); // if the column name in your users migration is users_id then you might not need the second param.
    }

    public function portfolio(){
        return $this->hasMany(PartnerPortfolio::class,'partner_id');
    }
}

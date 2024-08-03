<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PartnerPortfolio extends Model
{
    use HasFactory;

    protected $table = "partner_portfolios";

    public function partner()
    {
        return $this->belongsTo(Partner::class, 'partner_id');
    }
}

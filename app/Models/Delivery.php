<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Delivery extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function confirmedOrder()
    {
        return $this->belongsTo(ConfirmedOrder::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $guarded = [];

    public function cardPayment()
    {
        return $this->hasOne(CardPayment::class);
    }
    public function confirmedOrder()
    {
        return $this->hasOne(ConfirmedOrder::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function deliveryOption()
    {
        return $this->belongsTo(DeliveryOption::class, 'id');
    }
}

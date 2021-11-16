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
    protected $fillable = [
        'image',
        'quantity',
        'note',
        'status',
        'delivery_option_id',
    ];

    public function cardPayment()
    {
        return $this->hasOne(CardPayment::class);
    }
    public function confirmedOrder()
    {
        return $this->hasOne(ConfirmationOrder::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'id');
    }
    public function deliveryOption()
    {
        return $this->belongsTo(DeliveryOption::class, 'id');
    }
}

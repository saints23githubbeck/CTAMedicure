<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CardPayment extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'cardNumber',
        'expiryDate',
        'cvNumber',
        'order_id',
    ];
    public function order()
    {
        return $this->belongsTo(Order::class, 'id');
    }
}

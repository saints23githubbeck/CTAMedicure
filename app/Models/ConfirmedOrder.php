<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConfirmedOrder extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'note',
        'order_id',
        'user_id',
        'status',
    ];
    public function order()
    {
        return $this->belongsTo(Order::class, 'id');
    }
}

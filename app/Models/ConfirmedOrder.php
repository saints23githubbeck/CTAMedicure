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
    protected $guarded = [];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    /*Relation between order and confirm order */
    public function relation_to_order(){
        return $this->hasOne(Order::class,'id','order_id');
    }
    public function relation_to_user(){
        return $this->hasOne(User::class,'id','user_id');
    }
}

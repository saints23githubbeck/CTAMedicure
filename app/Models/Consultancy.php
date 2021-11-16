<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consultancy extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'doctor_id',
        'user_id',
        'reason',
        'availableDate',
        'availableTime',
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class, 'id');
    }
}

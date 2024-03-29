<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConsultancyConfirm extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function consultancy()
    {
        return $this->belongsTo(Consultancy::class);
    }

    public function medication()
    {
        return $this->hasOne(Medication::class);
    }
}

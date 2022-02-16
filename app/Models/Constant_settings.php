<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Constant_settings extends Model
{
    use HasFactory;
    protected $fillable = ['user_id','availableTime','price','speciality'];
    public function relation_to_day(){
        return  $this->hasOne(Day::class,'id','constant_id');
     }

}

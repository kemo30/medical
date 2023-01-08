<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class doctor extends Model
{
    use HasFactory;

    protected $fillable=[
        'name_ar',
        'name_en',
        'price',
        'description_ar',
        'description_en',
        'image',
        'service_id',
    ];

    public function service(){
        return $this->belongsTo(service::class,'service_id','id');
    }

    public function rating(){
        return $this->hasMany(doctor_rating::class ,'doctor_id','id');
    }

    public function reservation(){
        return $this->hasMany(Reservation::class ,'doctor_id','id');
    }
    public function user(){
        return $this->belongsTo(user::class,'user_id','id');
    }
}

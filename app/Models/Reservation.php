<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;
    protected $fillable=[
        'user_id',
        'doctor_id',
        'service_id',
        'date'
    ];

    public function user(){
        return $this->belongsTo(User::class ,'user_id','id');
    }
    public function doctor(){
        return $this->belongsTo(doctor::class ,'doctor_id','id');
    }
    public function service(){
        return $this->belongsTo(doctor::class ,'service_id','id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class doctor_rating extends Model
{
    use HasFactory;
    protected $fillable=[
        'doctor_id',
        'rating',
        'user_id',
        'commint',
    ];

    public function doctor(){
        return $this->belongsTo(doctor::class,'doctor_id','id');
    }
    public function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class service extends Model
{
    use HasFactory;

    protected $fillable = [
        'name_en',
        'name_ar',
        'description_en',
        'description_ar',
        'icon',
        'image',
    ];

    public function doctors(){
        return $this->hasMany(doctor::class,'service_id','id');
    }
    public function reservation(){
        return $this->hasMany(Reservation::class,'service_id','id');
    }
}

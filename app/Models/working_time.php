<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class working_time extends Model
{
    use HasFactory;

    protected $fillable =[
        'Sat',
        'Sun',
        'Mon',
        'Tue',
        'Wed',
        'Thu',
        'Fri',
        'doctor_id'
    ];
}

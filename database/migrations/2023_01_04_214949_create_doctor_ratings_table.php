<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoctorRatingsTable extends Migration
{
    
    public function up()
    {
        Schema::create('doctor_ratings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('doctor_id')->constrained('doctors','id')->cascadeOnDelete();
            $table->unsignedInteger('rating');
            $table->foreignId('user_id')->constrained('users','id')->cascadeOnDelete();
            $table->Text('commint')->nullable();
            $table->timestamps();
        });
    }

   
    public function down()
    {
        Schema::dropIfExists('doctor_ratings');
    }
}

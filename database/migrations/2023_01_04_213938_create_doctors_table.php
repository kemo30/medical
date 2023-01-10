<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoctorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctors', function (Blueprint $table) {
            $table->id('doctor_id');
            $table->foreignId('user_id')->constrained('users','id')->cascadeOnDelete();
            $table->string('name_ar');
            $table->string('name_en');
            $table->unsignedBigInteger('price');
            $table->text('description_en');
            $table->text('description_ar');
            $table->text('location');
            $table->string('address');
            $table->string('phone_number');
            $table->enum('status',['0','1'])->default('1');
            $table->string('image')->nullable();
            $table->foreignId('service_id')->constrained('services','id')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('doctors');
    }
}

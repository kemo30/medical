<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkingTimesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('working_times', function (Blueprint $table) {
            $table->id();
            $table->foreignId('doctor_id')->constrained('doctors','id')->cascadeOnDelete();
            $table->string('Sat');
            $table->string('Sun');
            $table->string('Mon');
            $table->string('Tue');
            $table->string('Wed');
            $table->string('Thu');
            $table->string('Fri');
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
        Schema::dropIfExists('working_times');
    }
}

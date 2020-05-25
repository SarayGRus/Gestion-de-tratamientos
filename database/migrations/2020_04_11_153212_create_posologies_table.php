<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePosologiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posologies', function (Blueprint $table) {
            $table->id();
            $table->string('description');
            $table->integer('units');
            $table->integer('times');
            $table->enum('period',['Horas','Días','Semanas']);
            $table->timestamps();

            //Foreign key
            $table->unsignedBigInteger('treatment_id');
            $table->unsignedBigInteger('medicine_id');

            $table->foreign('treatment_id')->references('id')->on('treatments');
            $table->foreign('medicine_id')->references('id')->on('medicines');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posologies');
    }
}

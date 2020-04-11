<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSpecialtiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('specialties', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->enum('name', ['Anatomía patológica','Alergología','Cardiología','Cirugía general','Cirugía cardíaca','Cirugía plástica','Cirugía de mama','Cirugía maxilofacial',
                'Cirugía vascular','Dermatología','Endocrinología y nutrición','Gastroenterología-Digestivo','Genética','Geriatría','Ginecología',
                'Hematología','Hepatología','Enfermedades infecciosas','Medicina interna','Nefrología','Neumología','Neurología','Neurocirugía',
                'Oftalmología','Otorrinolaringología','Oncología','Pediatría','Proctología','Psiquiatría','Rehabilitación y M. Deportiva','Reumatología','Traumatología','Urología']);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('specialties');
    }
}

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
            $table->enum('name', ['anatomiaPatologica','alergologia','cardiologia','cirugiaGeneral','cirugiaCardiaca','cirugiaPlastica','cirugiaDeMama','cirugiaMaxilofacial',
                'cirugiaVascular','dermatologia','endocrinologiaYnutricion','gastroenterologiaDigestivo','genetica','geriatria','ginecologia',
                'hematologia','hepatologia','enfermedadesInfecciosas','medicinaInterna','nefrologia','neumologia','neurologia','neurocirugia',
                'oftalmologia','otorrinolaringologia','oncologia','pediatria','proctologia','psiquiatria','rehabilitacionMDeportiva','reumatologia','traumatologia','urologia']);

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

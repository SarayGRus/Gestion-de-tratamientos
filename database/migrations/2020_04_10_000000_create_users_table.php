<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('surname');
            $table->string('dni');
            $table->string('telephone');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();

            //atributos de las clases hijas
            //médico
            $table->string('collegiateNumber')->nullable();
            //paciente
            $table->string('nuhsa')->nullable();
            $table->Date('birthday')->nullable();
            $table->string('address')->nullable();
            //atributo para diferenciar el tipo de usuario
            $table->enum('userType', ['medico', 'paciente']);

            //foreing key medico
            $table->unsignedBigInteger('clinic_id')->nullable();
            $table->unsignedBigInteger('specialty_id')->nullable();

            $table->foreign('clinic_id')->references('id')->on('clinics');
            $table->foreign('specialty_id')->references('id')->on('specialties');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}

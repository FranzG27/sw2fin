<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('form1s', function (Blueprint $table) {
            $table->id();
            $table->string('ci');
            $table->string('departamento');
            $table->string('domicilio');
            $table->integer('edad');
            $table->string('email');
            $table->string('estadoCivil');
            $table->date('fecha');
            $table->string('gradoInstruccion');
            $table->time('hora');
            $table->string('lugarTrabajo');
            $table->date('fechaNacimiento');
            $table->string('nombreCompleto');
            $table->string('ocupacion');
            $table->string('procendencia');
            $table->string('profesion');
            $table->string('sexo');
            $table->string('telefono');
            $table->string('telefonoEmergencia');
            $table->string('tipoDonacion');
            $table->string('zona');

            
            $table->timestamps();
        });

       
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('form1s');
    }
};

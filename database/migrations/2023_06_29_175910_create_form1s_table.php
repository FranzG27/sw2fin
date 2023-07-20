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
        $table->string('ci')->nullable();
        $table->string('departamento')->nullable();
        $table->string('domicilio')->nullable();
        $table->integer('edad')->nullable();
        $table->string('email')->nullable();
        $table->string('estadoCivil')->nullable();
        $table->date('fecha')->nullable();
        $table->string('gradoInstruccion')->nullable();
        //$table->time('hora')->nullable();
        $table->string('lugarTrabajo')->nullable();
        $table->date('fechaNacimiento')->nullable();
        $table->string('nombreCompleto')->nullable();
        $table->string('ocupacion')->nullable();
        $table->string('procendencia')->nullable();
        $table->string('profesion')->nullable();
        $table->string('sexo')->nullable();
        $table->string('telefono')->nullable();
        $table->string('telefonoEmergencia')->nullable();
        $table->string('tipoDonacion')->nullable();
        $table->string('zona')->nullable();
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

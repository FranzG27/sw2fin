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
        Schema::create('form2s', function (Blueprint $table) {
            $table->id();
            $table->boolean('alergia');
            $table->boolean('bloodDisease');
            $table->boolean('cambioPareja');
            $table->boolean('carcel');
            $table->boolean('chagas');
            $table->boolean('chagasFamiliar');
            $table->boolean('cold');
            $table->boolean('contagioEnfermedad');
            $table->boolean('convulsiones');
            $table->boolean('dental');
            $table->boolean('drogas');
            $table->boolean('embarazo');
            $table->boolean('estadoAnimo');
            $table->boolean('ets');
            $table->boolean('etsdisease')->nullable();
            $table->boolean('fiebre');
            $table->boolean('heartDisease');
            $table->boolean('hepatitis');
            $table->boolean('longTreatment');
            $table->boolean('malaria');
            $table->boolean('medicacion');
            $table->string('motivo');
            $table->boolean('motivoPrueba');
            $table->boolean('nuevo');
            $table->boolean('pulmon');
            $table->boolean('rechazadoS');
            $table->boolean('recentMedication');
            $table->boolean('sida');
            $table->boolean('sidaContagio');
            $table->boolean('sidaPrueba');
            $table->boolean('sifilis');
            $table->boolean('tatuaje');
            $table->boolean('tos');
            $table->boolean('transfusion');
            $table->boolean('vacuna');
            $table->boolean('vinchuca');
            $table->unsignedBigInteger('id_donor');

            //$table->foreign('id_donor')->references('id')->on('donors')->onUpdate('cascade')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('form2s');
    }
};

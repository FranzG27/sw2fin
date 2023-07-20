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
        $table->boolean('alergia')->nullable();
        $table->boolean('bloodDisease')->nullable();
        $table->boolean('cambioPareja')->nullable();
        $table->boolean('carcel')->nullable();
        $table->boolean('chagas')->nullable();
        $table->boolean('chagasFamiliar')->nullable();
        $table->boolean('cold')->nullable();
        $table->boolean('contagioEnfermedad')->nullable();
        $table->boolean('convulsiones')->nullable();
        $table->boolean('dental')->nullable();
        $table->boolean('drogas')->nullable();
        $table->boolean('embarazo')->nullable();
        $table->boolean('estadoAnimo')->nullable();
        $table->boolean('ets')->nullable();
        $table->string('etsdisease')->nullable();
        $table->boolean('fiebre')->nullable();
        $table->boolean('heartDisease')->nullable();
        $table->boolean('hepatitis')->nullable();
        $table->boolean('longTreatment')->nullable();
        $table->boolean('malaria')->nullable();
        $table->boolean('medicacion')->nullable();
        $table->string('motivo')->nullable();
        $table->boolean('motivoPrueba')->nullable();
        $table->boolean('nuevo')->nullable();
        $table->boolean('pulmon')->nullable();
        $table->boolean('rechazadoS')->nullable();
        $table->boolean('recentMedication')->nullable();
        $table->boolean('sida')->nullable();
        $table->boolean('sidaContagio')->nullable();
        $table->boolean('sidaPrueba')->nullable();
        $table->boolean('sifilis')->nullable();
        $table->boolean('tatuaje')->nullable();
        $table->boolean('tos')->nullable();
        $table->boolean('transfusion')->nullable();
        $table->boolean('vacuna')->nullable();
        $table->boolean('vinchuca')->nullable();
        $table->unsignedBigInteger('id_donor');
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

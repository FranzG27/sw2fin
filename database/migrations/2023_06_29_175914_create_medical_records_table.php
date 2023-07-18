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
        Schema::create('medical_records', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->boolean('isAccepted');
            $table->unsignedBigInteger('id_donor');
            $table->unsignedBigInteger('id_form1');
            $table->unsignedBigInteger('id_form2');
            
            $table->foreign('id_donor')->references('id')->on('donors')->onUpdate('cascade')->onDelete('cascade');
            
            $table->foreign('id_form1')->references('id')->on('form1s')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('id_form2')->references('id')->on('form2s')->onUpdate('cascade')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medical_records');
    }
};

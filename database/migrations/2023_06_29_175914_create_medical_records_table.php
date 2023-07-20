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
            $table->unsignedBigInteger('form1_id')->nullable();
            $table->unsignedBigInteger('form2_id')->nullable();
            
            $table->foreign('id_donor')->references('id')->on('donors')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('form1_id')->references('id')->on('form1s')->onDelete('set null');
            $table->foreign('form2_id')->references('id')->on('form2s')->onDelete('set null');

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

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
        Schema::create('samples', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->boolean('isAccepted');
            $table->unsignedBigInteger('id_donor');
            $table->unsignedBigInteger('id_type');
            $table->unsignedBigInteger('id_returnFile')->nullable();
            //$table->unsignedBigInteger('id_Inventory')->nullable();
            

            $table->foreign('id_donor')->references('id')->on('donors')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('id_type')->references('id')->on('blood_types')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('id_returnFile')->references('id')->on('return_files')->onUpdate('cascade')->onDelete('cascade');
            //$table->foreign('id_Inventory')->references('id')->on('blood_inventories')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('samples');
    }
};

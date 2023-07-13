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
        Schema::create('loan_files', function (Blueprint $table) {
            $table->id();
            $table->date('accidentDate');
            $table->string('nameHospital');
            $table->string('nameDoctor');
            $table->text('description');
            $table->integer('quantity');
            $table->unsignedBigInteger('id_applicant');
            $table->unsignedBigInteger('id_status');
            
            $table->foreign('id_applicant')->references('id')->on('applicants')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('id_status')->references('id')->on('loan_statuses')->onUpdate('cascade')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('loan_files');
    }
};

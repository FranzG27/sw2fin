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
        Schema::create('return_files', function (Blueprint $table) {
            $table->id();
            $table->date('startDate');
            $table->date('endDate');
            $table->integer('debt');
            $table->boolean('isCanceled')->default(false);
            $table->unsignedBigInteger('id_loanFile');
            
            $table->foreign('id_loanFile')->references('id')->on('loan_files')->onUpdate('cascade')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('return_files');
    }
};

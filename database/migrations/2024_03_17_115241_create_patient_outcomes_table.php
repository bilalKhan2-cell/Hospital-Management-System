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
        Schema::create('patient_outcomes', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('patient_outcome')->unsigned();
            $table->date('result_date');
            $table->bigInteger('patient_recieving_id')->unsigned();
            $table->bigInteger('user_id')->unsigned();
            $table->string('final_notes')->nullable();
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('patient_recieving_id')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patient_outcomes');
    }
};

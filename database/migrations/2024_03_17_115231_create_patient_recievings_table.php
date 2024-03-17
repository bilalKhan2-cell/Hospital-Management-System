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
        Schema::create('patient_recievings', function (Blueprint $table) {
            $table->id();
            $table->string('attendant_name');
            $table->string('attendant_contact_info');
            $table->string('attendant_cnic');
            $table->bigInteger('patient_id')->unsigned();
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('ward_id')->unsigned();
            $table->bigInteger('is_admitted')->unsigned();
            $table->string('notes')->nullable();
            $table->foreign('patient_id')->references('id')->on('patients');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('ward_id')->references('id')->on('wards');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patient_recievings');
    }
};

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
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('fname');
            $table->string('contact_info')->nullable();
            $table->string('cnic')->nullable()->unique();
            $table->string('address')->nullable();
            $table->bigInteger('doctor_id')->nullable()->unsigned();
            $table->string('gender');
            $table->tinyInteger('age')->unsigned();
            $table->tinyInteger('is_checkup')->unsigned()->default(0);
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patients');
    }
};

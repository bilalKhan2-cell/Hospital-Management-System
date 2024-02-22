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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('cnic')->unique();
            $table->string('contact_info');
            $table->text('address');
            $table->bigInteger('ward_id')->unsigned()->nullable();
            $table->bigInteger('department_id')->unsigned()->nullable();
            $table->bigInteger('block_id')->unsigned()->nullable();
            $table->bigInteger('designation_id')->unsigned()->nullable();
            $table->rememberToken();
            $table->tinyInteger('pass_code')->unsigned()->nullable();
            $table->tinyInteger('status')->unsigned();
            $table->timestamps();
            $table->foreign('ward_id')->references('id')->on('wards');
            $table->foreign('department_id')->references('id')->on('departments');
            $table->foreign('block_id')->references('id')->on('blocks');
            $table->foreign('designation_id')->references('id')->on('designations');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};

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
        Schema::create('stock_requests_master', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('initiated_by')->unsigned();
            $table->bigInteger('approved_by')->unsigned();
            $table->foreign('initiated_by')->references('id')->on('users');
            $table->foreign('approved_by')->references('id')->on('users');
            $table->tinyInteger('is_approved')->unsigned();
            $table->string('notes')->nullable();
            $table->tinyInteger('is_processed')->unsigned();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stock_requests_master');
    }
};

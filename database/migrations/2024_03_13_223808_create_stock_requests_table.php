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
        Schema::create('stock_requests', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('medicine_id')->unsigned();
            $table->mediumInteger('quantity')->unsigned();
            $table->tinyInteger('is_approved')->unsigned();
            $table->mediumInteger('approved_quantity')->unsigned();
            $table->bigInteger('initiated_by')->unsigned();
            $table->string('notes')->nullable();
            $table->bigInteger('approved_by')->unsigned();
            $table->foreign('initiated_by')->references('id')->on('users');
            $table->foreign('approved_by')->references('id')->on('users');
            $table->foreign('medicine_id')->references('id')->on('items');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stock_requests');
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('flights', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id');
            $table->foreign('product_id')->references('id')->on('products')->onDelete("cascade");
            $table->unsignedBigInteger('departure_city_id');
            $table->foreign('departure_city_id')->references('id')->on('cities')->onDelete("cascade");
            $table->unsignedBigInteger('arrival_city_id');
            $table->foreign('arrival_city_id')->references('id')->on('cities')->onDelete("cascade");
            $table->dateTime('departure_date');
            $table->dateTime('arrival_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('flights');
    }
};

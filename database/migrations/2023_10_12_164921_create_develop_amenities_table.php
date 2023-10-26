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
        Schema::create('develop_amenities', function (Blueprint $table) {
            $table->bigInteger('develop_id')->unsigned();
            $table->bigInteger('amenity_id')->unsigned();
            $table->string('value');
            $table->timestamps();

            $table->foreign('develop_id')->references('id')->on('develops')->onDelete('cascade');
            $table->foreign('amenity_id')->references('id')->on('amenities')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('develop_amenities');
    }
};

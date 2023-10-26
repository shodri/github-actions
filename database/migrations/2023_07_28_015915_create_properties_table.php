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
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('develop_id')->unsigned();
            $table->bigInteger('utype_id')->unsigned();
            $table->string('name');
            $table->integer('total_size')->unsigned();
            $table->integer('covered_size')->unsigned();
            $table->integer('uncovered_size')->unsigned();
            $table->integer('total_areas')->unsigned();
            $table->integer('bedrooms')->unsigned();
            $table->integer('bathrooms')->unsigned();
            $table->string('views')->nullable();
            $table->string('orientation')->nullable();
            $table->text('description');
            $table->text('details');
            $table->timestamps();

            $table->foreign('develop_id')->references('id')->on('develops')->onDelete('cascade');
            $table->foreign('utype_id')->references('id')->on('utypes')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
};

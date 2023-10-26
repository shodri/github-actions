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
        Schema::create('dstages', function (Blueprint $table) {
            $table->id('id');
            $table->string('name');
            $table->bigInteger('develop_id')->unsigned();
            $table->date('start_date')->nullable();
            $table->date('started_date')->nullable();
            $table->date('finish_date')->nullable();
            $table->date('finished_date')->nullable();
            $table->bigInteger('phase_id')->unsigned();
            $table->string('status',10)->default('enabled');
            $table->timestamps();

            $table->foreign('develop_id')->references('id')->on('develops')->onDelete('cascade');
            $table->foreign('phase_id')->references('id')->on('phases')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dstages');
    }
};

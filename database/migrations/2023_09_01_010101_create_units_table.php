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
        Schema::create('units', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('property_id')->unsigned();
            $table->bigInteger('dstage_id')->unsigned();
            $table->string('name', 100);
            $table->bigInteger('broker_id')->unsigned()->nullable();
            $table->bigInteger('agent_id')->unsigned()->nullable();
            $table->string('status', 30);
            $table->date('status_date')->nullable();
            $table->timestamps();

            $table->foreign('property_id')->references('id')->on('properties')->onDelete('restrict');
            $table->foreign('dstage_id')->references('id')->on('dstages')->onDelete('cascade');
            $table->foreign('broker_id')->references('id')->on('brokers')->onDelete('restrict');
            $table->foreign('agent_id')->references('id')->on('agents')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('units');
    }
};

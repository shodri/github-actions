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
        Schema::create('unit_prices', function (Blueprint $table) {
            $table->bigInteger('unit_id')->unsigned();
            $table->bigInteger('phase_id')->unsigned();
            $table->decimal('price', 15, 0)->unsigned();
            $table->timestamps();

            $table->primary(['unit_id','phase_id']);
            
            $table->foreign('unit_id')->references('id')->on('units')->onDelete('cascade');
            $table->foreign('phase_id')->references('id')->on('phases')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('unit_prices');
    }
};

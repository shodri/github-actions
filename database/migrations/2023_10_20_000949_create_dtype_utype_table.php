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
        Schema::create('dtype_utype', function (Blueprint $table) {
            $table->bigInteger('dtype_id')->unsigned();
            $table->bigInteger('utype_id')->unsigned();

            $table->foreign('dtype_id')->references('id')->on('dtypes')->onDelete('cascade');
            $table->foreign('utype_id')->references('id')->on('utypes')->onDelete('cascade');

            $table->primary(['dtype_id', 'utype_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dtype_utype');
    }
};

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
        Schema::create('dtypes', function (Blueprint $table) {
            $table->id();
            $table->string('name', 60);
            $table->bigInteger('dclass_id')->unsigned();
            $table->timestamps();

            $table->foreign('dclass_id')->references('id')->on('dclasses');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dtypes');
    }
};

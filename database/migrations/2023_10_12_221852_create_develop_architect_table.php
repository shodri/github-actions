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
        Schema::create('develop_architect', function (Blueprint $table) {
            $table->bigInteger('develop_id')->unsigned();
            $table->foreign('develop_id')->references('id')->on('develops')->onDelete('cascade');
            $table->bigInteger('architect_id')->unsigned();
            $table->foreign('architect_id')->references('id')->on('architects')->onDelete('cascade');
            $table->string('role', 10);
            $table->timestamps();

            $table->primary(['develop_id','architect_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('develop_architect');
    }
};

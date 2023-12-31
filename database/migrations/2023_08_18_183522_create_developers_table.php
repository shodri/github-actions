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
        Schema::create('developers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('licence')->nullable();
            $table->string('address');
            $table->string('country',2)->nullable();
            $table->string('state')->nullable();
            $table->string('city')->nullable();
            $table->string('zipcode',10)->nullable();
            $table->string('email',100);
            $table->string('phone',50)->nullable();
            $table->string('whatsapp',50)->nullable();
            $table->string('url')->nullable();
            $table->text('short_description')->nullable()->nullable();
            $table->text('long_description')->nullable()->nullable();
            $table->string('image')->nullable();
            $table->json('speciality');
            $table->string('social_networks')->nullable()->nullable();
            $table->string('status',8)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('developers');
    }
};

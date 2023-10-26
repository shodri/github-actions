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
        Schema::create('develops', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->bigInteger('dtype_id')->unsigned();
            $table->string('address')->nullable();
            $table->string('city', 100)->nullable();
            $table->string('state', 100)->nullable();
            $table->string('country',50)->nullable();
            $table->string('zipcode',20)->nullable();            
            $table->text('description')->nullable();
            $table->text('details')->nullable();
            $table->text('payment_modes')->nullable();
            $table->text('amenities_ext')->nullable();
            $table->string('status');
            $table->timestamps();

            $table->foreign('dtype_id')->references('id')->on('dtypes')->onUpdate('cascade')->onDetele('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('develops');
    }
};

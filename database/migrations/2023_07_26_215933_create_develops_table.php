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
            $table->string('address')->default('');
            $table->string('city', 100)->default('');
            $table->string('state', 100)->default('');
            $table->string('country',50)->default('');
            $table->string('zipcode',20)->nullable();            
            $table->text('description')->default('');
            $table->text('details')->default('');
            $table->text('payment_modes')->default('');
            $table->text('amenities_ext')->default('');
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

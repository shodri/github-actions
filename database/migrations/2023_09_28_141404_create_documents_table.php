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
        Schema::create('documents', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->morphs('documentable');
            $table->text('description')->nullable();
            $table->string('type',15)->nullable()->comment('brochure, plane, picture, photo');
            $table->string('subtype',15)->nullable()->comment('frontpage,galery');
            $table->integer('order')->unsigned();
            $table->string('class')->nullable()->comment('document, image, other');
            $table->enum('mode',['internal','external'])->default('internal')->comment('Internal or external where the path may be treated as a link');
            $table->string('mime')->nullable()->comment('the mime type of the document');
            $table->string('path')->comment('if external document is the link else is an internal path');
            $table->enum('status',['enabled','disabled'])->default('enabled');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('documents');
    }
};

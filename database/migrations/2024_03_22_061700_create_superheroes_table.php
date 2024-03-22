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
        Schema::create('superheroes', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->string('real_name');
            $table->string('photo_url');
            $table->unsignedBigInteger('gender_id');
            $table->unsignedBigInteger('universe_id');
            $table->foreign('gender_id')->references('id')->on('genders');
            $table->foreign('universe_id')->references('id')->on('universes');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('superheroes');
    }
};

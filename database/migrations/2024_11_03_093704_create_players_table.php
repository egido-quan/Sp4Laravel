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
        Schema::create('players', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('family_name');
            $table->integer('ranking');
            $table->string('email')->unique();
            $table->integer('height');
            $table->enum('playing_hand', ['left', 'right']);
            $table->enum('backhand_style', ['one hand', 'two hands']);
            $table->text('briefing');
            $table->string('picture_route')->nullable;
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('players');
    }
};

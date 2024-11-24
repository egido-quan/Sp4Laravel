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
        Schema::create('challenges', function (Blueprint $table) {
            $table->id();
            $table->foreignId('player1_id')->constrained('players')->onUpdate('cascade');
            $table->foreignId('player2_id')->constrained('players')->onUpdate('cascade');
            $table->integer('p1_set1');
            $table->integer('p1_set2');
            $table->integer('p1_set3')->nullable;
            $table->integer('p2_set1');
            $table->integer('p2_set2');
            $table->integer('p2_set3')->nullable;
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('challenges');
    }
};

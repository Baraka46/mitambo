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
        Schema::create('godown_packages', function (Blueprint $table) {
            $table->id();
            $table->string('tracking_id');
            $table->string('godown');
            $table->string('section');
            $table->string('row');
            $table->string('position'); // juu au chini
            $table->string('status')->default('not taken'); // loaded / taken
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('godown_packages');
    }
};

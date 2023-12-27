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
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->string('Synthetic')->nullable();
            $table->string('Litre')->nullable();
            $table->string('API')->nullable();
            $table->string('ACEA')->nullable();
            $table->string('SAE')->nullable();
            $table->string('packing')->nullable();
            $table->string('price')->nullable();

            $table->string('remark')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};

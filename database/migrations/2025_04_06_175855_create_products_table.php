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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('sku');
            $table->text('description');
            $table->string('image_path')->default('products/logo.png');
            $table->float('price');
            $table->boolean('is_active')->default(true);
            $table->foreignId('presentation_id')->constrained();
            $table->foreignId('subcategory_id')->constrained();
            $table->float('max_temperature')->nullable();
            $table->float('min_temperature')->nullable();
            $table->float('time_to_melt')->nullable();
            $table->float('temperature_to_melt')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};

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
            $table->text('full_name');
            $table->string('provider');
            $table->string('source_category_id');
            $table->integer('dialer_price');
            $table->integer('retail_price');
            $table->integer('quantity');
            $table->text('description');
            $table->string('brand');
            $table->integer('weight');
            $table->json('images');
            $table->text('source_url');
            $table->string('part_number');
            $table->foreignId('subcategory_id')->constrained()->onDelete('cascade');
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

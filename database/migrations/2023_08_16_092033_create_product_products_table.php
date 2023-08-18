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
        Schema::create('product_products', function (Blueprint $table) {
            $table->unsignedBigInteger('main_product_id');
            $table->unsignedBigInteger('related_product_id');
            $table->foreign('main_product_id')->references('id')->on('products');
            $table->foreign('related_product_id')->references('id')->on('products');
            $table->primary(['main_product_id', 'related_product_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_products');
    }
};

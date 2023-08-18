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
        Schema::table('tag_products', function (Blueprint $table) {
            $table->foreignId("product_id")->constrained(table:"products");
            $table->foreignId('tag_id')->constrained(table:"tags");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tag_products', function (Blueprint $table) {
            //
        });
    }
};

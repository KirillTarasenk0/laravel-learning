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
        Schema::drop('test_products');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::create('test_products', function (Blueprint $table) {
            $table->id('test_products_id');
            $table->string('name');
            $table->string('description');
            $table->float('price');
            $table->timestamp('created_at');
            $table->timestamp('updated_at');
        });
    }
};

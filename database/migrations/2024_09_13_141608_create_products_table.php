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
            $table->integer('product_category_id')->nullable()->default(null);
            $table->string('name')->nullable()->default('');
            $table->decimal('price', 16, 5)->nullable()->default(0);
            $table->text('cover')->nullable()->default(null);
            $table->text('description')->nullable()->default('');
            $table->text('addtional_info')->nullable()->default('');
            $table->integer('created_by')->nullable()->default(null);
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

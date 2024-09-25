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
        Schema::create('activities', function (Blueprint $table) {
            $table->id();
            $table->integer('category_id')->nullable()->default(null);
            $table->string('title')->nullable()->default('');
            $table->text('location')->nullable()->default('');
            $table->text('cover')->nullable()->default(null);
            $table->date('date')->nullable()->default(null);
            $table->text('description')->nullable()->default('');
            $table->text('tags')->nullable()->default(null);
            $table->integer('likes')->nullable()->default(0);
            $table->integer('dislikes')->nullable()->default(0);
            $table->integer('created_by')->nullable()->default(null);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('activities');
    }
};

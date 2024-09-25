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
        Schema::create('company_profiles', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable()->default('');
            $table->text('logo')->nullable()->default('');
            $table->string('email')->nullable()->default('');
            $table->text('locations')->nullable()->default('');
            $table->text('description')->nullable()->default('');
            $table->string('hotline')->nullable()->default('');
            $table->string('maps')->nullable()->default('');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('company_profiles');
    }
};

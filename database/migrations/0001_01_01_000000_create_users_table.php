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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email', 191)->unique(); // Disarankan menggunakan panjang 191 untuk mendukung utf8mb4
            $table->string('phone_number')->nullable()->default(null);
            $table->timestamp('email_verified_at')->nullable()->default(null);
            $table->text('image_url')->nullable()->default(null);
            $table->string('password');
            $table->rememberToken();
            $table->text('reset_token')->nullable();
            $table->timestamp('reset_token_created_at')->nullable();
            $table->boolean('reset_token_used')->default(false); // Disarankan boolean tidak nullable
            $table->boolean('is_active')->default(true); // Disarankan boolean tidak nullable
            $table->dateTime('deleted_at')->nullable()->default(null);
            $table->timestamps();
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email', 191)->primary(); // Menggunakan panjang 191 agar aman untuk utf8mb4
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id', 191)->primary(); // Menggunakan panjang 191
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};

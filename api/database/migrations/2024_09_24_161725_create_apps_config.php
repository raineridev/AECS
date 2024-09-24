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
        Schema::create('apps_config', function (Blueprint $table) {
            $table->id();
            $table->foreignId('app_id')->constrained('apps');
            $table->foreignId('user_id')->constrained('users');
            $table->boolean('is_active')->default(true);
            $table->json('config');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('apps_config');
    }
};

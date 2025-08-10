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
        Schema::create('learning_sessions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            
            // Contexte
            $table->foreignId('programme_id')->nullable();
            $table->foreignId('module_id')->nullable();
            $table->foreignId('lesson_id')->nullable();
            
            // Timing
            $table->timestamp('started_at')->useCurrent();
            $table->timestamp('ended_at')->nullable();
            $table->integer('duration_seconds')->nullable();
            
            // Activité
            $table->integer('components_viewed')->default(0);
            $table->integer('components_completed')->default(0);
            $table->integer('xp_earned')->default(0);
            
            // Device info
            $table->string('device_type', 50)->nullable();
            $table->string('browser', 100)->nullable();
            $table->ipAddress('ip_address')->nullable();
            
            $table->timestamps();
            
            // Index
            $table->index('user_id');
            $table->index('started_at');
            $table->index(['user_id', 'started_at']);
            
            // Foreign keys
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('programme_id')->references('id')->on('programmes')->onDelete('set null');
            $table->foreign('module_id')->references('id')->on('modules')->onDelete('set null');
            $table->foreign('lesson_id')->references('id')->on('lessons')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('learning_sessions');
    }
};

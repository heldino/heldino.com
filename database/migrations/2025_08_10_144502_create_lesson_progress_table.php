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
        Schema::create('lesson_progress', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreignId('lesson_id');
            
            // Position actuelle
            $table->integer('current_component_index')->default(0);
            $table->integer('completed_components_count')->default(0);
            $table->integer('total_components_count')->default(0);
            
            // Progression
            $table->decimal('progress_percentage', 5, 2)->default(0.00);
            $table->string('status', 50)->default('not_started');
            
            // Performance
            $table->integer('score')->nullable();
            $table->integer('max_score')->nullable();
            $table->integer('attempts_count')->default(0);
            $table->integer('time_spent_seconds')->default(0);
            
            // XP et récompenses gagnées
            $table->integer('xp_earned')->default(0);
            $table->integer('coins_earned')->default(0);
            
            // Dates
            $table->timestamp('started_at')->nullable();
            $table->timestamp('completed_at')->nullable();
            $table->timestamp('last_accessed_at')->nullable();
            
            $table->timestamps();
            
            // Contrainte unique
            $table->unique(['user_id', 'lesson_id']);
            
            // Index
            $table->index('user_id');
            $table->index('lesson_id');
            $table->index('status');
            $table->index(['user_id', 'status']);
            
            // Foreign keys
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('lesson_id')->references('id')->on('lessons')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lesson_progress');
    }
};

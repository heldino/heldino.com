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
        Schema::create('component_responses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreignId('component_id');
            $table->foreignId('lesson_progress_id')->nullable();
            
            // Réponse
            $table->json('response_data');
            $table->boolean('is_correct')->nullable();
            $table->integer('score')->nullable();
            $table->integer('max_score')->nullable();
            
            // Feedback
            $table->json('feedback_shown')->nullable();
            $table->integer('hints_used')->default(0);
            
            // Timing
            $table->integer('time_spent_seconds')->nullable();
            $table->timestamp('submitted_at')->useCurrent();
            
            // Tentative
            $table->integer('attempt_number')->default(1);
            
            $table->timestamps();
            
            // Index
            $table->index('user_id');
            $table->index('component_id');
            $table->index('submitted_at');
            $table->index(['user_id', 'is_correct']);
            
            // Foreign keys
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('component_id')->references('id')->on('lesson_components')->onDelete('cascade');
            $table->foreign('lesson_progress_id')->references('id')->on('lesson_progress')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('component_responses');
    }
};

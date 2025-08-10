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
        Schema::create('user_badges', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreignId('badge_id');
            
            // Contexte d'obtention
            $table->timestamp('earned_at')->useCurrent();
            $table->foreignId('programme_id')->nullable();
            $table->foreignId('lesson_id')->nullable();
            
            $table->timestamps();
            
            // Contrainte unique
            $table->unique(['user_id', 'badge_id']);
            
            // Index
            $table->index('user_id');
            $table->index('earned_at');
            $table->index(['user_id', 'earned_at']);
            
            // Foreign keys
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('badge_id')->references('id')->on('badges')->onDelete('cascade');
            $table->foreign('programme_id')->references('id')->on('programmes')->onDelete('set null');
            $table->foreign('lesson_id')->references('id')->on('lessons')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_badges');
    }
};

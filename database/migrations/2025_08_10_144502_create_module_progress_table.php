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
        Schema::create('module_progress', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreignId('module_id');
            
            // Progression
            $table->decimal('progress_percentage', 5, 2)->default(0.00);
            $table->integer('completed_lessons_count')->default(0);
            
            // Statut
            $table->string('status', 50)->default('not_started');
            
            // Dates
            $table->timestamp('started_at')->nullable();
            $table->timestamp('completed_at')->nullable();
            $table->timestamp('last_accessed_at')->nullable();
            
            $table->timestamps();
            
            // Contrainte unique
            $table->unique(['user_id', 'module_id']);
            
            // Index
            $table->index('user_id');
            $table->index('module_id');
            $table->index(['user_id', 'status']);
            
            // Foreign keys
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('module_id')->references('id')->on('modules')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('module_progress');
    }
};

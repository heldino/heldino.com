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
        Schema::create('lesson_components', function (Blueprint $table) {
            $table->id();
            $table->foreignId('lesson_id');
            
            // Organisation
            $table->integer('order_index');
            
            // Type et contenu du composant
            $table->string('component_type', 50);
            $table->json('content');
            
            // Configuration
            $table->boolean('is_required')->default(false);
            $table->integer('min_score_required')->nullable();
            $table->integer('max_attempts')->nullable();
            $table->integer('time_limit_seconds')->nullable();
            
            // Points et récompenses
            $table->integer('xp_reward')->default(0);
            $table->integer('coins_reward')->default(0);
            
            // Métadonnées
            $table->timestamps();
            
            // Contrainte unique
            $table->unique(['lesson_id', 'order_index']);
            
            // Index
            $table->index('lesson_id');
            $table->index('component_type');
            $table->index(['lesson_id', 'order_index']);
            
            // Foreign keys
            $table->foreign('lesson_id')->references('id')->on('lessons')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lesson_components');
    }
};

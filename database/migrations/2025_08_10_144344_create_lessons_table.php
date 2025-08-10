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
        Schema::create('lessons', function (Blueprint $table) {
            $table->id();
            $table->foreignId('module_id');
            $table->string('slug', 100);
            $table->string('title');
            $table->text('description')->nullable();
            
            // Organisation
            $table->integer('order_index');
            $table->integer('estimated_minutes')->nullable();
            
            // Type de leçon
            $table->string('lesson_type', 50)->default('standard');
            $table->integer('difficulty_level')->nullable()->check('difficulty_level BETWEEN 1 AND 5');
            
            // Points et récompenses
            $table->integer('xp_reward')->default(10);
            $table->integer('coins_reward')->default(0);
            
            // Métadonnées
            $table->boolean('is_published')->default(false);
            $table->timestamps();
            
            // Contraintes uniques
            $table->unique(['module_id', 'slug']);
            $table->unique(['module_id', 'order_index']);
            
            // Index
            $table->index('module_id');
            $table->index(['module_id', 'order_index']);
            $table->index('lesson_type');
            
            // Foreign keys
            $table->foreign('module_id')->references('id')->on('modules')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lessons');
    }
};

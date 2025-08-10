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
        Schema::create('programmes', function (Blueprint $table) {
            $table->id();
            $table->string('slug', 100)->unique();
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('short_description', 500)->nullable();
            $table->text('cover_image_url')->nullable();
            $table->text('icon_url')->nullable();
            
            // Catégorisation
            $table->string('category', 100)->nullable();
            $table->integer('difficulty_level')->nullable()->check('difficulty_level BETWEEN 1 AND 5');
            $table->integer('estimated_hours')->nullable();
            
            // Prérequis et métadonnées
            $table->json('prerequisites')->default('[]');
            $table->json('tags')->default('[]');
            $table->string('language', 5)->default('fr-FR');
            
            // Statistiques
            $table->integer('enrolled_count')->default(0);
            $table->integer('completion_count')->default(0);
            $table->decimal('average_rating', 2, 1)->nullable();
            
            // Contrôle d'accès
            $table->boolean('is_published')->default(false);
            $table->boolean('is_free')->default(true);
            $table->decimal('price', 10, 2)->nullable();
            
            // Métadonnées
            $table->foreignId('created_by')->nullable()->constrained('users')->onDelete('set null');
            $table->timestamp('published_at')->nullable();
            $table->timestamps();
            
            // Index
            $table->index('slug');
            $table->index('category');
            $table->index('is_published');
            $table->index(['category', 'difficulty_level', 'is_published']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('programmes');
    }
};

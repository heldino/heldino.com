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
        Schema::create('modules', function (Blueprint $table) {
            $table->id();
            $table->foreignId('programme_id');
            $table->string('slug', 100);
            $table->string('title');
            $table->text('description')->nullable();
            
            // Organisation
            $table->integer('order_index');
            $table->integer('estimated_minutes')->nullable();
            
            // Prérequis
            $table->json('prerequisite_modules')->nullable();
            $table->json('unlock_condition')->nullable();
            
            // Métadonnées
            $table->boolean('is_published')->default(false);
            $table->timestamps();
            
            // Contraintes uniques
            $table->unique(['programme_id', 'slug']);
            $table->unique(['programme_id', 'order_index']);
            
            // Index
            $table->index('programme_id');
            $table->index(['programme_id', 'order_index']);
            
            // Foreign keys
            $table->foreign('programme_id')->references('id')->on('programmes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('modules');
    }
};

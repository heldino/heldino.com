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
        Schema::create('component_templates', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('component_type', 50);
            $table->string('category', 100)->nullable();
            $table->text('description')->nullable();
            $table->json('content');
            $table->json('tags')->default('[]');
            
            // Métadonnées
            $table->foreignId('created_by')->nullable();
            $table->boolean('is_public')->default(false);
            $table->timestamps();
            
            // Index
            $table->index('component_type');
            $table->index('is_public');
            $table->index(['component_type', 'is_public']);
            
            // Foreign keys
            $table->foreign('created_by')->references('id')->on('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('component_templates');
    }
};

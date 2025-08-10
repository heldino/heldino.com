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
        Schema::create('badges', function (Blueprint $table) {
            $table->id();
            $table->string('slug', 100)->unique();
            $table->string('name');
            $table->text('description')->nullable();
            $table->text('icon_url')->nullable();
            
            // Catégorie et rareté
            $table->string('category', 100)->nullable();
            $table->string('rarity', 50)->nullable();
            
            // Condition d'obtention
            $table->json('unlock_condition');
            
            // Points
            $table->integer('xp_reward')->default(0);
            
            $table->timestamps();
            
            // Index
            $table->index('slug');
            $table->index('category');
            $table->index('rarity');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('badges');
    }
};

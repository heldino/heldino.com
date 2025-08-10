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
        Schema::create('programme_enrollments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreignId('programme_id');
            
            // Progression
            $table->decimal('progress_percentage', 5, 2)->default(0.00);
            $table->integer('completed_modules_count')->default(0);
            $table->integer('completed_lessons_count')->default(0);
            
            // Statut
            $table->string('status', 50)->default('active');
            
            // Dates importantes
            $table->timestamp('enrolled_at')->useCurrent();
            $table->timestamp('started_at')->nullable();
            $table->timestamp('completed_at')->nullable();
            $table->timestamp('last_accessed_at')->nullable();
            
            // Certificat
            $table->boolean('certificate_issued')->default(false);
            $table->timestamp('certificate_issued_at')->nullable();
            $table->text('certificate_url')->nullable();
            
            $table->timestamps();
            
            // Contrainte unique
            $table->unique(['user_id', 'programme_id']);
            
            // Index
            $table->index('user_id');
            $table->index('programme_id');
            $table->index('status');
            $table->index(['user_id', 'status']);
            
            // Foreign keys
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('programme_id')->references('id')->on('programmes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('programme_enrollments');
    }
};

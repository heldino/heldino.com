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
        Schema::table('users', function (Blueprint $table) {
            // Ne pas changer l'ID pour éviter les problèmes SQLite
            $table->string('username', 100)->nullable()->unique();
            $table->string('first_name', 100)->nullable();
            $table->string('last_name', 100)->nullable();
            $table->text('avatar_url')->nullable();
            $table->text('bio')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->char('country', 2)->nullable();
            $table->string('language', 5)->default('fr-FR');
            $table->string('timezone', 50)->default('Europe/Paris');
            
            // Gamification globale
            $table->integer('total_xp')->default(0);
            $table->integer('level')->default(1);
            $table->integer('streak_days')->default(0);
            $table->date('last_activity_date')->nullable();
            
            // Préférences
            $table->boolean('email_notifications')->default(true);
            $table->boolean('sound_enabled')->default(true);
            $table->boolean('dark_mode')->default(false);
            
            // Métadonnées
            $table->boolean('is_active')->default(true);
            $table->string('role', 50)->default('student');
            $table->timestamp('last_login_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'username', 'first_name', 'last_name', 'avatar_url', 'bio',
                'date_of_birth', 'country', 'language', 'timezone',
                'total_xp', 'level', 'streak_days', 'last_activity_date',
                'email_notifications', 'sound_enabled', 'dark_mode',
                'is_active', 'role', 'last_login_at'
            ]);
            
            $table->dropIndex(['users_username_index']);
            $table->dropIndex(['users_role_index']);
            $table->dropIndex(['users_is_active_role_index']);
        });
    }
};

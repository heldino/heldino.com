<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Admin principal
        User::firstOrCreate(
            ['email' => 'admin@heldino.com'],
            [
                'name' => 'Heldino Admin',
                'password' => Hash::make('password'),
                'email_verified_at' => now(),
            ]
        );

        // Utilisateur LMS test
        User::firstOrCreate(
            ['email' => 'student@learnycool.com'],
            [
                'name' => 'Étudiant Test',
                'password' => Hash::make('password'),
                'email_verified_at' => now(),
            ]
        );

        // Formateur test
        User::firstOrCreate(
            ['email' => 'teacher@learnycool.com'],
            [
                'name' => 'Formateur Bio-résonance',
                'password' => Hash::make('password'),
                'email_verified_at' => now(),
            ]
        );

        // Générer des utilisateurs aléatoires pour les statistiques
        User::factory(20)->create();
        
        // Utilisateurs récents (pour les stats du mois)
        User::factory(5)->create([
            'created_at' => now()->subDays(rand(1, 30)),
        ]);

        $this->command->info('Utilisateurs créés avec succès !');
        $this->command->info('Admin: admin@heldino.com / password');
        $this->command->info('Étudiant: student@learnycool.com / password');
        $this->command->info('Formateur: teacher@learnycool.com / password');
    }
}

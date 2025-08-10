<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            ProgrammeSeeder::class,
        ]);

        $this->command->info('🎉 Base de données initialisée avec succès !');
        $this->command->info('🔐 Comptes de test disponibles :');
        $this->command->info('   Admin: admin@heldino.com / password');
        $this->command->info('   Étudiant: student@learnycool.com / password');
        $this->command->info('   Formateur: teacher@learnycool.com / password');
    }
}

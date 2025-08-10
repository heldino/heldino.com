<?php

namespace Database\Seeders;

use App\Models\Programme;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProgrammeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::first();
        
        $programmes = [
            [
                'title' => 'Introduction à Python',
                'slug' => 'introduction-python',
                'short_description' => 'Apprenez les bases de la programmation Python avec des exemples pratiques.',
                'description' => 'Ce cours vous permettra de maîtriser les fondamentaux de Python, un langage de programmation polyvalent et populaire.',
                'category' => 'programming',
                'difficulty_level' => 1,
                'estimated_hours' => 25,
                'language' => 'fr-FR',
                'is_published' => true,
                'is_free' => true,
                'tags' => ['python', 'programmation', 'débutant'],
                'cover_image_url' => 'https://images.unsplash.com/photo-1526379095098-d400fd0bf935?w=400',
                'created_by' => $user?->id,
            ],
            [
                'title' => 'Développement Web avec Laravel',
                'slug' => 'developpement-web-laravel',
                'short_description' => 'Créez des applications web modernes avec le framework PHP Laravel.',
                'description' => 'Apprenez à développer des applications web robustes et sécurisées avec Laravel.',
                'category' => 'technology',
                'difficulty_level' => 3,
                'estimated_hours' => 45,
                'language' => 'fr-FR',
                'is_published' => true,
                'is_free' => false,
                'price' => 99.99,
                'tags' => ['laravel', 'php', 'web'],
                'cover_image_url' => 'https://images.unsplash.com/photo-1555949963-aa79dcee981c?w=400',
                'created_by' => $user?->id,
            ],
            [
                'title' => 'Design UX/UI Moderne',
                'slug' => 'design-ux-ui-moderne',
                'short_description' => 'Maîtrisez les principes du design d\'interface utilisateur moderne.',
                'description' => 'Découvrez les meilleures pratiques en matière de design UX/UI pour créer des interfaces exceptionnelles.',
                'category' => 'design',
                'difficulty_level' => 2,
                'estimated_hours' => 30,
                'language' => 'fr-FR',
                'is_published' => true,
                'is_free' => true,
                'tags' => ['design', 'ux', 'ui', 'figma'],
                'cover_image_url' => 'https://images.unsplash.com/photo-1561070791-2526d30994b5?w=400',
                'created_by' => $user?->id,
            ],
            [
                'title' => 'Machine Learning avec Python',
                'slug' => 'machine-learning-python',
                'short_description' => 'Explorez le monde de l\'intelligence artificielle et du machine learning.',
                'description' => 'Un cours complet sur le machine learning utilisant Python et ses bibliothèques populaires.',
                'category' => 'science',
                'difficulty_level' => 4,
                'estimated_hours' => 60,
                'language' => 'fr-FR',
                'is_published' => true,
                'is_free' => false,
                'price' => 149.99,
                'tags' => ['machine-learning', 'python', 'ia', 'data-science'],
                'cover_image_url' => 'https://images.unsplash.com/photo-1555255707-c07966088b7b?w=400',
                'created_by' => $user?->id,
            ],
            [
                'title' => 'Mathématiques pour Développeurs',
                'slug' => 'mathematiques-developpeurs',
                'short_description' => 'Les concepts mathématiques essentiels pour la programmation.',
                'description' => 'Renforcez vos bases mathématiques pour devenir un meilleur développeur.',
                'category' => 'mathematics',
                'difficulty_level' => 3,
                'estimated_hours' => 35,
                'language' => 'fr-FR',
                'is_published' => true,
                'is_free' => true,
                'tags' => ['mathématiques', 'algorithmique', 'logique'],
                'cover_image_url' => 'https://images.unsplash.com/photo-1596495578065-6e0763fa1178?w=400',
                'created_by' => $user?->id,
            ],
            [
                'title' => 'Entrepreneuriat Digital',
                'slug' => 'entrepreneuriat-digital',
                'short_description' => 'Lancez votre startup dans l\'ère du numérique.',
                'description' => 'Découvrez comment créer et développer votre entreprise dans le monde digital.',
                'category' => 'business',
                'difficulty_level' => 2,
                'estimated_hours' => 20,
                'language' => 'fr-FR',
                'is_published' => false,
                'is_free' => false,
                'price' => 79.99,
                'tags' => ['entrepreneuriat', 'business', 'startup'],
                'cover_image_url' => 'https://images.unsplash.com/photo-1460925895917-afdab827c52f?w=400',
                'created_by' => $user?->id,
            ],
        ];

        foreach ($programmes as $programmeData) {
            Programme::create($programmeData);
        }
    }
}

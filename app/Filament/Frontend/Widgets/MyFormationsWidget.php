<?php

namespace App\Filament\Frontend\Widgets;

use Filament\Widgets\Widget;
use Illuminate\Support\Facades\Auth;

class MyFormationsWidget extends Widget
{
    protected static string $view = 'filament.frontend.widgets.my-formations';

    protected int | string | array $columnSpan = 'full';

    public function getViewData(): array
    {
        return [
            'formations' => collect([
                (object) [
                    'name' => 'Introduction à la Bio-résonance',
                    'description' => 'Les bases fondamentales de la bio-résonance et ses applications',
                    'progress' => 75,
                    'modules_count' => 8,
                    'completed_modules' => 6,
                    'status' => 'en_cours',
                ],
                (object) [
                    'name' => 'Techniques Avancées',
                    'description' => 'Approfondissement des techniques de bio-résonance',
                    'progress' => 100,
                    'modules_count' => 12,
                    'completed_modules' => 12,
                    'status' => 'termine',
                ],
                (object) [
                    'name' => 'Pratique Clinique',
                    'description' => 'Application pratique en environnement clinique',
                    'progress' => 0,
                    'modules_count' => 15,
                    'completed_modules' => 0,
                    'status' => 'non_commence',
                ],
            ]),
        ];
    }
}
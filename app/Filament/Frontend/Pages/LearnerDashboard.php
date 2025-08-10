<?php

namespace App\Filament\Frontend\Pages;

use Filament\Pages\Page;

class LearnerDashboard extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-home';

    protected static string $view = 'filament.frontend.pages.learner-dashboard';

    protected static ?string $title = 'Mon Espace LearnyCool';

    protected static ?string $navigationLabel = 'Accueil';

    protected static ?int $navigationSort = -2;

    protected static string $routePath = '/';

    public function getWidgets(): array
    {
        return [
            \App\Filament\Frontend\Widgets\LearningProgressWidget::class,
            \App\Filament\Frontend\Widgets\MyFormationsWidget::class,
        ];
    }
}
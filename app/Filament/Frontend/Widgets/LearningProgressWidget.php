<?php

namespace App\Filament\Frontend\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Support\Facades\Auth;

class LearningProgressWidget extends BaseWidget
{
    protected function getStats(): array
    {
        $user = Auth::user();
        
        return [
            Stat::make('Formations en cours', 0)
                ->description('Formations actives')
                ->descriptionIcon('heroicon-m-play')
                ->color('warning'),
            
            Stat::make('Formations terminées', 0)
                ->description('Formations complétées')
                ->descriptionIcon('heroicon-m-check-circle')
                ->color('success'),
            
            Stat::make('Progression globale', '0%')
                ->description('Votre avancement')
                ->descriptionIcon('heroicon-m-chart-bar')
                ->color('primary'),
            
            Stat::make('Certificats obtenus', 0)
                ->description('Certifications')
                ->descriptionIcon('heroicon-m-trophy')
                ->color('info'),
        ];
    }
}
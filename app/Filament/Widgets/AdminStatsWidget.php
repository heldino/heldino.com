<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\User;

class AdminStatsWidget extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Utilisateurs totaux', User::count())
                ->description('Nombre total d\'utilisateurs')
                ->descriptionIcon('heroicon-m-users')
                ->color('success'),
            
            Stat::make('Utilisateurs actifs', User::whereNotNull('email_verified_at')->count())
                ->description('Utilisateurs vérifiés')
                ->descriptionIcon('heroicon-m-check-circle')
                ->color('primary'),
            
            Stat::make('Nouvelles inscriptions', User::where('created_at', '>=', now()->startOfMonth())->count())
                ->description('Ce mois-ci')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->color('warning'),
            
            Stat::make('Formations disponibles', 0)
                ->description('Formations publiées')
                ->descriptionIcon('heroicon-m-book-open')
                ->color('info'),
        ];
    }
}
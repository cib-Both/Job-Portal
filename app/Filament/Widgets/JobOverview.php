<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\Job;
use App\Models\Post;
use App\Models\User;
use App\Models\Company;

class JobOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Users', User::count())
                ->description('All Users in System')
                ->descriptionIcon('heroicon-m-users')
                ->color('primary'),
            Stat::make('Total Jobs', Job::count())
                ->description('Jobs in This System')
                ->descriptionIcon('heroicon-m-briefcase')
                ->color('info'),
            Stat::make('Total Posts public', Post::where('status','=','published')->count())
                ->description('All Public Posts')
                ->descriptionIcon('heroicon-m-bookmark')
                ->color('success'),
            Stat::make('Total Companies', Company::count())
                ->description('All Companies in System')
                ->descriptionIcon('heroicon-m-building-office')
                ->color('warning'),
        ];
    }
}

<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use App\Models\User;
use Filament\Actions;
use Illuminate\Database\Eloquent\Builder;
use Filament\Resources\Components\Tab;
use Filament\Resources\Pages\ListRecords;
use Filament\Support\Enums\IconPosition;

class ListUsers extends ListRecords
{
    protected static string $resource = UserResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    public function getTabs(): array
    {
        return [
            'All' => Tab::make()
                ->icon('heroicon-m-user-group')
                ->iconPosition(IconPosition::Before)
                ->badge(fn () => User::count()),
            'Admins' => Tab::make()
                ->icon('heroicon-m-shield-check')
                ->iconPosition(IconPosition::Before)
                ->badge(fn () => User::where('role', 'Admin')->count())
                ->query(fn (Builder $query) => $query->where('role', 'Admin')),
            'Users' => Tab::make()
                ->icon('heroicon-m-users')
                ->iconPosition(IconPosition::Before)
                ->badge(fn () => User::where('role', 'User')->count())
                ->query(fn (Builder $query) => $query->where('role', 'User')),  
            ];
        }
    }

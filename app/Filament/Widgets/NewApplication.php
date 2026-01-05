<?php

namespace App\Filament\Widgets;

use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;
use Filament\Tables\Columns\TextColumn;
use App\Models\Application;
use App\Filament\Resources\ApplicationResource;

class NewApplication extends BaseWidget
{
    protected static ?string $heading = 'New Applications';

    public function table(Table $table): Table
    {
        return $table
            ->query(
                Application::query()
                    ->latest()
                    ->limit(5)
            )
            ->columns([
                TextColumn::make('job.title')
                    ->searchable()
                    ->url(fn (Application $record): string => ApplicationResource::getUrl('edit', ['record' => $record])),
                TextColumn::make('user.name')
                    ->label('Applier Name')
                    ->searchable()
                    ->url(fn (Application $record): string => ApplicationResource::getUrl('edit', ['record' => $record])),
                TextColumn::make('created_at')
                    ->label('Applied At')
                    ->dateTime('d-M-Y'),
                TextColumn::make('status')
                    ->label('Application Status')
                    ->badge()
                    ->color(fn ($state) => match ($state) {
                        'applied' => 'primary',
                        'interviewed' => 'warning',
                        'offered' => 'success',
                        'rejected' => 'danger',
                    })
            ]);
    }
}

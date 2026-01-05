<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ApplicationResource\Pages;
use App\Filament\Resources\ApplicationResource\RelationManagers;
use App\Models\Application;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\Section;
use Filament\Tables\Enums\FiltersLayout;
use Filament\Forms\Components\ToggleButtons;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ApplicationResource extends Resource
{
    protected static ?string $model = Application::class;

    protected static ?string $navigationIcon = 'heroicon-o-folder';
    protected static ?string $navigationGroup = 'Job Management';

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            Section::make('Application Info')
            ->columns(2)
            ->schema([
                Forms\Components\Select::make('user_id')
                    ->label('User Name')
                    ->relationship('user', 'name')
                    ->disabled()
                    ->required(),
                Forms\Components\Select::make('job_id')
                     ->label('Job Title')
                     ->relationship('job', 'title')
                     ->disabled()
                     ->required(),
                ]),

            Section::make('User CV')
            ->schema([
                Forms\Components\Actions::make([
                    Forms\Components\Actions\Action::make('view')
                        ->label('View CV')
                        ->icon('heroicon-o-eye')
                        ->url(fn ($record) => $record?->user?->userCv?->resume_path 
                            ? asset('storage/' . $record->user->userCv->resume_path) 
                            : null)
                        ->openUrlInNewTab()
                        ->visible(fn ($record) => $record?->user?->userCv?->resume_path !== null),
                    Forms\Components\Actions\Action::make('download')
                        ->label('Download CV')
                        ->color('success')
                        ->icon('heroicon-o-arrow-down-tray')
                        ->url(fn ($record) => $record?->user?->userCv?->resume_path 
                            ? asset('storage/' . $record->user->userCv->resume_path) 
                            : null)
                        ->openUrlInNewTab()
                        ->visible(fn ($record) => $record?->user?->userCv?->resume_path !== null),
                ])
                ->columnSpan(1)
                ->alignStart(),
            ])
            ->visible(fn ($record) => $record?->user?->userCv !== null),

            Section::make('Option to Update Status')
            ->schema([
                ToggleButtons::make('status')
                    ->label('Application Status')
                    ->options([
                        'applied' => 'Applied',
                        'interviewed' => 'Interviewed',
                        'offered' => 'Offered',
                        'rejected' => 'Rejected',
                    ])
                    ->colors([
                        'applied' => 'primary',
                        'interviewed' => 'warning',
                        'offered' => 'success',
                        'rejected' => 'danger',
                    ])
                    ->inline()
                    ->required(),
            ])
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('job.title')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('user.name')
                    ->label('Applier Name')
                    ->color('primary')
                    ->description(fn ($record) => "Email: {$record->user->email}")
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('job.posts.location')
                    ->label('Job Location')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Applied At')
                    ->dateTime('d-M-Y')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\SelectColumn::make('status')
                    ->options([
                        'applied' => 'Applied',
                        'interviewed' => 'Interviewed',
                        'offered' => 'Offered',
                        'rejected' => 'Rejected',
                    ]),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->label('Status')
                    ->native(false)
                    ->options([
                        'applied' => 'Applied',
                        'interviewed' => 'Interviewed',
                        'offered' => 'Offered',
                        'rejected' => 'Rejected',
                    ]),
                Tables\Filters\SelectFilter::make('job')
                    ->label('Job Title')
                    ->relationship('job', 'title')
                    ->searchable(),
                Tables\Filters\SelectFilter::make('user')
                    ->label('Applier Name')
                    ->relationship('user', 'name')
                    ->searchable(),
                Tables\Filters\Filter::make('applied_at')
                    ->label('Applied Date')
                    ->form([
                        Forms\Components\DatePicker::make('from')
                            ->label('From Date')
                            ->native(false)
                            ->closeOnDateSelection()
                            ->displayFormat('d/ M/ Y')
                            ->placeholder('DD/MM/YYYY'),
                        Forms\Components\DatePicker::make('to')
                            ->label('To Date')
                            ->native(false)
                            ->closeOnDateSelection()
                            ->displayFormat('d/ M/ Y')
                            ->placeholder('DD/MM/YYYY'),
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        return $query
                            ->when(
                                $data['from'],
                                fn (Builder $query, $date): Builder => $query->whereDate('created_at', '>=', $date),
                            )
                            ->when(
                                $data['to'],
                                fn (Builder $query, $date): Builder => $query->whereDate('created_at', '<=', $date),
                            );
                    }),
            ],layout: FiltersLayout::AboveContent)
            ->filtersFormColumns(4)

            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListApplications::route('/'),
            'edit' => Pages\EditApplication::route('/{record}/edit'),
        ];
    }
}

<?php

namespace App\Filament\Resources;

use App\Filament\Resources\JobResource\Pages;
use App\Filament\Resources\JobResource\RelationManagers;
use App\Models\Job;
use Filament\Forms;
use Filament\Forms\Components\Tabs\Tab;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\Section;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class JobResource extends Resource
{
    protected static ?string $model = Job::class;

    protected static ?string $navigationIcon = 'heroicon-o-briefcase';
    protected static ?string $navigationGroup = 'Job Management';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Job Information')
                ->schema([
                    Forms\Components\TextInput::make('title')
                        ->label('Job Title')
                        ->required()
                        ->maxLength(255),

                    Forms\Components\Select::make('category_id')
                        ->label('Category')
                        ->relationship('category', 'name')
                        ->native(false)
                        ->preload()
                        ->createOptionForm([
                            Forms\Components\TextInput::make('name')
                                ->required()
                                ->maxLength(255),
                            Forms\Components\TextArea::make('description')
                                ->maxLength(500),
                        ])
                        ->required(),

                    Forms\Components\Select::make('company_id')
                        ->label('Company')
                        ->relationship('company', 'name')
                        ->native(false)
                        ->preload()
                        ->createOptionForm([
                            Forms\Components\TextInput::make('name')
                                ->required()
                                ->maxLength(255),
                            Forms\Components\FileUpload::make('logo')
                                ->image()
                                ->disk('public')
                                ->directory('company-logos')
                                ->maxSize(2048)
                                ->required(),
                            Forms\Components\TextInput::make('website')
                                ->maxLength(255)
                                ->url()
                                ->suffixIcon('heroicon-m-globe-alt')
                                ->placeholder('https://example.com'),
                            Forms\Components\TextArea::make('description')
                                ->autosize()
                                ->maxLength(500),
                        ])
                        ->required(),

                    Forms\Components\Textarea::make('description')
                        ->label('Job Description')
                        ->columnSpanFull()
                        ->autosize(),

                    Forms\Components\ToggleButtons::make('is_active')
                        ->label('Is Active')
                        ->boolean()
                        ->grouped()
                        ->default(true)
                        ->required(),               
                    ])->columns(3),

        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('company.name')
                    ->label('Company')
                    ->searchable(),
                Tables\Columns\TextColumn::make('category.name')
                    ->label('Category')
                    ->searchable(),
                Tables\Columns\TextColumn::make('description')
                    ->limit(50),
                Tables\Columns\IconColumn::make('is_active')
                    ->boolean(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('created_at')
                    ->numeric()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
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
            'index' => Pages\ListJobs::route('/'),
            'create' => Pages\CreateJob::route('/create'),
            'edit' => Pages\EditJob::route('/{record}/edit'),
        ];
    }
}

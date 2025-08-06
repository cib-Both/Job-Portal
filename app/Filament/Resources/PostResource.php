<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PostResource\Pages;
use App\Filament\Resources\PostResource\RelationManagers;
use App\Models\Post;
use Filament\Forms;
use Filament\Forms\Components\Section;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PostResource extends Resource
{
    protected static ?string $model = Post::class;

    protected static ?string $navigationIcon = 'heroicon-o-bookmark';

    protected static ?string $navigationGroup = 'Post Blog';

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            Section::make('Job Info')
                ->columns(3)
                ->schema([
                    Forms\Components\Select::make('job_id')
                        ->label('Job')
                        ->relationship('job', 'title')
                        ->placeholder('Select Job(Company)')
                        ->preload()
                        ->searchable()
                        ->getOptionLabelFromRecordUsing(fn ($record) => $record->title . ' (' . optional($record->company)->name . ')')
                        ->required(),
                    Forms\Components\TextInput::make('location')
                        ->required()
                        ->maxLength(255),
                    Forms\Components\Select::make('type')
                        ->options([
                            'full-time' => 'Full-Time',
                            'part-time' => 'Part-Time',
                            'contract' => 'Contract',
                            'freeland' => 'Freelance',
                            'internship' => 'Internship',
                            ])
                            ->native(false)
                            ->default('full-time')
                            ->required(),
                    Forms\Components\Textarea::make('reqirement')
                        ->label('Requirement')
                        ->autosize()
                        ->columnSpanFull()
                        ->maxLength(1000)
                        ->required(),
                ]),
            Section::make('Salary')
                ->columns(2)
                ->schema([
                    Forms\Components\Select::make('salary_option')
                        ->label('Salary Option')
                        ->native(false)
                        ->options([
                            'pay' => 'Pay',
                            'not' => 'Not pay',
                        ])
                        ->reactive()
                        ->required(),
                    Forms\Components\TextInput::make('salary')
                        ->label('Salary')
                        ->visible(fn ($get) => $get('salary_option') === 'pay'),
                ]),
            Section::make('Deadline')
                ->columns(2)
                ->schema([
                    Forms\Components\Select::make('deadline_option')
                        ->label('Deadline Option')
                        ->options([
                            'specific' => 'Specific Date',
                            'until-full' => 'Until Full',
                        ])
                        ->native(false)
                        ->reactive()
                        ->required(),
                    Forms\Components\DatePicker::make('deadline')
                        ->label('Deadline Date')
                        ->native(false)
                        ->closeOnDateSelection()
                        ->visible(fn ($get) => $get('deadline_option') === 'specific'),
                ]),
            Section::make('Status')
                ->schema([
                    Forms\Components\ToggleButtons::make('status')
                        ->options([
                            'draft' => 'Draft',
                            'published' => 'Published',
                        ])
                        ->colors([
                            'draft' => 'info',
                            'published' => 'success',
                        ])
                        ->icons([
                            'draft' => 'heroicon-o-pencil',
                            'published' => 'heroicon-o-check-circle',
                        ])
                        ->inline()
                        ->default('draft')
                        ->required(),
                ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
        ->columns([
            Tables\Columns\TextColumn::make('job.title')
                ->label('Job Title')
                ->searchable()
                ->sortable(),
            Tables\Columns\TextColumn::make('reqirement')
                ->label('Requirement')
                ->limit(50)
                ->searchable(),
            Tables\Columns\TextColumn::make('location')
                ->label('Location')
                ->searchable(),
            Tables\Columns\TextColumn::make('salary_option')
                ->label('Salary Option')
                ->badge()
                ->color(fn (string $state): string => match ($state) {
                    'not' => 'warning',
                    'pay' => 'success',
                })
                ->icon(fn (string $state): string => match ($state) {
                    'not' => 'heroicon-s-x-circle',
                    'pay' => 'heroicon-s-banknotes',
                })
                ->searchable(),
            Tables\Columns\TextColumn::make('salary')
                ->label('Salary')
                ->searchable()
                ->formatStateUsing(fn ($state) => $state ? '$' . $state : null),
            Tables\Columns\TextColumn::make('type')
                ->label('Job Type')
                ->color('primary')
                ->searchable(),
            Tables\Columns\TextColumn::make('deadline_option')
                ->label('Deadline Option')
                ->badge()
                ->color(fn (string $state): string => match ($state) {
                    'specific' => 'info',
                    'until-full' => 'warning',
                })
                ->icon(fn (string $state): string => match ($state) {
                    'specific' => 'heroicon-s-calendar',
                    'until-full' => 'heroicon-s-clock',
                })
                ->searchable(),
            Tables\Columns\TextColumn::make('deadline') 
                ->label('Deadline Date')
                ->date()
                ->searchable(),
            Tables\Columns\SelectColumn::make('status')
                ->options([
                    'draft' => 'Draft',
                    'published' => 'Published',
                ])
                ->selectablePlaceholder(false),
            Tables\Columns\TextColumn::make('created_at')
                ->dateTime()
                ->sortable()
                ->toggleable(isToggledHiddenByDefault: true),
            Tables\Columns\TextColumn::make('updated_at')
                ->dateTime()
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
            'index' => Pages\ListPosts::route('/'),
            'create' => Pages\CreatePost::route('/create'),
            'edit' => Pages\EditPost::route('/{record}/edit'),
        ];
    }
}

<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CompanyResource\Pages;
use App\Filament\Resources\CompanyResource\RelationManagers;
use App\Models\Company;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Split;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CompanyResource extends Resource
{
    protected static ?string $model = Company::class;

    protected static ?string $navigationIcon = 'heroicon-o-building-office';
    protected static ?string $navigationGroup = 'Job Management';

    public static function form(Form $form): Form 
    {
        return $form
                ->schema([
                    Section::make('Logo')
                        ->schema([
                            Forms\Components\FileUpload::make('logo')
                                ->image()
                                ->disk('public')
                                ->directory('company-logos')
                                ->maxSize(2048)
                                ->required(),
                        ]), 
                    Section::make('Company Info')
                        ->schema([
                            Forms\Components\TextInput::make('name')
                                ->required()
                                ->maxLength(255),
                            Forms\Components\TextInput::make('website')
                                ->maxLength(255)
                                ->url()
                                ->suffixIcon('heroicon-m-globe-alt')
                                ->placeholder('https://example.com'),
                            Forms\Components\TextArea::make('description')
                                ->autosize()
                                ->maxLength(255),
                        ]),          
                ]);
    }


    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('logo')
                    ->disk('public')
                    ->circular(),
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('website')
                    ->searchable(),
                Tables\Columns\TextColumn::make('description')
                    ->searchable(),
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
            'index' => Pages\ListCompanies::route('/'),
            'create' => Pages\CreateCompany::route('/create'),
            'edit' => Pages\EditCompany::route('/{record}/edit'),
        ];
    }
}

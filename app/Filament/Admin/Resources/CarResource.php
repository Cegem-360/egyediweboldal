<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\CarResource\Pages;
use App\Models\Car;
use BackedEnum;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Support\Icons\Heroicon;
use Filament\Tables;
use Filament\Schemas\Schema;
use Filament\Tables\Table;

class CarResource extends Resource
{
    protected static ?string $model = Car::class;

    protected static BackedEnum|string|null $navigationIcon = 'heroicon-o-truck';

    protected static ?string $navigationLabel = 'Autók';
    
    protected static ?string $modelLabel = 'Autó';
    
    protected static ?string $pluralModelLabel = 'Autók';

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Forms\Components\TextInput::make('name')
                    ->label('Név')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('model')
                    ->label('Modell')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Select::make('category')
                    ->label('Kategória')
                    ->options(Car::CATEGORIES)
                    ->required(),
                Forms\Components\Select::make('type')
                    ->label('Típus')
                    ->options(Car::TYPES)
                    ->required(),
                Forms\Components\TextInput::make('price')
                    ->label('Ár')
                    ->numeric()
                    ->required()
                    ->prefix('Ft'),
                Forms\Components\TextInput::make('currency')
                    ->label('Pénznem')
                    ->default('HUF')
                    ->required()
                    ->maxLength(3),
                Forms\Components\Textarea::make('description')
                    ->label('Leírás')
                    ->rows(3),
                Forms\Components\FileUpload::make('image')
                    ->label('Kép')
                    ->image()
                    ->directory('cars'),
                Forms\Components\Toggle::make('featured')
                    ->label('Kiemelt'),
                Forms\Components\Toggle::make('active')
                    ->label('Aktív')
                    ->default(true),
                Forms\Components\KeyValue::make('specifications')
                    ->label('Specifikációk')
                    ->keyLabel('Tulajdonság')
                    ->valueLabel('Érték'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image')
                    ->label('Kép')
                    ->square()
                    ->size(60),
                Tables\Columns\TextColumn::make('name')
                    ->label('Név')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('model')
                    ->label('Modell')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('category')
                    ->label('Kategória')
                    ->formatStateUsing(fn (string $state): string => Car::CATEGORIES[$state] ?? $state)
                    ->sortable(),
                Tables\Columns\TextColumn::make('type')
                    ->label('Típus')
                    ->formatStateUsing(fn (string $state): string => Car::TYPES[$state] ?? $state)
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'electric' => 'success',
                        'amg' => 'danger',
                        'hybrid' => 'warning',
                        default => 'gray',
                    })
                    ->sortable(),
                Tables\Columns\TextColumn::make('formatted_price')
                    ->label('Ár')
                    ->sortable(query: function ($query, $direction) {
                        return $query->orderBy('price', $direction);
                    }),
                Tables\Columns\IconColumn::make('featured')
                    ->label('Kiemelt')
                    ->boolean(),
                Tables\Columns\IconColumn::make('active')
                    ->label('Aktív')
                    ->boolean(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Létrehozva')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('category')
                    ->label('Kategória')
                    ->options(Car::CATEGORIES),
                Tables\Filters\SelectFilter::make('type')
                    ->label('Típus')
                    ->options(Car::TYPES),
                Tables\Filters\TernaryFilter::make('featured')
                    ->label('Kiemelt'),
                Tables\Filters\TernaryFilter::make('active')
                    ->label('Aktív'),
            ])
            ->actions([
                // Actions will be added later
            ])
            ->bulkActions([
                // Bulk actions will be added later
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
            'index' => Pages\ListCars::route('/'),
            'create' => Pages\CreateCar::route('/create'),
            'edit' => Pages\EditCar::route('/{record}/edit'),
        ];
    }

    // Only admin can access this resource
    public static function canViewAny(): bool
    {
        return auth()->user()?->isAdmin() ?? false;
    }
}
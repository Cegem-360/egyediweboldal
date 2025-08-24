<?php

namespace App\Filament\Admin\Resources\Abouts\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Columns\ImageColumn;

class AboutsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('hero_image')
                    ->label('Háttérkép')
                    ->disk('public')
                    ->square()
                    ->size(80),
                
                TextColumn::make('hero_title')
                    ->label('Cím')
                    ->searchable()
                    ->sortable(),
                
                TextColumn::make('hero_subtitle')
                    ->label('Alcím')
                    ->searchable()
                    ->limit(50),
                
                ToggleColumn::make('is_active')
                    ->label('Aktív')
                    ->sortable(),
                
                TextColumn::make('created_at')
                    ->label('Létrehozva')
                    ->dateTime()
                    ->sortable(),
                
                TextColumn::make('updated_at')
                    ->label('Módosítva')
                    ->dateTime()
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('created_at', 'desc');
    }
}

<?php

namespace App\Filament\Admin\Resources\Abouts;

use App\Models\About;
use App\Filament\Admin\Resources\Abouts\Pages\CreateAbout;
use App\Filament\Admin\Resources\Abouts\Pages\EditAbout;
use App\Filament\Admin\Resources\Abouts\Pages\ListAbouts;
use App\Filament\Admin\Resources\Abouts\Schemas\AboutForm;
use App\Filament\Admin\Resources\Abouts\Tables\AboutsTable;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class AboutResource extends Resource
{
    protected static ?string $model = About::class;

    protected static BackedEnum|string|null $navigationIcon = 'heroicon-o-rectangle-stack';
    
    protected static ?string $navigationLabel = 'Rólunk oldal';
    
    protected static ?string $modelLabel = 'Rólunk oldal';
    
    protected static ?string $pluralModelLabel = 'Rólunk oldalak';

    public static function form(Schema $schema): Schema
    {
        return AboutForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return AboutsTable::configure($table);
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
            'index' => ListAbouts::route('/'),
            'create' => CreateAbout::route('/create'),
            'edit' => EditAbout::route('/{record}/edit'),
        ];
    }

    // Only admin can access this resource
    public static function canViewAny(): bool
    {
        return auth()->user()?->isAdmin() ?? false;
    }
}

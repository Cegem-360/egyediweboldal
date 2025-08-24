<?php

namespace App\Filament\Admin\Resources\Abouts\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;

class AboutForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('hero_title')
                    ->label('Hero Cím')
                    ->required()
                    ->maxLength(255),
                
                TextInput::make('hero_subtitle')
                    ->label('Hero Alcím')
                    ->required()
                    ->maxLength(255),
                
                Textarea::make('hero_description')
                    ->label('Hero Leírás')
                    ->required()
                    ->rows(4),
                
                FileUpload::make('hero_image')
                    ->label('Hero Háttérkép')
                    ->image()
                    ->disk('public')
                    ->directory('about'),

                TextInput::make('cta_title')
                    ->label('CTA Cím')
                    ->required()
                    ->maxLength(255),
                
                Textarea::make('cta_description')
                    ->label('CTA Leírás')
                    ->required()
                    ->rows(2),
                
                TextInput::make('cta_button_text')
                    ->label('CTA Gomb szöveg')
                    ->required()
                    ->maxLength(100),
                
                TextInput::make('cta_button_link')
                    ->label('CTA Gomb hivatkozás')
                    ->required()
                    ->maxLength(255),

                Toggle::make('is_active')
                    ->label('Aktív')
                    ->default(true),
            ]);
    }
}

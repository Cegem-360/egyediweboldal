<?php

namespace App\Filament\Admin\Resources;

use BackedEnum;
use Filament\Forms;
use App\Models\User;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Schemas\Schema;
use Filament\Actions\EditAction;
use Filament\Resources\Resource;
use Filament\Actions\DeleteAction;
use Filament\Actions\BulkActionGroup;
use Filament\Forms\Components\Select;
use Filament\Actions\DeleteBulkAction;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use App\Filament\Admin\Resources\UserResource\Pages;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static BackedEnum|string|null $navigationIcon = 'heroicon-o-users';

    protected static ?string $navigationLabel = 'Felhasználók';

    protected static ?string $modelLabel = 'Felhasználó';

    protected static ?string $pluralModelLabel = 'Felhasználók';

    protected static ?int $navigationSort = 4;

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Felhasználó adatai')
                    ->schema([
                        TextInput::make('name')
                            ->label('Név')
                            ->required()
                            ->maxLength(255),
                        
                        TextInput::make('email')
                            ->label('E-mail')
                            ->email()
                            ->required()
                            ->unique(ignoreRecord: true)
                            ->maxLength(255),
                        
                        Select::make('role')
                            ->label('Szerepkör')
                            ->options([
                                'customer' => 'Vásárló',
                                'shop_manager' => 'Boltkezelő',
                                'admin' => 'Adminisztrátor',
                            ])
                            ->required()
                            ->default('customer'),
                        
                        TextInput::make('password')
                            ->label('Jelszó')
                            ->password()
                            ->dehydrateStateUsing(fn ($state) => filled($state) ? bcrypt($state) : null)
                            ->required(fn (string $context): bool => $context === 'create')
                            ->dehydrated(fn ($state) => filled($state))
                            ->maxLength(255),
                    ])
                    ->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Név')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('email')
                    ->label('E-mail')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('role')
                    ->label('Szerepkör')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'customer' => 'gray',
                        'shop_manager' => 'warning',
                        'admin' => 'success',
                        default => 'gray',
                    })
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'customer' => 'Vásárló',
                        'shop_manager' => 'Boltkezelő',
                        'admin' => 'Adminisztrátor',
                        default => $state,
                    }),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Regisztrált')
                    ->dateTime('Y.m.d H:i')
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }

    // Only admin can access this resource
    public static function canViewAny(): bool
    {
        return auth()->user()?->isAdmin() ?? false;
    }
}
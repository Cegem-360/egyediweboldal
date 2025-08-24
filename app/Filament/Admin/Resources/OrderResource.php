<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\OrderResource\Pages;
use App\Models\Order;
use BackedEnum;
use Filament\Schemas;
use Filament\Schemas\Schema;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class OrderResource extends Resource
{
    protected static ?string $model = Order::class;

    protected static BackedEnum|string|null $navigationIcon = 'heroicon-o-shopping-bag';

    protected static ?string $navigationLabel = 'Rendelések';

    protected static ?string $modelLabel = 'Rendelés';

    protected static ?string $pluralModelLabel = 'Rendelések';

    protected static ?int $navigationSort = 3;

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Schemas\Components\Section::make('Rendelés adatai')
                    ->schema([
                        Schemas\Components\TextInput::make('order_number')
                            ->label('Rendelés száma')
                            ->required()
                            ->disabled(),
                        
                        Schemas\Components\Select::make('status')
                            ->label('Állapot')
                            ->options([
                                'pending' => 'Feldolgozás alatt',
                                'confirmed' => 'Jóváhagyva',
                                'shipped' => 'Szállítás alatt',
                                'delivered' => 'Kiszállítva',
                                'cancelled' => 'Törölve',
                            ])
                            ->required(),
                        
                        Schemas\Components\Select::make('payment_status')
                            ->label('Fizetés állapota')
                            ->options([
                                'pending' => 'Függőben',
                                'paid' => 'Fizetve',
                                'failed' => 'Sikertelen',
                                'refunded' => 'Visszatérítve',
                            ])
                            ->required(),
                    ])
                    ->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('order_number')
                    ->label('Rendelés száma')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('customer_name')
                    ->label('Ügyfél')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('status')
                    ->label('Állapot')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'pending' => 'warning',
                        'confirmed' => 'success',
                        'shipped' => 'info',
                        'delivered' => 'success',
                        'cancelled' => 'danger',
                        default => 'gray',
                    })
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'pending' => 'Feldolgozás alatt',
                        'confirmed' => 'Jóváhagyva',
                        'shipped' => 'Szállítás alatt',
                        'delivered' => 'Kiszállítva',
                        'cancelled' => 'Törölve',
                        default => $state,
                    }),

                Tables\Columns\TextColumn::make('total')
                    ->label('Végösszeg')
                    ->money('HUF')
                    ->sortable(),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Rendelés dátuma')
                    ->dateTime('Y.m.d H:i')
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                //
            ])
            ->bulkActions([
                //
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
            'index' => Pages\ListOrders::route('/'),
        ];
    }

    // Admin and shop managers can access this resource
    public static function canViewAny(): bool
    {
        return auth()->user()?->hasAdminAccess() ?? false;
    }
}
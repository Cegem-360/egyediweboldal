<?php

namespace App\Filament\Admin\Resources\OrderResource\Pages;

use App\Filament\Admin\Resources\OrderResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Builder;

class ListOrders extends ListRecords
{
    protected static string $resource = OrderResource::class;

    protected static ?string $title = 'Rendelések';

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->label('Új rendelés'),
        ];
    }

    // Tabs temporarily disabled until we find correct import
    // public function getTabs(): array
    // {
    //     return [
    //         'all' => Tab::make('Összes'),
    //         'pending' => Tab::make('Feldolgozás alatt')
    //             ->modifyQueryUsing(fn (Builder $query) => $query->where('status', 'pending')),
    //         'confirmed' => Tab::make('Jóváhagyva')
    //             ->modifyQueryUsing(fn (Builder $query) => $query->where('status', 'confirmed')),
    //         'shipped' => Tab::make('Szállítás alatt')
    //             ->modifyQueryUsing(fn (Builder $query) => $query->where('status', 'shipped')),
    //         'delivered' => Tab::make('Kiszállítva')
    //             ->modifyQueryUsing(fn (Builder $query) => $query->where('status', 'delivered')),
    //     ];
    // }
}
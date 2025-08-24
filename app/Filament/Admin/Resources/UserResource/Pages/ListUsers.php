<?php

namespace App\Filament\Admin\Resources\UserResource\Pages;

use App\Filament\Admin\Resources\UserResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Builder;

class ListUsers extends ListRecords
{
    protected static string $resource = UserResource::class;

    protected static ?string $title = 'Felhasználók';

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->label('Új felhasználó'),
        ];
    }

    // Tabs temporarily disabled until we find correct import
    // public function getTabs(): array
    // {
    //     return [
    //         'all' => Tab::make('Összes'),
    //         'admins' => Tab::make('Adminisztrátorok')
    //             ->modifyQueryUsing(fn (Builder $query) => $query->where('role', 'admin')),
    //         'shop_managers' => Tab::make('Boltkezelők')
    //             ->modifyQueryUsing(fn (Builder $query) => $query->where('role', 'shop_manager')),
    //         'customers' => Tab::make('Vásárlók')
    //             ->modifyQueryUsing(fn (Builder $query) => $query->where('role', 'customer')),
    //     ];
    // }
}
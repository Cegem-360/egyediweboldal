<?php

namespace App\Filament\Admin\Pages;

use App\Models\Order;
use App\Models\User;
use Filament\Pages\Page;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\ChartWidget;
use BackedEnum;

class ShopManagerDashboard extends Page
{
    protected static BackedEnum|string|null $navigationIcon = 'heroicon-o-presentation-chart-bar';

    protected static ?string $navigationLabel = 'Boltkezelő Dashboard';

    protected string $view = 'filament.admin.pages.shop-manager-dashboard';

    protected static ?string $title = 'Boltkezelő Dashboard';

    protected static ?int $navigationSort = 1;

    // Only shop managers and admins can see this
    public static function canAccess(): bool
    {
        return auth()->user()?->hasAdminAccess() ?? false;
    }

    // Hide for pure admins (they have their own dashboard)
    public static function shouldRegisterNavigation(): bool
    {
        return auth()->user()?->isShopManager() ?? false;
    }

    protected function getHeaderWidgets(): array
    {
        return [
            ShopManagerStats::class,
        ];
    }
}

class ShopManagerStats extends \Filament\Widgets\StatsOverviewWidget
{
    protected function getStats(): array
    {
        $totalOrders = Order::count();
        $pendingOrders = Order::where('status', 'pending')->count();
        $totalUsers = User::where('role', 'customer')->count();
        $monthlyRevenue = Order::whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->sum('total');

        return [
            Stat::make('Összes rendelés', $totalOrders)
                ->description('Az összes leadott rendelés')
                ->descriptionIcon('heroicon-m-shopping-bag')
                ->color('primary'),

            Stat::make('Függő rendelések', $pendingOrders)
                ->description('Feldolgozásra váró rendelések')
                ->descriptionIcon('heroicon-m-clock')
                ->color('warning'),

            Stat::make('Regisztrált vásárlók', $totalUsers)
                ->description('Az összes regisztrált ügyfél')
                ->descriptionIcon('heroicon-m-users')
                ->color('success'),

            Stat::make('Havi bevétel', number_format($monthlyRevenue, 0, ',', '.') . ' HUF')
                ->description('Ez havi összes bevétel')
                ->descriptionIcon('heroicon-m-currency-dollar')
                ->color('success'),
        ];
    }
}
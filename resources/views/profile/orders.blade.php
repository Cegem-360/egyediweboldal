<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rendeléseim - Mercedes-Benz</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            line-height: 1.6;
            color: #333;
            background: #f8f9fa;
        }

        /* Header */
        .header {
            background: #000;
            padding: 1rem 0;
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .header-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            color: #fff;
            font-size: 1.5rem;
            font-weight: bold;
            text-decoration: none;
        }

        .nav {
            display: flex;
            gap: 2rem;
            align-items: center;
        }

        .nav a {
            color: #fff;
            text-decoration: none;
            padding: 0.5rem 1rem;
            transition: color 0.3s ease;
        }

        .nav a:hover {
            color: #00adef;
        }

        .user-menu {
            position: relative;
        }

        .user-name {
            color: #fff;
            padding: 0.5rem 1rem;
            background: #333;
            border-radius: 6px;
            cursor: pointer;
        }

        /* Main Content */
        .main-content {
            max-width: 1200px;
            margin: 2rem auto;
            padding: 0 2rem;
        }

        .page-title {
            font-size: 2.5rem;
            font-weight: 300;
            margin-bottom: 0.5rem;
        }

        .page-subtitle {
            color: #666;
            margin-bottom: 3rem;
        }

        /* Profile Layout */
        .profile-layout {
            display: grid;
            grid-template-columns: 300px 1fr;
            gap: 3rem;
        }

        /* Sidebar */
        .profile-sidebar {
            background: white;
            border-radius: 8px;
            padding: 2rem;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            height: fit-content;
        }

        .profile-info {
            text-align: center;
            margin-bottom: 2rem;
            padding-bottom: 2rem;
            border-bottom: 1px solid #eee;
        }

        .profile-avatar {
            width: 80px;
            height: 80px;
            background: #00adef;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2rem;
            color: white;
            margin: 0 auto 1rem;
        }

        .profile-name {
            font-size: 1.2rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
        }

        .profile-email {
            color: #666;
            font-size: 0.9rem;
        }

        .profile-nav {
            list-style: none;
        }

        .profile-nav li {
            margin-bottom: 0.5rem;
        }

        .profile-nav a {
            display: block;
            padding: 0.75rem 1rem;
            color: #333;
            text-decoration: none;
            border-radius: 6px;
            transition: all 0.3s ease;
        }

        .profile-nav a:hover,
        .profile-nav a.active {
            background: #00adef;
            color: white;
        }

        /* Profile Content */
        .profile-content {
            background: white;
            border-radius: 8px;
            padding: 2rem;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .section-title {
            font-size: 1.5rem;
            margin-bottom: 1.5rem;
            padding-bottom: 1rem;
            border-bottom: 2px solid #00adef;
        }

        /* Orders Table */
        .orders-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 1rem;
        }

        .orders-table th,
        .orders-table td {
            padding: 1rem;
            text-align: left;
            border-bottom: 1px solid #eee;
        }

        .orders-table th {
            background: #f8f9fa;
            font-weight: 600;
            color: #333;
        }

        .orders-table tr:hover {
            background: #f8f9fa;
        }

        .order-number {
            font-weight: 600;
            color: #00adef;
        }

        .status-badge {
            display: inline-block;
            padding: 0.25rem 0.75rem;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 600;
            text-transform: uppercase;
        }

        .status-pending {
            background: #fff3cd;
            color: #856404;
        }

        .status-confirmed {
            background: #d4edda;
            color: #155724;
        }

        .status-shipped {
            background: #d1ecf1;
            color: #0c5460;
        }

        .status-delivered {
            background: #d4edda;
            color: #155724;
        }

        .status-cancelled {
            background: #f8d7da;
            color: #721c24;
        }

        .btn {
            display: inline-block;
            padding: 0.5rem 1rem;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            text-decoration: none;
            font-size: 0.9rem;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn-primary {
            background: #00adef;
            color: white;
        }

        .btn-primary:hover {
            background: #0088cc;
        }

        .btn-outline {
            background: transparent;
            color: #00adef;
            border: 1px solid #00adef;
        }

        .btn-outline:hover {
            background: #00adef;
            color: white;
        }

        /* Pagination */
        .pagination {
            display: flex;
            justify-content: center;
            margin-top: 2rem;
            gap: 0.5rem;
        }

        .pagination a,
        .pagination span {
            padding: 0.5rem 0.75rem;
            border: 1px solid #ddd;
            color: #333;
            text-decoration: none;
            border-radius: 4px;
        }

        .pagination .active span {
            background: #00adef;
            color: white;
            border-color: #00adef;
        }

        .pagination a:hover {
            background: #f8f9fa;
        }

        /* Empty State */
        .empty-state {
            text-align: center;
            padding: 3rem;
            color: #666;
        }

        .empty-state-icon {
            font-size: 3rem;
            margin-bottom: 1rem;
            color: #ccc;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .header-container {
                padding: 0 1rem;
            }

            .nav {
                display: none;
            }

            .main-content {
                padding: 0 1rem;
            }

            .profile-layout {
                grid-template-columns: 1fr;
                gap: 2rem;
            }

            .orders-table {
                font-size: 0.9rem;
            }

            .orders-table th,
            .orders-table td {
                padding: 0.5rem;
            }
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header class="header">
        <div class="header-container">
            <a href="{{ route('home') }}" class="logo">
                Mercedes-Benz
            </a>
            <nav class="nav">
                <a href="{{ route('home') }}">Főoldal</a>
                <a href="{{ route('models') }}">Modellek</a>
                <a href="{{ route('about') }}">Rólunk</a>
                <a href="{{ route('services') }}">Szolgáltatások</a>
                <div class="user-menu">
                    <span class="user-name">{{ Auth::user()->name }}</span>
                </div>
            </nav>
        </div>
    </header>

    <!-- Main Content -->
    <main class="main-content">
        <h1 class="page-title">Rendeléseim</h1>
        <p class="page-subtitle">Az összes leadott rendelésem áttekintése</p>

        <div class="profile-layout">
            <!-- Sidebar -->
            <div class="profile-sidebar">
                <div class="profile-info">
                    <div class="profile-avatar">
                        {{ strtoupper(substr($user->name, 0, 1)) }}
                    </div>
                    <div class="profile-name">{{ $user->name }}</div>
                    <div class="profile-email">{{ $user->email }}</div>
                </div>

                <nav>
                    <ul class="profile-nav">
                        <li><a href="{{ route('profile.index') }}">Áttekintés</a></li>
                        <li><a href="{{ route('profile.orders') }}" class="active">Rendeléseim</a></li>
                        <li><a href="{{ route('settings.profile') }}">Beállítások</a></li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}" style="margin: 0;">
                                @csrf
                                <button type="submit" style="background: none; border: none; color: #333; padding: 0.75rem 1rem; width: 100%; text-align: left; border-radius: 6px; cursor: pointer; transition: all 0.3s ease;">
                                    Kijelentkezés
                                </button>
                            </form>
                        </li>
                    </ul>
                </nav>
            </div>

            <!-- Content -->
            <div class="profile-content">
                <h2 class="section-title">Rendelések ({{ $orders->total() }} db)</h2>

                @if($orders->count() > 0)
                    <table class="orders-table">
                        <thead>
                            <tr>
                                <th>Rendelés száma</th>
                                <th>Dátum</th>
                                <th>Állapot</th>
                                <th>Fizetés</th>
                                <th>Összeg</th>
                                <th>Műveletek</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($orders as $order)
                            <tr>
                                <td>
                                    <span class="order-number">#{{ $order->order_number }}</span>
                                </td>
                                <td>
                                    {{ $order->created_at->format('Y.m.d H:i') }}
                                </td>
                                <td>
                                    <span class="status-badge status-{{ $order->status }}">
                                        @switch($order->status)
                                            @case('pending')
                                                Feldolgozás alatt
                                                @break
                                            @case('confirmed')
                                                Jóváhagyva
                                                @break
                                            @case('shipped')
                                                Szállítás alatt
                                                @break
                                            @case('delivered')
                                                Kiszállítva
                                                @break
                                            @case('cancelled')
                                                Törölve
                                                @break
                                            @default
                                                {{ $order->status }}
                                        @endswitch
                                    </span>
                                </td>
                                <td>
                                    <span class="status-badge status-{{ $order->payment_status }}">
                                        @switch($order->payment_status)
                                            @case('pending')
                                                Függőben
                                                @break
                                            @case('paid')
                                                Fizetve
                                                @break
                                            @case('failed')
                                                Sikertelen
                                                @break
                                            @default
                                                {{ $order->payment_status }}
                                        @endswitch
                                    </span>
                                </td>
                                <td>
                                    <strong>{{ number_format($order->total, 0, ',', '.') }} HUF</strong>
                                </td>
                                <td>
                                    <a href="{{ route('profile.order-detail', $order->order_number) }}" class="btn btn-outline">
                                        Részletek
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <!-- Pagination -->
                    <div class="pagination">
                        {{ $orders->links() }}
                    </div>
                @else
                    <div class="empty-state">
                        <div class="empty-state-icon">📦</div>
                        <h3>Még nincs rendelése</h3>
                        <p>Kezdje el vásárlását modelljeink között böngészve!</p>
                        <a href="{{ route('models') }}" class="btn btn-primary" style="margin-top: 1rem;">
                            Modellek megtekintése
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </main>
</body>
</html>
<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil - Mercedes-Benz</title>
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

        /* Stats Grid */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1.5rem;
            margin-bottom: 3rem;
        }

        .stat-card {
            background: #f8f9fa;
            border-radius: 8px;
            padding: 1.5rem;
            text-align: center;
            border-left: 4px solid #00adef;
        }

        .stat-number {
            font-size: 2rem;
            font-weight: bold;
            color: #00adef;
            margin-bottom: 0.5rem;
        }

        .stat-label {
            color: #666;
            font-size: 0.9rem;
        }

        /* Recent Orders */
        .orders-preview {
            margin-bottom: 2rem;
        }

        .order-item {
            display: flex;
            align-items: center;
            padding: 1rem;
            border: 1px solid #eee;
            border-radius: 6px;
            margin-bottom: 1rem;
            transition: all 0.3s ease;
        }

        .order-item:hover {
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .order-info {
            flex: 1;
        }

        .order-number {
            font-weight: 600;
            margin-bottom: 0.25rem;
        }

        .order-date {
            font-size: 0.9rem;
            color: #666;
        }

        .order-status {
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

        .status-delivered {
            background: #d1ecf1;
            color: #0c5460;
        }

        .order-total {
            font-weight: 600;
            color: #00adef;
            margin-left: 1rem;
        }

        /* Buttons */
        .btn {
            display: inline-block;
            padding: 0.75rem 1.5rem;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            text-decoration: none;
            font-size: 1rem;
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
            border: 2px solid #00adef;
        }

        .btn-outline:hover {
            background: #00adef;
            color: white;
        }

        .btn-small {
            padding: 0.5rem 1rem;
            font-size: 0.9rem;
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

            .stats-grid {
                grid-template-columns: 1fr;
            }

            .order-item {
                flex-direction: column;
                text-align: center;
                gap: 1rem;
            }

            .order-total {
                margin-left: 0;
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
        <h1 class="page-title">Profilom</h1>
        <p class="page-subtitle">Személyes adatok és rendelési előzmények</p>

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
                        <li><a href="{{ route('profile.index') }}" class="active">Áttekintés</a></li>
                        <li><a href="{{ route('profile.orders') }}">Rendeléseim</a></li>
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
                <h2 class="section-title">Áttekintés</h2>

                <!-- Statistics -->
                <div class="stats-grid">
                    <div class="stat-card">
                        <div class="stat-number">{{ $orders->total() }}</div>
                        <div class="stat-label">Összes rendelés</div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-number">{{ $orders->where('status', 'pending')->count() }}</div>
                        <div class="stat-label">Feldolgozás alatt</div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-number">{{ $orders->where('status', 'delivered')->count() }}</div>
                        <div class="stat-label">Kiszállítva</div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-number">{{ number_format($orders->sum('total'), 0, ',', '.') }} HUF</div>
                        <div class="stat-label">Összes vásárlás</div>
                    </div>
                </div>

                <!-- Recent Orders -->
                <div class="orders-preview">
                    <h3 style="margin-bottom: 1.5rem; display: flex; justify-content: space-between; align-items: center;">
                        Legutóbbi rendelések
                        <a href="{{ route('profile.orders') }}" class="btn btn-outline btn-small">Összes megtekintése</a>
                    </h3>

                    @if($orders->count() > 0)
                        @foreach($orders->take(5) as $order)
                        <div class="order-item">
                            <div class="order-info">
                                <div class="order-number">#{{ $order->order_number }}</div>
                                <div class="order-date">{{ $order->created_at->format('Y. m. d. H:i') }}</div>
                            </div>
                            <div class="order-status status-{{ $order->status }}">
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
                                    @default
                                        {{ $order->status }}
                                @endswitch
                            </div>
                            <div class="order-total">{{ number_format($order->total, 0, ',', '.') }} HUF</div>
                            <a href="{{ route('profile.order-detail', $order->order_number) }}" class="btn btn-outline btn-small">
                                Részletek
                            </a>
                        </div>
                        @endforeach
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
        </div>
    </main>
</body>
</html>
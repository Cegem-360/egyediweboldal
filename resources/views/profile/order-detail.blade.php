<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rendelés #{{ $order->order_number }} - Mercedes-Benz</title>
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

        .user-name {
            color: #fff;
            padding: 0.5rem 1rem;
            background: #333;
            border-radius: 6px;
        }

        /* Main Content */
        .main-content {
            max-width: 1200px;
            margin: 2rem auto;
            padding: 0 2rem;
        }

        .breadcrumb {
            margin-bottom: 2rem;
            color: #666;
        }

        .breadcrumb a {
            color: #00adef;
            text-decoration: none;
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

        /* Order Details */
        .order-container {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 3rem;
        }

        .order-details {
            background: white;
            border-radius: 8px;
            padding: 2rem;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .order-summary {
            background: white;
            border-radius: 8px;
            padding: 2rem;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            height: fit-content;
        }

        .section-title {
            font-size: 1.3rem;
            font-weight: 600;
            margin-bottom: 1.5rem;
            color: #333;
            border-bottom: 2px solid #00adef;
            padding-bottom: 0.5rem;
        }

        .info-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 2rem;
            margin-bottom: 3rem;
        }

        .info-section h4 {
            font-size: 1.1rem;
            margin-bottom: 1rem;
            color: #333;
        }

        .info-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 0.75rem;
            padding: 0.5rem 0;
            border-bottom: 1px solid #f0f0f0;
        }

        .info-row:last-child {
            border-bottom: none;
        }

        .info-label {
            font-weight: 600;
            color: #666;
        }

        .info-value {
            color: #333;
        }

        .order-number {
            font-size: 1.5rem;
            font-weight: bold;
            color: #00adef;
        }

        .status-badge {
            display: inline-block;
            padding: 0.5rem 1rem;
            border-radius: 20px;
            font-size: 0.9rem;
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

        .status-paid {
            background: #d1ecf1;
            color: #0c5460;
        }

        /* Order Items */
        .order-item {
            display: flex;
            align-items: center;
            gap: 1rem;
            padding: 1.5rem 0;
            border-bottom: 1px solid #f0f0f0;
        }

        .order-item:last-child {
            border-bottom: none;
        }

        .item-image {
            width: 80px;
            height: 60px;
            background: #f5f5f5;
            border-radius: 6px;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
        }

        .item-image img {
            max-width: 100%;
            max-height: 100%;
            object-fit: contain;
        }

        .item-details {
            flex: 1;
        }

        .item-name {
            font-weight: 600;
            margin-bottom: 0.25rem;
        }

        .item-model {
            font-size: 0.9rem;
            color: #666;
        }

        .item-quantity {
            font-size: 0.9rem;
            color: #888;
        }

        .item-price {
            font-weight: 600;
            color: #00adef;
        }

        /* Summary */
        .summary-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 0.75rem;
            padding: 0.5rem 0;
        }

        .summary-row.total {
            font-size: 1.2rem;
            font-weight: bold;
            padding-top: 1rem;
            border-top: 1px solid #eee;
            margin-top: 1rem;
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

        .actions {
            margin-top: 2rem;
            display: flex;
            gap: 1rem;
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

            .order-container {
                grid-template-columns: 1fr;
                gap: 2rem;
            }

            .info-grid {
                grid-template-columns: 1fr;
                gap: 1rem;
            }

            .order-item {
                flex-direction: column;
                text-align: center;
                gap: 0.5rem;
            }

            .actions {
                flex-direction: column;
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
                <span class="user-name">{{ Auth::user()->name }}</span>
            </nav>
        </div>
    </header>

    <!-- Main Content -->
    <main class="main-content">
        <!-- Breadcrumb -->
        <div class="breadcrumb">
            <a href="{{ route('profile.index') }}">Profil</a> / 
            <a href="{{ route('profile.orders') }}">Rendeléseim</a> / 
            #{{ $order->order_number }}
        </div>

        <h1 class="page-title">Rendelés #{{ $order->order_number }}</h1>
        <p class="page-subtitle">Rendelés leadva: {{ $order->created_at->format('Y. m. d. H:i') }}</p>

        <div class="order-container">
            <!-- Order Details -->
            <div class="order-details">
                <!-- Order Info -->
                <div class="section-title">Rendelés adatai</div>
                <div class="info-grid">
                    <div class="info-section">
                        <h4>Rendelés információk</h4>
                        <div class="info-row">
                            <span class="info-label">Rendelés száma:</span>
                            <span class="info-value order-number">#{{ $order->order_number }}</span>
                        </div>
                        <div class="info-row">
                            <span class="info-label">Állapot:</span>
                            <span class="info-value">
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
                                        @default
                                            {{ $order->status }}
                                    @endswitch
                                </span>
                            </span>
                        </div>
                        <div class="info-row">
                            <span class="info-label">Fizetés:</span>
                            <span class="info-value">
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
                            </span>
                        </div>
                        <div class="info-row">
                            <span class="info-label">Fizetési mód:</span>
                            <span class="info-value">
                                @switch($order->payment_method)
                                    @case('card')
                                        💳 Bankkártya
                                        @break
                                    @case('transfer')
                                        🏦 Banki átutalás
                                        @break
                                    @case('cash')
                                        💵 Készpénz
                                        @break
                                    @default
                                        {{ $order->payment_method }}
                                @endswitch
                            </span>
                        </div>
                    </div>

                    <div class="info-section">
                        <h4>Kapcsolattartó</h4>
                        <div class="info-row">
                            <span class="info-label">Név:</span>
                            <span class="info-value">{{ $order->customer_name }}</span>
                        </div>
                        <div class="info-row">
                            <span class="info-label">E-mail:</span>
                            <span class="info-value">{{ $order->customer_email }}</span>
                        </div>
                        @if($order->customer_phone)
                        <div class="info-row">
                            <span class="info-label">Telefon:</span>
                            <span class="info-value">{{ $order->customer_phone }}</span>
                        </div>
                        @endif
                    </div>
                </div>

                <!-- Addresses -->
                <div class="info-grid">
                    <div class="info-section">
                        <h4>Számlázási cím</h4>
                        <div class="info-row">
                            <span class="info-label">Név:</span>
                            <span class="info-value">{{ $order->billing_name }}</span>
                        </div>
                        <div class="info-row">
                            <span class="info-label">Cím:</span>
                            <span class="info-value">{{ $order->billing_address }}</span>
                        </div>
                        <div class="info-row">
                            <span class="info-label">Város:</span>
                            <span class="info-value">{{ $order->billing_city }} {{ $order->billing_postal_code }}</span>
                        </div>
                        <div class="info-row">
                            <span class="info-label">Ország:</span>
                            <span class="info-value">{{ $order->billing_country }}</span>
                        </div>
                    </div>

                    <div class="info-section">
                        <h4>Szállítási cím</h4>
                        <div class="info-row">
                            <span class="info-label">Név:</span>
                            <span class="info-value">{{ $order->shipping_name ?? $order->billing_name }}</span>
                        </div>
                        <div class="info-row">
                            <span class="info-label">Cím:</span>
                            <span class="info-value">{{ $order->shipping_address ?? $order->billing_address }}</span>
                        </div>
                        <div class="info-row">
                            <span class="info-label">Város:</span>
                            <span class="info-value">{{ $order->shipping_city ?? $order->billing_city }} {{ $order->shipping_postal_code ?? $order->billing_postal_code }}</span>
                        </div>
                        <div class="info-row">
                            <span class="info-label">Ország:</span>
                            <span class="info-value">{{ $order->shipping_country ?? $order->billing_country }}</span>
                        </div>
                    </div>
                </div>

                <!-- Order Items -->
                <div class="section-title">Rendelt termékek</div>
                @foreach($order->orderItems as $item)
                <div class="order-item">
                    <div class="item-image">
                        @if($item->car && $item->car->image)
                            <img src="{{ asset('storage/' . $item->car->image) }}" alt="{{ $item->car_name }}">
                        @else
                            <div style="color: #999; font-size: 0.8rem; text-align: center;">{{ $item->car_name }}</div>
                        @endif
                    </div>
                    <div class="item-details">
                        <div class="item-name">{{ $item->car_name }}</div>
                        <div class="item-model">{{ $item->car_model }}</div>
                        <div class="item-quantity">{{ $item->quantity }} db × {{ number_format($item->unit_price, 0, ',', '.') }} HUF</div>
                        @if($item->options && is_array($item->options) && count($item->options) > 0)
                            <div class="item-quantity">
                                Opciók: 
                                @foreach($item->options as $key => $value)
                                    {{ $key }}: {{ $value }}@if(!$loop->last), @endif
                                @endforeach
                            </div>
                        @endif
                    </div>
                    <div class="item-price">{{ number_format($item->total_price, 0, ',', '.') }} HUF</div>
                </div>
                @endforeach

                @if($order->notes)
                <div class="section-title">Megjegyzések</div>
                <p style="color: #666; line-height: 1.6;">{{ $order->notes }}</p>
                @endif

                <!-- Actions -->
                <div class="actions">
                    <a href="{{ route('profile.orders') }}" class="btn btn-outline">← Vissza a rendelésekhez</a>
                    @if($order->status === 'pending')
                        <button class="btn btn-primary" onclick="alert('Rendelés visszamondása fejlesztés alatt!')">
                            Rendelés visszamondása
                        </button>
                    @endif
                </div>
            </div>

            <!-- Order Summary -->
            <div class="order-summary">
                <div class="section-title">Összesítő</div>
                
                <div class="summary-row">
                    <span>Részösszeg:</span>
                    <span>{{ number_format($order->subtotal, 0, ',', '.') }} HUF</span>
                </div>
                
                <div class="summary-row">
                    <span>ÁFA (27%):</span>
                    <span>{{ number_format($order->tax_amount, 0, ',', '.') }} HUF</span>
                </div>
                
                <div class="summary-row">
                    <span>Szállítás:</span>
                    <span>{{ number_format($order->shipping_amount, 0, ',', '.') }} HUF</span>
                </div>
                
                <div class="summary-row total">
                    <span>Végösszeg:</span>
                    <span>{{ number_format($order->total, 0, ',', '.') }} HUF</span>
                </div>

                @if($order->payment_method === 'transfer' && $order->payment_status === 'pending')
                <div style="background: #fff3cd; padding: 1rem; border-radius: 6px; margin-top: 1rem;">
                    <strong>Fizetési információk:</strong><br>
                    <small>Kérjük, utalja át a végösszeget a következő számlaszámra:<br>
                    <strong>12345678-12345678-12345678</strong><br>
                    Közlemény: {{ $order->order_number }}</small>
                </div>
                @endif

                @if($order->payment_method === 'cash')
                <div style="background: #d4edda; padding: 1rem; border-radius: 6px; margin-top: 1rem;">
                    <strong>Készpénzes fizetés</strong><br>
                    <small>A rendelés összegét átvételkor fizetheti ki készpénzben.</small>
                </div>
                @endif
            </div>
        </div>
    </main>
</body>
</html>
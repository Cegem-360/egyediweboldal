<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rendelés leadva - Mercedes-Benz</title>
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

        /* Main Content */
        .main-content {
            max-width: 800px;
            margin: 3rem auto;
            padding: 0 2rem;
        }

        .success-container {
            background: white;
            border-radius: 12px;
            padding: 3rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .success-icon {
            font-size: 4rem;
            margin-bottom: 1.5rem;
        }

        .success-title {
            font-size: 2.5rem;
            font-weight: 300;
            color: #28a745;
            margin-bottom: 1rem;
        }

        .success-subtitle {
            font-size: 1.2rem;
            color: #666;
            margin-bottom: 2rem;
        }

        .order-info {
            background: #f8f9fa;
            border-radius: 8px;
            padding: 2rem;
            margin: 2rem 0;
            text-align: left;
        }

        .order-info h3 {
            margin-bottom: 1.5rem;
            color: #333;
            border-bottom: 2px solid #00adef;
            padding-bottom: 0.5rem;
        }

        .info-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 1rem;
            padding: 0.5rem 0;
            border-bottom: 1px solid #eee;
        }

        .info-row:last-child {
            border-bottom: none;
            margin-bottom: 0;
        }

        .info-label {
            font-weight: 600;
            color: #333;
        }

        .info-value {
            color: #666;
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

        .status-paid {
            background: #d1ecf1;
            color: #0c5460;
        }

        /* Order Items */
        .order-items {
            margin-top: 2rem;
        }

        .order-item {
            display: flex;
            align-items: center;
            gap: 1rem;
            padding: 1rem 0;
            border-bottom: 1px solid #eee;
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

        /* Actions */
        .actions {
            margin-top: 2rem;
            display: flex;
            gap: 1rem;
            justify-content: center;
            flex-wrap: wrap;
        }

        .btn {
            padding: 1rem 2rem;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            text-decoration: none;
            font-size: 1rem;
            font-weight: 600;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }

        .btn-primary {
            background: #00adef;
            color: white;
        }

        .btn-primary:hover {
            background: #0088cc;
        }

        .btn-secondary {
            background: #6c757d;
            color: white;
        }

        .btn-secondary:hover {
            background: #545b62;
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

        /* Next Steps */
        .next-steps {
            background: #e3f2fd;
            border-radius: 8px;
            padding: 1.5rem;
            margin-top: 2rem;
            text-align: left;
        }

        .next-steps h4 {
            color: #1565c0;
            margin-bottom: 1rem;
        }

        .next-steps ul {
            list-style: none;
            padding: 0;
        }

        .next-steps li {
            padding: 0.5rem 0;
            position: relative;
            padding-left: 1.5rem;
        }

        .next-steps li:before {
            content: "✓";
            position: absolute;
            left: 0;
            color: #4caf50;
            font-weight: bold;
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

            .success-container {
                padding: 2rem 1.5rem;
            }

            .success-title {
                font-size: 2rem;
            }

            .actions {
                flex-direction: column;
            }

            .btn {
                justify-content: center;
            }

            .order-item {
                flex-direction: column;
                text-align: center;
                gap: 0.5rem;
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
            </nav>
        </div>
    </header>

    <!-- Main Content -->
    <main class="main-content">
        <div class="success-container">
            <div class="success-icon">✅</div>
            <h1 class="success-title">Rendelés sikeresen leadva!</h1>
            <p class="success-subtitle">Köszönjük rendelését! Hamarosan e-mailt küldünk a további részletekkel.</p>

            <!-- Order Information -->
            <div class="order-info">
                <h3>Rendelés részletei</h3>
                <div class="info-row">
                    <span class="info-label">Rendelés száma:</span>
                    <span class="info-value order-number">{{ $order->order_number }}</span>
                </div>
                <div class="info-row">
                    <span class="info-label">Rendelés dátuma:</span>
                    <span class="info-value">{{ $order->created_at->format('Y. m. d. H:i') }}</span>
                </div>
                <div class="info-row">
                    <span class="info-label">Ügyfél:</span>
                    <span class="info-value">{{ $order->customer_name }}</span>
                </div>
                <div class="info-row">
                    <span class="info-label">E-mail:</span>
                    <span class="info-value">{{ $order->customer_email }}</span>
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
                    <span class="info-label">Fizetés állapota:</span>
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
                <div class="info-row">
                    <span class="info-label">Végösszeg:</span>
                    <span class="info-value order-number">{{ number_format($order->total, 0, ',', '.') }} {{ $order->currency }}</span>
                </div>
            </div>

            <!-- Order Items -->
            <div class="order-items">
                <h3>Rendelt termékek</h3>
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
                        <div class="item-quantity">{{ $item->quantity }} db</div>
                        @if($item->options && is_array($item->options) && count($item->options) > 0)
                            <div class="item-quantity">
                                @foreach($item->options as $key => $value)
                                    {{ $key }}: {{ $value }}@if(!$loop->last), @endif
                                @endforeach
                            </div>
                        @endif
                    </div>
                    <div class="item-price">{{ number_format($item->total_price, 0, ',', '.') }} HUF</div>
                </div>
                @endforeach
            </div>

            <!-- Next Steps -->
            <div class="next-steps">
                <h4>További lépések:</h4>
                <ul>
                    <li>E-mail megerősítést fog kapni rendelésének részleteivel</li>
                    @if($order->payment_method === 'transfer')
                        <li>Banki átutalás esetén kérjük, utalja át a végösszeget a megadott számlaszámra</li>
                    @endif
                    @if($order->payment_method === 'cash')
                        <li>Készpénzes fizetés esetén az átvételkor fizetheti ki a rendelést</li>
                    @endif
                    <li>Munkatársunk hamarosan felveszi Önnel a kapcsolatot a további részletek egyeztetéséhez</li>
                    <li>Rendelése állapotát e-mailben követheti nyomon</li>
                </ul>
            </div>

            <!-- Actions -->
            <div class="actions">
                <a href="{{ route('home') }}" class="btn btn-primary">
                    🏠 Főoldal
                </a>
                <a href="{{ route('models') }}" class="btn btn-outline">
                    🚗 További modellek
                </a>
                @auth
                    <a href="#" class="btn btn-secondary">
                        📋 Rendeléseim
                    </a>
                @endauth
            </div>
        </div>
    </main>
</body>
</html>
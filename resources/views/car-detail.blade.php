<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $car->name }} - Mercedes-Benz</title>
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
            background: #fff;
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
            max-width: 1200px;
            margin: 2rem auto;
            padding: 0 2rem;
        }

        /* Breadcrumb */
        .breadcrumb {
            margin-bottom: 2rem;
            color: #666;
        }

        .breadcrumb a {
            color: #00adef;
            text-decoration: none;
        }

        /* Car Detail Section */
        .car-detail {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 3rem;
            margin-bottom: 3rem;
        }

        .car-image {
            position: relative;
        }

        .car-image img {
            width: 100%;
            height: 400px;
            object-fit: cover;
            border-radius: 8px;
        }

        .car-badge {
            position: absolute;
            top: 1rem;
            right: 1rem;
            background: #00adef;
            color: white;
            padding: 0.5rem 1rem;
            border-radius: 20px;
            font-size: 0.9rem;
            font-weight: 500;
        }

        .car-info {
            padding: 1rem;
        }

        .car-title {
            font-size: 2.5rem;
            font-weight: 300;
            margin-bottom: 0.5rem;
        }

        .car-model {
            font-size: 1.5rem;
            color: #666;
            margin-bottom: 1rem;
        }

        .car-price {
            font-size: 2rem;
            color: #00adef;
            font-weight: 600;
            margin-bottom: 1.5rem;
        }

        .car-meta {
            display: flex;
            gap: 2rem;
            margin-bottom: 2rem;
            flex-wrap: wrap;
        }

        .car-meta-item {
            display: flex;
            flex-direction: column;
        }

        .car-meta-label {
            font-size: 0.9rem;
            color: #666;
            margin-bottom: 0.25rem;
        }

        .car-meta-value {
            font-weight: 600;
        }

        .car-description {
            color: #666;
            margin-bottom: 2rem;
            line-height: 1.7;
        }

        .car-actions {
            display: flex;
            gap: 1rem;
            flex-wrap: wrap;
        }

        .btn {
            padding: 1rem 2rem;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none;
            font-size: 1rem;
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
            background: #fff;
            color: #333;
            border: 2px solid #ddd;
        }

        .btn-secondary:hover {
            background: #f5f5f5;
            border-color: #00adef;
        }

        /* Specifications */
        .specifications {
            background: #f8f9fa;
            padding: 2rem;
            border-radius: 8px;
            margin-bottom: 3rem;
        }

        .specifications h3 {
            margin-bottom: 1.5rem;
            font-size: 1.5rem;
        }

        .spec-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1rem;
        }

        .spec-item {
            display: flex;
            justify-content: space-between;
            padding: 1rem;
            background: white;
            border-radius: 6px;
            border-left: 4px solid #00adef;
        }

        .spec-label {
            font-weight: 600;
            color: #333;
        }

        .spec-value {
            color: #666;
        }

        /* Related Cars */
        .related-cars {
            margin-top: 4rem;
        }

        .related-cars h3 {
            margin-bottom: 2rem;
            text-align: center;
            font-size: 2rem;
            font-weight: 300;
        }

        .related-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 2rem;
        }

        .related-car {
            background: white;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
            text-decoration: none;
            color: inherit;
        }

        .related-car:hover {
            transform: translateY(-4px);
        }

        .related-car img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .related-car-info {
            padding: 1.5rem;
        }

        .related-car-name {
            font-size: 1.2rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
        }

        .related-car-price {
            color: #00adef;
            font-size: 1.1rem;
            font-weight: 600;
        }

        /* Footer */
        .footer {
            background: #000;
            color: #fff;
            text-align: center;
            padding: 2rem 0;
            margin-top: 4rem;
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

            .car-detail {
                grid-template-columns: 1fr;
                gap: 2rem;
            }

            .car-title {
                font-size: 2rem;
            }

            .car-meta {
                gap: 1rem;
            }

            .car-actions {
                flex-direction: column;
            }

            .btn {
                justify-content: center;
            }

            .spec-grid {
                grid-template-columns: 1fr;
            }

            .related-grid {
                grid-template-columns: 1fr;
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
                <a href="{{ route('vasarlas') }}">Vásárlás</a>
                <a href="{{ route('about') }}">Rólunk</a>
                <a href="{{ route('services') }}">Szolgáltatások</a>
                
                <!-- Right Side -->
                <div style="margin-left: auto; display: flex; align-items: center; gap: 1rem;">
                    <!-- Cart -->
                    <a href="{{ route('cart.index') }}" style="position: relative; color: #fff; text-decoration: none; padding: 0.5rem;">
                        🛒
                        @php
                            $cartService = app(\App\Services\CartService::class);
                            $cartCount = $cartService->getCartCount();
                        @endphp
                        @if($cartCount > 0)
                            <span style="position: absolute; top: 0; right: 0; background: #00adef; color: white; border-radius: 50%; width: 18px; height: 18px; font-size: 12px; display: flex; align-items: center; justify-content: center; font-weight: bold;">
                                {{ $cartCount }}
                            </span>
                        @endif
                    </a>
                    
                    @if (Route::has('login'))
                        @auth
                            <div style="display: flex; align-items: center; gap: 0.5rem;">
                                <a href="{{ route('profile.index') }}" style="color: #00adef; font-weight: 600; text-decoration: none;">{{ Auth::user()->name }}</a>
                                <form method="POST" action="{{ route('logout') }}" style="margin: 0;">
                                    @csrf
                                    <button type="submit" style="background: none; border: none; color: #fff; cursor: pointer; padding: 0.5rem;">Kilépés</button>
                                </form>
                            </div>
                        @else
                            <a href="{{ route('login') }}" style="color: #fff; text-decoration: none; padding: 0.5rem 1rem;">Bejelentkezés</a>
                        @endauth
                    @endif
                </div>
            </nav>
        </div>
    </header>

    <!-- Main Content -->
    <main class="main-content">
        <!-- Breadcrumb -->
        <div class="breadcrumb">
            <a href="{{ route('home') }}">Főoldal</a> / 
            <a href="{{ route('models') }}">Modellek</a> / 
            {{ $car->name }}
        </div>

        <!-- Car Detail -->
        <section class="car-detail">
            <div class="car-image">
                @if($car->image)
                    <img src="{{ asset('storage/' . $car->image) }}" alt="{{ $car->name }}">
                @else
                    <img src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='400' height='300' viewBox='0 0 400 300'%3E%3Crect width='400' height='300' fill='%23f0f0f0'/%3E%3Ctext x='200' y='150' text-anchor='middle' dy='.3em' fill='%23999' font-size='14' font-family='Arial, sans-serif'%3E{{ $car->name }}%3C/text%3E%3C/svg%3E" alt="{{ $car->name }}">
                @endif
                
                @if($car->featured)
                    <div class="car-badge">Kiemelt</div>
                @endif
            </div>

            <div class="car-info">
                <h1 class="car-title">{{ $car->name }}</h1>
                <p class="car-model">{{ $car->model }}</p>
                <div class="car-price">{{ $car->formatted_price }}</div>

                <div class="car-meta">
                    <div class="car-meta-item">
                        <span class="car-meta-label">Kategória</span>
                        <span class="car-meta-value">{{ App\Models\Car::CATEGORIES[$car->category] ?? $car->category }}</span>
                    </div>
                    <div class="car-meta-item">
                        <span class="car-meta-label">Típus</span>
                        <span class="car-meta-value">{{ App\Models\Car::TYPES[$car->type] ?? $car->type }}</span>
                    </div>
                    <div class="car-meta-item">
                        <span class="car-meta-label">Valuta</span>
                        <span class="car-meta-value">{{ $car->currency }}</span>
                    </div>
                </div>

                @if($car->description)
                    <div class="car-description">
                        {{ $car->description }}
                    </div>
                @endif

                <div class="car-actions">
                    <button class="btn btn-primary" onclick="addToCart({{ $car->id }})">
                        <svg width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                            <path d="M8 2a5.53 5.53 0 0 0-3.594 1.342c-.766.66-1.321 1.52-1.464 2.383C1.266 6.095 0 7.555 0 9.318 0 11.366 1.708 13 3.781 13h8.906C14.502 13 16 11.57 16 9.773c0-1.636-1.02-2.94-2.307-3.337-.344-1.23-1.694-2.436-3.693-2.436zm5.703 6.25a.5.5 0 0 0-.5.5v1.5a.5.5 0 0 0 1 0V9a.5.5 0 0 0-.5-.5zm-3 1.5a.5.5 0 0 0-.5.5v1.5a.5.5 0 0 0 1 0V10a.5.5 0 0 0-.5-.5zm-1.5-1.5a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 1 0V8.5a.5.5 0 0 0-.5-.5z"/>
                        </svg>
                        Kosárba helyezés
                    </button>
                    <a href="{{ route('cart.index') }}" class="btn btn-secondary">
                        <svg width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                            <path d="M5.757 1.071a.5.5 0 0 1 .172.686L3.383 6h9.234L10.07 1.757a.5.5 0 1 1 .858-.514L13.783 6H15a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1v4.5a2.5 2.5 0 0 1-2.5 2.5h-9A2.5 2.5 0 0 1 1 13.5V9a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h1.217L5.07 1.243a.5.5 0 0 1 .686-.172zM2 9v4.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V9H2z"/>
                        </svg>
                        Kosár megtekintése
                    </a>
                </div>
            </div>
        </section>

        <!-- Specifications -->
        @if($car->specifications && count($car->specifications) > 0)
        <section class="specifications">
            <h3>Specifikációk</h3>
            <div class="spec-grid">
                @foreach($car->specifications as $key => $value)
                    <div class="spec-item">
                        <span class="spec-label">{{ $key }}</span>
                        <span class="spec-value">{{ $value }}</span>
                    </div>
                @endforeach
            </div>
        </section>
        @endif

        <!-- Related Cars -->
        @if($relatedCars->count() > 0)
        <section class="related-cars">
            <h3>Hasonló modellek</h3>
            <div class="related-grid">
                @foreach($relatedCars as $relatedCar)
                    <a href="{{ route('car.show', $relatedCar->id) }}" class="related-car">
                        @if($relatedCar->image)
                            <img src="{{ asset('storage/' . $relatedCar->image) }}" alt="{{ $relatedCar->name }}">
                        @else
                            <img src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='280' height='200' viewBox='0 0 280 200'%3E%3Crect width='280' height='200' fill='%23f0f0f0'/%3E%3Ctext x='140' y='100' text-anchor='middle' dy='.3em' fill='%23999' font-size='12' font-family='Arial, sans-serif'%3E{{ $relatedCar->name }}%3C/text%3E%3C/svg%3E" alt="{{ $relatedCar->name }}">
                        @endif
                        <div class="related-car-info">
                            <h4 class="related-car-name">{{ $relatedCar->name }}</h4>
                            <p class="related-car-price">{{ $relatedCar->formatted_price }}</p>
                        </div>
                    </a>
                @endforeach
            </div>
        </section>
        @endif
    </main>

    <!-- Footer -->
    <footer class="footer">
        <div class="footer-container">
            <p>&copy; 2024 Mercedes-Benz. Minden jog fenntartva.</p>
        </div>
    </footer>

    <script>
    // Add to cart functionality
    function addToCart(carId) {
        const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || '{{ csrf_token() }}';
        
        fetch(`/kosar/add/${carId}`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': csrfToken
            },
            body: JSON.stringify({
                quantity: 1,
                options: {}
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert('✅ ' + data.message);
                
                // Optional: Update cart count in header if exists
                const cartCount = document.getElementById('cart-count');
                if (cartCount) {
                    cartCount.textContent = data.cart_count;
                }
            } else {
                alert('❌ ' + data.message);
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('❌ Hiba történt a kosárhoz adás során');
        });
    }
    </script>

    <!-- Add CSRF token to head -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
</body>
</html>
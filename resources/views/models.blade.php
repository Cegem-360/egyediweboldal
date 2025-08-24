<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Modellek - Mercedes-Benz Magyarország</title>
    
    <link rel="icon" href="/favicon.ico" sizes="any">
    <link rel="icon" href="/favicon.svg" type="image/svg+xml">
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:300,400,500,600,700" rel="stylesheet" />
    
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body { 
            font-family: 'Inter', sans-serif; 
            line-height: 1.6;
            background: #f9fafb;
        }
        
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 1rem;
        }
        
        /* Header */
        .header {
            background: white;
            border-bottom: 1px solid #e5e7eb;
            position: sticky;
            top: 0;
            z-index: 50;
        }
        
        .nav {
            display: flex;
            align-items: center;
            justify-content: space-between;
            height: 4rem;
        }
        
        .logo {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-weight: 700;
            font-size: 1.25rem;
            color: black;
            text-decoration: none;
        }
        
        .mb-star {
            width: 24px;
            height: 24px;
            background: url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjQiIGhlaWdodD0iMjQiIHZpZXdCb3g9IjAgMCAyNCAyNCIgZmlsbD0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPHBhdGggZD0iTTEyIDJMMTQuMDkgOC4yNkwyMiA5TDE2IDEzLjc0TDE4LjE4IDIyTDEyIDE4LjI3TDUuODIgMjJMOCAxMy43NEwyIDlMOS45MSA4LjI2TDEyIDJaIiBmaWxsPSIjMDAwIi8+Cjwvc3ZnPgo=') no-repeat center center;
            background-size: contain;
        }
        
        .nav-menu {
            display: none;
            gap: 2rem;
        }
        
        @media (min-width: 1024px) {
            .nav-menu {
                display: flex;
            }
        }
        
        .nav-menu a {
            color: black;
            text-decoration: none;
            font-weight: 500;
            padding: 0.5rem 0.75rem;
            transition: color 0.3s;
        }
        
        .nav-menu a:hover, .nav-menu a.active {
            color: #2563eb;
        }
        
        .nav-right {
            display: flex;
            align-items: center;
            gap: 1rem;
        }
        
        .icon-btn {
            background: none;
            border: none;
            color: black;
            cursor: pointer;
            padding: 0.5rem;
        }
        
        .icon-btn:hover {
            color: #2563eb;
        }
        
        /* Page Header */
        .page-header {
            background: white;
            padding: 2rem 0;
            margin-bottom: 2rem;
        }
        
        .page-title {
            font-size: 2.5rem;
            font-weight: 700;
            color: black;
            margin-bottom: 0.5rem;
        }
        
        .page-subtitle {
            color: #6b7280;
            font-size: 1.125rem;
        }
        
        /* Main Content */
        .main-content {
            display: flex;
            gap: 2rem;
            margin-bottom: 4rem;
        }
        
        /* Sidebar Filters */
        .sidebar {
            width: 280px;
            background: white;
            padding: 1.5rem;
            border-radius: 0.5rem;
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1);
            height: fit-content;
            position: sticky;
            top: 6rem;
        }
        
        .filter-title {
            font-size: 1.125rem;
            font-weight: 600;
            margin-bottom: 1rem;
            color: black;
        }
        
        .filter-group {
            margin-bottom: 1.5rem;
        }
        
        .filter-group h4 {
            font-size: 0.875rem;
            font-weight: 600;
            color: #374151;
            margin-bottom: 0.5rem;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }
        
        .filter-options {
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
        }
        
        .filter-option {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }
        
        .filter-option input[type="checkbox"] {
            width: 1rem;
            height: 1rem;
        }
        
        .filter-option label {
            font-size: 0.875rem;
            color: #4b5563;
            cursor: pointer;
        }
        
        .price-inputs {
            display: flex;
            gap: 0.5rem;
            align-items: center;
        }
        
        .price-input {
            flex: 1;
            padding: 0.5rem;
            border: 1px solid #d1d5db;
            border-radius: 0.375rem;
            font-size: 0.875rem;
        }
        
        .filter-btn {
            width: 100%;
            background: #2563eb;
            color: white;
            border: none;
            padding: 0.75rem 1rem;
            border-radius: 0.375rem;
            font-weight: 600;
            cursor: pointer;
            margin-top: 1rem;
        }
        
        .filter-btn:hover {
            background: #1d4ed8;
        }
        
        .clear-btn {
            width: 100%;
            background: transparent;
            color: #6b7280;
            border: 1px solid #d1d5db;
            padding: 0.5rem 1rem;
            border-radius: 0.375rem;
            font-size: 0.875rem;
            cursor: pointer;
            margin-top: 0.5rem;
        }
        
        .clear-btn:hover {
            background: #f9fafb;
        }
        
        /* Results */
        .results {
            flex: 1;
        }
        
        .results-header {
            display: flex;
            justify-content: between;
            align-items: center;
            margin-bottom: 1.5rem;
            background: white;
            padding: 1rem;
            border-radius: 0.5rem;
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1);
        }
        
        .results-count {
            color: #6b7280;
            font-size: 0.875rem;
        }
        
        /* Car Grid */
        .car-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 1.5rem;
        }
        
        .car-card {
            background: white;
            border-radius: 0.5rem;
            overflow: hidden;
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1);
            transition: box-shadow 0.3s, transform 0.3s;
        }
        
        .car-card:hover {
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
            transform: translateY(-2px);
        }
        
        .car-image {
            height: 200px;
            background: linear-gradient(135deg, #f3f4f6, #e5e7eb);
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
        }
        
        .car-badge {
            position: absolute;
            top: 1rem;
            left: 1rem;
            padding: 0.25rem 0.5rem;
            border-radius: 0.25rem;
            font-size: 0.75rem;
            font-weight: 600;
        }
        
        .badge-electric {
            background: #10b981;
            color: white;
        }
        
        .badge-amg {
            background: #ef4444;
            color: white;
        }
        
        .badge-hybrid {
            background: #f59e0b;
            color: white;
        }
        
        .badge-petrol {
            background: #6b7280;
            color: white;
        }
        
        .car-content {
            padding: 1.5rem;
        }
        
        .car-name {
            font-size: 1.25rem;
            font-weight: 700;
            color: black;
            margin-bottom: 0.5rem;
        }
        
        .car-model {
            color: #6b7280;
            font-size: 0.875rem;
            margin-bottom: 1rem;
        }
        
        .car-price {
            font-size: 1.125rem;
            font-weight: 600;
            color: black;
            margin-bottom: 1rem;
        }
        
        .car-actions {
            display: flex;
            gap: 0.75rem;
        }
        
        .btn {
            flex: 1;
            padding: 0.5rem 1rem;
            border-radius: 0.375rem;
            font-weight: 600;
            text-align: center;
            text-decoration: none;
            transition: all 0.3s;
            cursor: pointer;
            border: none;
            font-size: 0.875rem;
        }
        
        .btn-primary {
            background: #2563eb;
            color: white;
        }
        
        .btn-primary:hover {
            background: #1d4ed8;
        }
        
        .btn-secondary {
            background: transparent;
            color: #2563eb;
            border: 1px solid #2563eb;
        }
        
        .btn-secondary:hover {
            background: #2563eb;
            color: white;
        }
        
        /* Mobile */
        @media (max-width: 1023px) {
            .main-content {
                flex-direction: column;
            }
            
            .sidebar {
                width: 100%;
                position: static;
            }
        }
        
        /* Footer star */
        .footer .mb-star {
            background-image: url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjQiIGhlaWdodD0iMjQiIHZpZXdCb3g9IjAgMCAyNCAyNCIgZmlsbD0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPHBhdGggZD0iTTEyIDJMMTQuMDkgOC4yNkwyMiA5TDE2IDEzLjc0TDE4LjE4IDIyTDEyIDE4LjI3TDUuODIgMjJMOCAxMy43NEwyIDlMOS45MSA4LjI2TDEyIDJaIiBmaWxsPSIjRkZGRkZGIi8+Cjwvc3ZnPgo=');
        }
        
        /* Footer styles */
        .footer {
            background: black;
            color: white;
            padding: 4rem 0;
            margin-top: 4rem;
        }
        
        .footer-content {
            display: grid;
            gap: 2rem;
            margin-bottom: 3rem;
        }
        
        @media (min-width: 768px) {
            .footer-content {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }
        }
        
        @media (min-width: 1024px) {
            .footer-content {
                grid-template-columns: repeat(5, minmax(0, 1fr));
            }
        }
        
        .footer h4 {
            font-weight: 600;
            margin-bottom: 1rem;
        }
        
        .footer ul {
            list-style: none;
        }
        
        .footer li {
            margin-bottom: 0.5rem;
        }
        
        .footer a {
            color: #9ca3af;
            text-decoration: none;
            transition: color 0.3s;
        }
        
        .footer a:hover {
            color: white;
        }
        
        .footer-bottom {
            border-top: 1px solid #374151;
            padding-top: 2rem;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 1rem;
        }
        
        @media (min-width: 768px) {
            .footer-bottom {
                flex-direction: row;
                justify-content: space-between;
            }
        }
        
        .footer-links {
            display: flex;
            gap: 1.5rem;
        }
    </style>
</head>

<body>
    <!-- Header -->
    <header class="header">
        <div class="container">
            <nav class="nav">
                <!-- Logo -->
                <a href="{{ route('home') }}" class="logo">
                    <div class="mb-star"></div>
                    <span>Mercedes-Benz</span>
                </a>
                
                <!-- Navigation -->
                <div class="nav-menu">
                    <a href="{{ route('home') }}">Főoldal</a>
                    <a href="{{ route('models') }}" class="active">Modellek</a>
                    <a href="{{ route('vasarlas') }}">Vásárlás</a>
                    <a href="{{ route('services') }}">Szolgáltatások</a>
                    <a href="{{ route('about') }}">Rólunk</a>
                </div>
                
                <!-- Right Side -->
                <div class="nav-right">
                    <!-- Cart -->
                    <a href="{{ route('cart.index') }}" class="icon-btn cart-btn" style="position: relative;">
                        <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4m0 0L7 13m0 0l-1.1 5H17M9 19.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM20.5 19.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0z"></path>
                        </svg>
                        @php
                            $cartService = app(\App\Services\CartService::class);
                            $cartCount = $cartService->getCartCount();
                        @endphp
                        @if($cartCount > 0)
                            <span style="position: absolute; top: -5px; right: -5px; background: #00adef; color: white; border-radius: 50%; width: 18px; height: 18px; font-size: 12px; display: flex; align-items: center; justify-content: center; font-weight: bold;">
                                {{ $cartCount }}
                            </span>
                        @endif
                    </a>
                    
                    @if (Route::has('login'))
                        @auth
                            <div style="display: flex; align-items: center; gap: 0.5rem;">
                                <a href="{{ route('profile.index') }}" class="icon-btn" style="color: #00adef; font-weight: 600;">{{ Auth::user()->name }}</a>
                                <form method="POST" action="{{ route('logout') }}" style="margin: 0;">
                                    @csrf
                                    <button type="submit" class="icon-btn" style="background: none; border: none; color: #666; cursor: pointer;">Kilépés</button>
                                </form>
                            </div>
                        @else
                            <a href="{{ route('login') }}" class="icon-btn">Bejelentkezés</a>
                        @endauth
                    @endif
                </div>
            </nav>
        </div>
    </header>

    <!-- Page Header -->
    <section class="page-header">
        <div class="container">
            <h1 class="page-title">Modellek</h1>
            <p class="page-subtitle">Fedezze fel teljes Mercedes-Benz modellkínálatunkat</p>
        </div>
    </section>

    <!-- Main Content -->
    <div class="container">
        <div class="main-content">
            <!-- Sidebar Filters -->
            <aside class="sidebar">
                <h3 class="filter-title">Szűrők</h3>
                
                <form method="GET" action="{{ route('models') }}" id="filterForm">
                    <!-- Kategória szűrő -->
                    <div class="filter-group">
                        <h4>Kategória</h4>
                        <div class="filter-options">
                            @foreach($categories as $key => $category)
                            <div class="filter-option">
                                <input type="checkbox" 
                                       id="category_{{ $key }}" 
                                       name="category[]" 
                                       value="{{ $key }}"
                                       {{ in_array($key, request('category', [])) ? 'checked' : '' }}
                                       onchange="this.form.submit()">
                                <label for="category_{{ $key }}">{{ $category }}</label>
                            </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- Típus szűrő -->
                    <div class="filter-group">
                        <h4>Típus</h4>
                        <div class="filter-options">
                            @foreach($types as $key => $type)
                            <div class="filter-option">
                                <input type="checkbox" 
                                       id="type_{{ $key }}" 
                                       name="type[]" 
                                       value="{{ $key }}"
                                       {{ in_array($key, request('type', [])) ? 'checked' : '' }}
                                       onchange="this.form.submit()">
                                <label for="type_{{ $key }}">{{ $type }}</label>
                            </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- Ár szűrő -->
                    <div class="filter-group">
                        <h4>Ár (Ft)</h4>
                        <div class="price-inputs">
                            <input type="number" 
                                   name="price_from" 
                                   placeholder="Minimum" 
                                   class="price-input"
                                   value="{{ request('price_from') }}"
                                   step="100000">
                            <span>-</span>
                            <input type="number" 
                                   name="price_to" 
                                   placeholder="Maximum" 
                                   class="price-input"
                                   value="{{ request('price_to') }}"
                                   step="100000">
                        </div>
                        <button type="submit" class="filter-btn">Szűrés</button>
                    </div>

                    <a href="{{ route('models') }}" class="clear-btn">Szűrők törlése</a>
                </form>
            </aside>

            <!-- Results -->
            <main class="results">
                <div class="results-header">
                    <div class="results-count">
                        {{ $cars->count() }} modell találat
                    </div>
                </div>

                <div class="car-grid">
                    @forelse($cars as $car)
                    <a href="{{ route('car.show', $car->id) }}" class="car-card" style="text-decoration: none; color: inherit;">
                        <div class="car-image">
                            @if($car->is_electric)
                                <div class="car-badge badge-electric">{{ $types[$car->type] }}</div>
                            @elseif($car->is_amg)
                                <div class="car-badge badge-amg">{{ $types[$car->type] }}</div>
                            @elseif($car->type === 'hybrid')
                                <div class="car-badge badge-hybrid">{{ $types[$car->type] }}</div>
                            @else
                                <div class="car-badge badge-petrol">{{ $types[$car->type] }}</div>
                            @endif
                            
                            @if($car->image)
                                <img src="{{ asset('storage/' . $car->image) }}" 
                                     alt="{{ $car->name }}" 
                                     style="max-width: 180px; max-height: 120px; object-fit: contain;">
                            @else
                                <div style="text-align: center;">
                                    <div class="mb-star" style="margin: 0 auto 0.5rem; opacity: 0.3;"></div>
                                    <p style="color: #9ca3af; font-size: 0.875rem;">{{ $car->model }}</p>
                                </div>
                            @endif
                        </div>
                        
                        <div class="car-content">
                            <h3 class="car-name">{{ $car->name }}</h3>
                            <p class="car-model">{{ $car->model }}</p>
                            <div class="car-price">{{ $car->formatted_price }}</div>
                            
                            <div class="car-actions">
                                <span class="btn btn-primary">Konfigurátor</span>
                                <span class="btn btn-secondary">Részletek</span>
                            </div>
                        </div>
                    </a>
                    @empty
                    <div style="grid-column: 1 / -1; text-align: center; padding: 3rem; color: #6b7280;">
                        <p style="font-size: 1.125rem; margin-bottom: 0.5rem;">Nincs találat</p>
                        <p>Próbálja meg módosítani a szűrő beállításokat</p>
                    </div>
                    @endforelse
                </div>
            </main>
        </div>
    </div>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="footer-content">
                <div>
                    <div style="display: flex; align-items: center; gap: 0.5rem; margin-bottom: 1.5rem;">
                        <div class="mb-star"></div>
                        <span style="font-size: 1.25rem; font-weight: 700;">Mercedes-Benz</span>
                    </div>
                </div>

                <div>
                    <h4>Modellek</h4>
                    <ul>
                        <li><a href="#">Limuzin</a></li>
                        <li><a href="#">SUV</a></li>
                        <li><a href="#">T-Modell</a></li>
                        <li><a href="#">Coupé</a></li>
                    </ul>
                </div>

                <div>
                    <h4>Vásárlás</h4>
                    <ul>
                        <li><a href="#">Konfigurátor</a></li>
                        <li><a href="#">Kereskedők</a></li>
                        <li><a href="#">Próbaút</a></li>
                        <li><a href="#">Finanszírozás</a></li>
                    </ul>
                </div>

                <div>
                    <h4>Szolgáltatások</h4>
                    <ul>
                        <li><a href="#">Szerviz</a></li>
                        <li><a href="#">Alkatrészek</a></li>
                        <li><a href="#">Garancia</a></li>
                        <li><a href="#">Mercedes me</a></li>
                    </ul>
                </div>

                <div>
                    <h4>Cég</h4>
                    <ul>
                        <li><a href="#">Rólunk</a></li>
                        <li><a href="#">Karriér</a></li>
                        <li><a href="#">Sajtó</a></li>
                        <li><a href="#">Kapcsolat</a></li>
                    </ul>
                </div>
            </div>

            <div class="footer-bottom">
                <p style="color: #9ca3af; font-size: 0.875rem;">
                    © {{ date('Y') }} Mercedes-Benz AG. Minden jog fenntartva.
                </p>
                <div class="footer-links">
                    <a href="#">Adatvédelem</a>
                    <a href="#">Jogi nyilatkozat</a>
                    <a href="#">Cookie beállítások</a>
                </div>
            </div>
        </div>
    </footer>

    <script>
        // Auto-submit form on filter change for better UX
        document.querySelectorAll('input[type="checkbox"]').forEach(function(checkbox) {
            checkbox.addEventListener('change', function() {
                document.getElementById('filterForm').submit();
            });
        });
    </script>
</body>
</html>
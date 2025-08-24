<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Rólunk - Mercedes-Benz Magyarország</title>
    
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
            color: #333;
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
            text-decoration: none;
        }
        
        .icon-btn:hover {
            color: #2563eb;
        }
        
        /* Hero Section */
        .hero {
            background: linear-gradient(rgba(0,0,0,0.4), rgba(0,0,0,0.4)), url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMTkyMCIgaGVpZ2h0PSI4MDAiIHZpZXdCb3g9IjAgMCAxOTIwIDgwMCIgZmlsbD0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPGRlZnM+CjxsaW5lYXJHcmFkaWVudCBpZD0iZ3JhZGllbnQiIHgxPSIwJSIgeTE9IjAlIiB4Mj0iMTAwJSIgeTI9IjEwMCUiPgo8c3RvcCBvZmZzZXQ9IjAlIiBzdHlsZT0ic3RvcC1jb2xvcjojMWExYTFhO3N0b3Atb3BhY2l0eToxIiAvPgo8c3RvcCBvZmZzZXQ9IjEwMCUiIHN0eWxlPSJzdG9wLWNvbG9yOiMyNTYzZWI7c3RvcC1vcGFjaXR5OjAuMyIgLz4KPC9saW5lYXJHcmFkaWVudD4KPC9kZWZzPgo8cmVjdCB3aWR0aD0iMTkyMCIgaGVpZ2h0PSI4MDAiIGZpbGw9InVybCgjZ3JhZGllbnQpIi8+Cjwvc3ZnPgo=');
            background-size: cover;
            background-position: center;
            color: white;
            padding: 8rem 0 6rem;
        }
        
        .hero-content {
            text-align: center;
            max-width: 800px;
            margin: 0 auto;
        }
        
        .hero h1 {
            font-size: 3.5rem;
            font-weight: 700;
            margin-bottom: 1.5rem;
            line-height: 1.1;
        }
        
        @media (min-width: 1024px) {
            .hero h1 {
                font-size: 4.5rem;
            }
        }
        
        .hero-subtitle {
            font-size: 1.5rem;
            font-weight: 300;
            margin-bottom: 2rem;
            opacity: 0.9;
        }
        
        .hero-description {
            font-size: 1.125rem;
            line-height: 1.8;
            opacity: 0.9;
        }
        
        /* Section */
        .section {
            padding: 5rem 0;
        }
        
        .section-dark {
            background: #f8fafc;
        }
        
        /* Timeline */
        .timeline {
            position: relative;
        }
        
        .timeline::before {
            content: '';
            position: absolute;
            left: 50%;
            top: 0;
            bottom: 0;
            width: 2px;
            background: #e5e7eb;
            transform: translateX(-50%);
        }
        
        .timeline-item {
            display: flex;
            align-items: center;
            margin-bottom: 4rem;
            position: relative;
        }
        
        .timeline-item:nth-child(odd) {
            flex-direction: row;
        }
        
        .timeline-item:nth-child(even) {
            flex-direction: row-reverse;
        }
        
        .timeline-content {
            flex: 1;
            padding: 0 2rem;
        }
        
        .timeline-image {
            flex: 1;
            padding: 0 2rem;
        }
        
        .timeline-image img {
            width: 100%;
            height: 300px;
            object-fit: cover;
            border-radius: 0.5rem;
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1);
        }
        
        .timeline-year {
            background: #2563eb;
            color: white;
            padding: 0.5rem 1rem;
            border-radius: 2rem;
            font-weight: 700;
            font-size: 0.875rem;
            display: inline-block;
            margin-bottom: 1rem;
        }
        
        .timeline-title {
            font-size: 1.875rem;
            font-weight: 700;
            margin-bottom: 1rem;
            color: #1f2937;
        }
        
        .timeline-description {
            font-size: 1rem;
            color: #6b7280;
            line-height: 1.7;
        }
        
        .timeline-dot {
            position: absolute;
            left: 50%;
            top: 2rem;
            width: 16px;
            height: 16px;
            background: #2563eb;
            border: 4px solid white;
            border-radius: 50%;
            transform: translateX(-50%);
            box-shadow: 0 0 0 4px #e5e7eb;
        }
        
        /* Gallery Grid */
        .gallery-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 1.5rem;
            margin: 3rem 0;
        }
        
        .gallery-item {
            position: relative;
            overflow: hidden;
            border-radius: 0.5rem;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s, box-shadow 0.3s;
        }
        
        .gallery-item:hover {
            transform: translateY(-4px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1);
        }
        
        .gallery-item img {
            width: 100%;
            height: 250px;
            object-fit: cover;
        }
        
        .gallery-overlay {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            background: linear-gradient(transparent, rgba(0,0,0,0.8));
            padding: 2rem 1.5rem 1.5rem;
            color: white;
        }
        
        .gallery-title {
            font-size: 1.125rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
        }
        
        .gallery-description {
            font-size: 0.875rem;
            opacity: 0.9;
        }
        
        /* Stats */
        .stats {
            background: #1f2937;
            color: white;
            padding: 4rem 0;
        }
        
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
            text-align: center;
        }
        
        .stat-item {
            padding: 2rem;
        }
        
        .stat-number {
            font-size: 3rem;
            font-weight: 700;
            color: #2563eb;
            margin-bottom: 0.5rem;
        }
        
        .stat-label {
            font-size: 1.125rem;
            font-weight: 500;
            opacity: 0.9;
        }
        
        /* CTA Section */
        .cta {
            background: linear-gradient(135deg, #2563eb, #1e40af);
            color: white;
            padding: 4rem 0;
            text-align: center;
        }
        
        .cta h2 {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 1rem;
        }
        
        .cta p {
            font-size: 1.25rem;
            margin-bottom: 2rem;
            opacity: 0.9;
        }
        
        .btn {
            display: inline-block;
            padding: 1rem 2rem;
            background: white;
            color: #2563eb;
            text-decoration: none;
            font-weight: 600;
            border-radius: 0.5rem;
            transition: transform 0.3s, box-shadow 0.3s;
        }
        
        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
        }
        
        /* Mobile Responsiveness */
        @media (max-width: 768px) {
            .timeline::before {
                left: 2rem;
            }
            
            .timeline-item {
                flex-direction: column !important;
                text-align: left;
                padding-left: 4rem;
            }
            
            .timeline-item:nth-child(even) {
                flex-direction: column !important;
            }
            
            .timeline-content {
                padding: 0;
                margin-bottom: 2rem;
            }
            
            .timeline-image {
                padding: 0;
            }
            
            .timeline-dot {
                left: 2rem;
                transform: translateX(-50%);
            }
            
            .hero h1 {
                font-size: 2.5rem;
            }
            
            .hero-subtitle {
                font-size: 1.25rem;
            }
            
            .cta h2 {
                font-size: 2rem;
            }
        }
        
        /* Footer */
        .footer {
            background: black;
            color: white;
            padding: 4rem 0;
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
        
        .footer .mb-star {
            background-image: url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjQiIGhlaWdodD0iMjQiIHZpZXdCb3g9IjAgMCAyNCAyNCIgZmlsbD0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPHBhdGggZD0iTTEyIDJMMTQuMDkgOC4yNkwyMiA5TDE2IDEzLjc0TDE4LjE4IDIyTDEyIDE4LjI3TDUuODIgMjJMOCAxMy43NEwyIDlMOS45MSA4LjI2TDEyIDJaIiBmaWxsPSIjRkZGRkZGIi8+Cjwvc3ZnPgo=');
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
                    <a href="{{ route('models') }}">Modellek</a>
                    <a href="{{ route('vasarlas') }}">Vásárlás</a>
                    <a href="{{ route('services') }}">Szolgáltatások</a>
                    <a href="{{ route('about') }}" class="active">Rólunk</a>
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

    <!-- Hero Section -->
    <section class="hero">
        <div class="container">
            <div class="hero-content">
                <h1>{{ $aboutData ? $aboutData->hero_title : 'A Mercedes-Benz története' }}</h1>
                <p class="hero-subtitle">{{ $aboutData ? $aboutData->hero_subtitle : 'Több mint 130 év innováció és kiválóság' }}</p>
                <p class="hero-description">
                    {{ $aboutData ? $aboutData->hero_description : 'A Mercedes-Benz márka története a gépkocsi feltalálásával kezdődött 1886-ban. Azóta folyamatosan formáljuk a mobilitás jövőjét innovatív technológiáinkkal, luxus termékeinkkel és fenntartható megoldásainkkal.' }}
                </p>
            </div>
        </div>
    </section>

    <!-- Timeline Section -->
    <section class="section">
        <div class="container">
            <div class="timeline">
                @if($aboutData && $aboutData->timeline_items)
                    @foreach($aboutData->timeline_items as $item)
                    <div class="timeline-item">
                        <div class="timeline-dot"></div>
                        <div class="timeline-content">
                            <div class="timeline-year">{{ $item['year'] }}</div>
                            <h3 class="timeline-title">{{ $item['title'] }}</h3>
                            <p class="timeline-description">
                                {{ $item['description'] }}
                            </p>
                        </div>
                        <div class="timeline-image">
                            @if($item['image'])
                                <img src="{{ asset('storage/' . $item['image']) }}" alt="{{ $item['title'] }}">
                            @else
                                <img src="data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNTAwIiBoZWlnaHQ9IjMwMCIgdmlld0JveD0iMCAwIDUwMCAzMDAiIGZpbGw9Im5vbmUiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjxyZWN0IHdpZHRoPSI1MDAiIGhlaWdodD0iMzAwIiBmaWxsPSIjZjNmNGY2Ii8+Cjx0ZXh0IHg9IjI1MCIgeT0iMTYwIiB0ZXh0LWFuY2hvcj0ibWlkZGxlIiBmb250LWZhbWlseT0iSW50ZXIiIGZvbnQtc2l6ZT0iMTYiIGZpbGw9IiM2YjcyODAiPnt7ICRpdGVtWyd0aXRsZSddIH19PC90ZXh0Pgo8L3N2Zz4=" alt="{{ $item['title'] }}">
                            @endif
                        </div>
                    </div>
                    @endforeach
                @endif
            </div>
        </div>
    </section>

    <!-- Gallery Section -->
    <section class="section section-dark">
        <div class="container">
            <h2 style="text-align: center; font-size: 2.5rem; font-weight: 700; margin-bottom: 3rem; color: #1f2937;">
                Ikonikus pillanatok
            </h2>
            
            <div class="gallery-grid">
                @if($aboutData && $aboutData->gallery_items)
                    @foreach($aboutData->gallery_items as $item)
                    <div class="gallery-item">
                        @if($item['image'])
                            <img src="{{ asset('storage/' . $item['image']) }}" alt="{{ $item['title'] }}">
                        @else
                            <img src="data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNDAwIiBoZWlnaHQ9IjI1MCIgdmlld0JveD0iMCAwIDQwMCAyNTAiIGZpbGw9Im5vbmUiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjxyZWN0IHdpZHRoPSI0MDAiIGhlaWdodD0iMjUwIiBmaWxsPSIjZjNmNGY2Ii8+Cjx0ZXh0IHg9IjIwMCIgeT0iMTMwIiB0ZXh0LWFuY2hvcj0ibWlkZGxlIiBmb250LWZhbWlseT0iSW50ZXIiIGZvbnQtc2l6ZT0iMTYiIGZpbGw9IiM2YjcyODAiPnt7ICRpdGVtWyd0aXRsZSddIH19PC90ZXh0Pgo8L3N2Zz4=" alt="{{ $item['title'] }}">
                        @endif
                        <div class="gallery-overlay">
                            <h4 class="gallery-title">{{ $item['title'] }}</h4>
                            <p class="gallery-description">{{ $item['description'] }}</p>
                        </div>
                    </div>
                    @endforeach
                @endif
            </div>
        </div>
    </section>

    <!-- Statistics -->
    <section class="stats">
        <div class="container">
            <div class="stats-grid">
                @if($aboutData && $aboutData->statistics)
                    @foreach($aboutData->statistics as $stat)
                    <div class="stat-item">
                        <div class="stat-number">{{ $stat['number'] }}</div>
                        <div class="stat-label">{{ $stat['label'] }}</div>
                    </div>
                    @endforeach
                @endif
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta">
        <div class="container">
            <h2>{{ $aboutData ? $aboutData->cta_title : 'Tapasztalja meg a Mercedes-Benz különlegességét' }}</h2>
            <p>{{ $aboutData ? $aboutData->cta_description : 'Fedezze fel modellkínálatunkat és válassza ki az Önnek leginkább megfelelő Mercedes-Benz-t.' }}</p>
            <a href="{{ $aboutData ? $aboutData->cta_button_link : route('models') }}" class="btn">{{ $aboutData ? $aboutData->cta_button_text : 'Modellek megtekintése' }}</a>
        </div>
    </section>

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
</body>
</html>
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Szolgáltatások - Mercedes-Benz Magyarország</title>
    
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
        
        .nav-menu a, .nav-menu button {
            color: black;
            text-decoration: none;
            font-weight: 500;
            padding: 0.5rem 0.75rem;
            transition: color 0.3s;
            background: none;
            border: none;
            cursor: pointer;
        }
        
        .nav-menu a:hover, .nav-menu a.active, .nav-menu button:hover {
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
            background: linear-gradient(rgba(0,0,0,0.4), rgba(0,0,0,0.4)), url('/images/services-hero.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            color: white;
            padding: 8rem 0 6rem;
            min-height: 100vh;
            display: flex;
            align-items: center;
        }
        
        .hero-content {
            max-width: 600px;
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
            font-size: 1.25rem;
            font-weight: 300;
            margin-bottom: 2rem;
            opacity: 0.9;
        }
        
        .hero-buttons {
            display: flex;
            gap: 1rem;
            flex-wrap: wrap;
        }
        
        .btn {
            display: inline-block;
            padding: 1rem 2rem;
            background: #2563eb;
            color: white;
            text-decoration: none;
            font-weight: 600;
            border-radius: 0.5rem;
            transition: all 0.3s;
            border: 2px solid #2563eb;
        }
        
        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
        }
        
        .btn-outline {
            background: transparent;
            color: white;
            border-color: white;
        }
        
        .btn-outline:hover {
            background: white;
            color: #2563eb;
        }

        /* Section */
        .section {
            padding: 5rem 0;
            opacity: 0;
            transform: translateX(100px);
            transition: all 0.8s ease-out;
        }
        
        .section.animate-in {
            opacity: 1;
            transform: translateX(0);
        }
        
        .section-dark {
            background: #f8fafc;
        }

        .section-title {
            font-size: 2.5rem;
            font-weight: 700;
            text-align: center;
            margin-bottom: 1rem;
            color: #1f2937;
        }

        .section-subtitle {
            font-size: 1.125rem;
            text-align: center;
            color: #6b7280;
            margin-bottom: 3rem;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
        }

        /* Categories Grid */
        .categories-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
            margin: 3rem 0;
        }

        .category-card {
            background: white;
            border-radius: 1rem;
            overflow: hidden;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }

        .category-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1);
        }

        .category-image {
            width: 100%;
            height: 200px;
            background: #f3f4f6;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .category-content {
            padding: 2rem;
        }

        .category-title {
            font-size: 1.5rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
            color: #1f2937;
        }

        .category-description {
            color: #6b7280;
            margin-bottom: 1.5rem;
        }

        .category-link {
            color: #2563eb;
            font-weight: 500;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }

        .category-link:hover {
            text-decoration: underline;
        }

        /* Products Grid */
        .products-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
            margin: 3rem 0;
        }

        .product-card {
            background: white;
            border-radius: 0.5rem;
            overflow: hidden;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }

        .product-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.1);
        }

        .product-image {
            width: 100%;
            height: 180px;
            background: #f8fafc;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .product-content {
            padding: 1.5rem;
        }

        .product-title {
            font-size: 1.125rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
            color: #1f2937;
        }

        .product-description {
            color: #6b7280;
            font-size: 0.875rem;
            margin-bottom: 1rem;
        }

        .product-price {
            font-size: 1.25rem;
            font-weight: 700;
            color: #2563eb;
        }

        /* Info Section */
        .info-section {
            background: linear-gradient(135deg, #1f2937, #374151);
            color: white;
            padding: 4rem 0;
        }

        .info-content {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 4rem;
            align-items: center;
        }

        @media (max-width: 768px) {
            .info-content {
                grid-template-columns: 1fr;
            }
        }

        .info-text h2 {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 1.5rem;
        }

        .info-text p {
            font-size: 1.125rem;
            opacity: 0.9;
            line-height: 1.7;
            margin-bottom: 1rem;
        }

        .info-image {
            width: 100%;
            height: 300px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 1rem;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.125rem;
            opacity: 0.7;
        }

        /* Contact Form */
        .contact-section {
            padding: 5rem 0;
        }

        .contact-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 4rem;
            align-items: start;
        }

        @media (max-width: 768px) {
            .contact-grid {
                grid-template-columns: 1fr;
            }
        }

        .contact-info h2 {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 1.5rem;
            color: #1f2937;
        }

        .contact-info p {
            font-size: 1.125rem;
            color: #6b7280;
            margin-bottom: 2rem;
            line-height: 1.7;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-label {
            display: block;
            font-weight: 500;
            margin-bottom: 0.5rem;
            color: #374151;
        }

        .form-input {
            width: 100%;
            padding: 0.75rem;
            border: 1px solid #d1d5db;
            border-radius: 0.5rem;
            font-size: 1rem;
            transition: border-color 0.3s;
        }

        .form-input:focus {
            outline: none;
            border-color: #2563eb;
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
        }

        .form-textarea {
            resize: vertical;
            min-height: 120px;
        }

        .form-select {
            width: 100%;
            padding: 0.75rem;
            border: 1px solid #d1d5db;
            border-radius: 0.5rem;
            font-size: 1rem;
            background: white;
            cursor: pointer;
        }

        .checkbox-group {
            display: flex;
            align-items: start;
            gap: 0.5rem;
            margin: 1.5rem 0;
        }

        .checkbox-input {
            margin-top: 0.25rem;
        }

        .checkbox-label {
            font-size: 0.875rem;
            color: #6b7280;
            line-height: 1.5;
        }

        .checkbox-label a {
            color: #2563eb;
            text-decoration: none;
        }

        .checkbox-label a:hover {
            text-decoration: underline;
        }

        .form-button {
            background: #2563eb;
            color: white;
            border: none;
            padding: 1rem 2rem;
            border-radius: 0.5rem;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            width: 100%;
        }

        .form-button:hover {
            background: #1d4ed8;
            transform: translateY(-2px);
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
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

        /* Animations */
        @keyframes slideInRight {
            from {
                opacity: 0;
                transform: translateX(100px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        .animate-slide-in {
            animation: slideInRight 0.8s ease-out forwards;
        }

        /* Stagger animation delays */
        .animate-delay-1 { animation-delay: 0.1s; }
        .animate-delay-2 { animation-delay: 0.2s; }
        .animate-delay-3 { animation-delay: 0.3s; }
        .animate-delay-4 { animation-delay: 0.4s; }
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
                    <a href="{{ route('services') }}" class="active">Szolgáltatások</a>
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

    <!-- Hero Section -->
    <section class="hero">
        <div class="container">
            <div class="hero-content">
                <h1>Utazzon biztosan!</h1>
                <p class="hero-subtitle">
                    Fedezze fel exkluzív kiegészítőink világát, amelyek minden utazást különlegessé tesznek. 
                    Prémium minőség, tökéletes illeszkedés és innovatív megoldások.
                </p>
                <div class="hero-buttons">
                    <a href="#categories" class="btn">Kiegészítők</a>
                    <a href="#contact" class="btn btn-outline">Kapcsolat</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Categories Section -->
    <section class="section" id="categories">
        <div class="container">
            <h2 class="section-title">Kiegészítők</h2>
            <p class="section-subtitle">
                Válasszon széles kiegészítő kínálatunkból, hogy Mercedes-Benz járművét még személyesebbé tegye
            </p>
            
            <div class="categories-grid">
                <div class="category-card">
                    <div class="category-image">
                        <svg width="80" height="80" viewBox="0 0 100 100" fill="none">
                            <circle cx="50" cy="30" r="15" fill="#374151"/>
                            <rect x="35" y="45" width="30" height="40" rx="5" fill="#6b7280"/>
                            <circle cx="45" cy="55" r="3" fill="#9ca3af"/>
                            <circle cx="55" cy="65" r="3" fill="#9ca3af"/>
                        </svg>
                    </div>
                    <div class="category-content">
                        <h3 class="category-title">Kulcstartók</h3>
                        <p class="category-description">
                            Exkluzív Mercedes-Benz kulcstartók prémium anyagokból készítve
                        </p>
                        <a href="#" class="category-link">
                            Részletek 
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                            </svg>
                        </a>
                    </div>
                </div>

                <div class="category-card">
                    <div class="category-image">
                        <svg width="80" height="80" viewBox="0 0 100 100" fill="none">
                            <rect x="20" y="40" width="60" height="30" rx="5" fill="#374151"/>
                            <circle cx="30" cy="75" r="8" fill="#1f2937"/>
                            <circle cx="70" cy="75" r="8" fill="#1f2937"/>
                            <rect x="25" y="35" width="50" height="5" fill="#6b7280"/>
                        </svg>
                    </div>
                    <div class="category-content">
                        <h3 class="category-title">Praktikus tárgyak</h3>
                        <p class="category-description">
                            Mindennapi használatra tervezett praktikus kiegészítők
                        </p>
                        <a href="#" class="category-link">
                            Részletek 
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Products Section -->
    <section class="section section-dark" id="products">
        <div class="container">
            <h2 class="section-title">Praktikus kiegészítők</h2>
            <p class="section-subtitle">
                Kiváló minőségű termékek, amelyek tökéletesen illeszkednek Mercedes-Benz járművéhez
            </p>
            
            <div class="products-grid">
                <div class="product-card">
                    <div class="product-image">
                        <svg width="60" height="60" viewBox="0 0 80 80" fill="none">
                            <rect x="20" y="30" width="40" height="25" rx="3" fill="#1f2937"/>
                            <rect x="25" y="35" width="30" height="15" fill="#374151"/>
                            <circle cx="30" cy="45" r="2" fill="#9ca3af"/>
                        </svg>
                    </div>
                    <div class="product-content">
                        <h3 class="product-title">Mercedes-Benz Slim Powerbank 5000 mAh</h3>
                        <p class="product-description">
                            Kompakt és elegáns powerbank exkluzív Mercedes-Benz dizájnnal
                        </p>
                        <div class="product-price">15 900 Ft</div>
                    </div>
                </div>

                <div class="product-card">
                    <div class="product-image">
                        <svg width="60" height="60" viewBox="0 0 80 80" fill="none">
                            <rect x="15" y="25" width="50" height="30" rx="5" fill="#1f2937"/>
                            <rect x="20" y="30" width="40" height="20" fill="#374151"/>
                            <circle cx="25" cy="40" r="3" fill="#9ca3af"/>
                            <rect x="35" y="37" width="20" height="6" fill="#9ca3af"/>
                        </svg>
                    </div>
                    <div class="product-content">
                        <h3 class="product-title">Mercedes-Benz Wireless Charger 15W</h3>
                        <p class="product-description">
                            Vezeték nélküli töltő gyors töltési technológiával
                        </p>
                        <div class="product-price">22 500 Ft</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Info Section -->
    <section class="section info-section">
        <div class="container">
            <div class="info-content">
                <div class="info-text">
                    <h2>Segítségen van szüksége a megfelelő tartalom kiválasztásához?</h2>
                    <p>
                        Tapasztalt szakértőink készséggel állnak rendelkezésére, hogy segítsenek megtalálni 
                        az Ön igényeinek legmegfelelőbb kiegészítőket.
                    </p>
                    <p>
                        Minden Mercedes-Benz kiegészítő a legmagasabb minőségi követelményeknek megfelelően 
                        készül, garantálva a tökéletes illeszkedést és hosszú élettartamot.
                    </p>
                </div>
                <div class="info-image">
                    <svg width="200" height="150" viewBox="0 0 200 150" fill="none">
                        <rect x="40" y="40" width="120" height="70" rx="10" fill="rgba(255,255,255,0.2)"/>
                        <circle cx="70" cy="60" r="8" fill="rgba(255,255,255,0.3)"/>
                        <rect x="85" y="55" width="60" height="10" rx="5" fill="rgba(255,255,255,0.3)"/>
                        <rect x="85" y="75" width="40" height="8" rx="4" fill="rgba(255,255,255,0.2)"/>
                        <circle cx="130" cy="90" r="6" fill="rgba(255,255,255,0.3)"/>
                        <text x="100" y="130" text-anchor="middle" fill="rgba(255,255,255,0.5)" font-size="12">Tanácsadás</text>
                    </svg>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section class="section contact-section" id="contact">
        <div class="container">
            <div class="contact-grid">
                <div class="contact-info">
                    <h2>Segítségre van szüksége vagy kérdése van a megfelelő tartalom kiválasztásához? Kérjen ajánlatot!</h2>
                    <p>
                        Töltse ki az alábbi űrlapot és szakértő kollégáink hamarosan felveszik Önnel a kapcsolatot. 
                        Válassza ki a közelében lévő üzletet a leggyorsabb kiszolgálás érdekében.
                    </p>
                </div>

                <div class="contact-form">
                    <form>
                        <div class="form-group">
                            <label class="form-label">Keresztnév *</label>
                            <input type="text" class="form-input" required>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Vezetéknév *</label>
                            <input type="text" class="form-input" required>
                        </div>

                        <div class="form-group">
                            <label class="form-label">E-mail cím *</label>
                            <input type="email" class="form-input" required>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Telefonszám</label>
                            <input type="tel" class="form-input">
                        </div>

                        <div class="form-group">
                            <label class="form-label">Üzlet választása *</label>
                            <select class="form-select" required>
                                <option value="">Válasszon üzletet</option>
                                <option value="budapest-18">Budapest, 18. kerületi üzlet</option>
                                <option value="budapest-3">Budapest, 3. kerület</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Üzenet</label>
                            <textarea class="form-input form-textarea" placeholder="Itt írhatja le kérdését vagy különleges igényeit..."></textarea>
                        </div>

                        <div class="checkbox-group">
                            <input type="checkbox" id="privacy" class="checkbox-input" required>
                            <label for="privacy" class="checkbox-label">
                                A megadott adatok kezelését elfogadom. További információk az 
                                <a href="#">adatvédelmi tájékoztatóban</a>.
                            </label>
                        </div>

                        <div class="checkbox-group">
                            <input type="checkbox" id="newsletter" class="checkbox-input">
                            <label for="newsletter" class="checkbox-label">
                                Szeretnék értesítést kapni a legújabb kiegészítőkről és akciókról.
                            </label>
                        </div>

                        <button type="submit" class="form-button">
                            Küldés
                        </button>
                    </form>
                </div>
            </div>
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

    <script>
        // Intersection Observer for scroll animations
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -100px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('animate-in');
                    
                    // Add staggered animation for cards
                    const cards = entry.target.querySelectorAll('.category-card, .product-card');
                    cards.forEach((card, index) => {
                        setTimeout(() => {
                            card.style.opacity = '0';
                            card.style.transform = 'translateX(100px)';
                            card.style.animation = `slideInRight 0.8s ease-out ${index * 0.1}s forwards`;
                        }, index * 100);
                    });
                }
            });
        }, observerOptions);

        // Observe all sections
        document.querySelectorAll('.section').forEach(section => {
            observer.observe(section);
        });

        // Smooth scroll for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });
    </script>
</body>
</html>
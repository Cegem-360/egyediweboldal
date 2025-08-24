<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mercedes-Benz Magyarország</title>
    
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
        
        .nav-menu button {
            background: none;
            border: none;
            color: black;
            font-weight: 500;
            padding: 0.5rem 0.75rem;
            cursor: pointer;
            transition: color 0.3s;
        }
        
        .nav-menu button:hover {
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
        
        /* Hero */
        .hero {
            background: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('/images/hero-mercedes-amg.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            color: white;
            min-height: 100vh;
            display: flex;
            align-items: center;
        }
        
        .hero-content {
            max-width: 50rem;
        }
        
        .hero h1 {
            font-size: 3.5rem;
            font-weight: 700;
            line-height: 1.1;
            margin-bottom: 1.5rem;
        }
        
        @media (min-width: 1024px) {
            .hero h1 {
                font-size: 4rem;
            }
        }
        
        .hero p {
            font-size: 1.25rem;
            color: #d1d5db;
            margin-bottom: 2rem;
        }
        
        .hero-buttons {
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }
        
        @media (min-width: 640px) {
            .hero-buttons {
                flex-direction: row;
            }
        }
        
        .btn {
            padding: 0.75rem 2rem;
            border-radius: 0.375rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            text-align: center;
            text-decoration: none;
            display: inline-block;
        }
        
        .btn-primary {
            background: #2563eb;
            color: white;
            border: none;
        }
        
        .btn-primary:hover {
            background: #1d4ed8;
        }
        
        .btn-outline {
            background: transparent;
            color: white;
            border: 1px solid white;
        }
        
        .btn-outline:hover {
            background: white;
            color: black;
        }
        
        /* Sections */
        .section {
            padding: 4rem 0;
        }
        
        .section-title {
            font-size: 1.875rem;
            font-weight: 700;
            text-align: center;
            margin-bottom: 3rem;
        }
        
        /* Grid */
        .grid {
            display: grid;
            gap: 1.5rem;
        }
        
        .grid-cols-1 {
            grid-template-columns: repeat(1, minmax(0, 1fr));
        }
        
        @media (min-width: 768px) {
            .grid-md-2 {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }
        }
        
        @media (min-width: 1024px) {
            .grid-lg-3 {
                grid-template-columns: repeat(3, minmax(0, 1fr));
            }
            
            .grid-lg-4 {
                grid-template-columns: repeat(4, minmax(0, 1fr));
            }
            
            .grid-lg-5 {
                grid-template-columns: repeat(5, minmax(0, 1fr));
            }
        }
        
        /* Cards */
        .card {
            background: white;
            border-radius: 0.5rem;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            transition: box-shadow 0.3s;
        }
        
        .card:hover {
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1);
        }
        
        .card-image {
            height: 16rem;
            background: linear-gradient(135deg, #f3f4f6, #e5e7eb);
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
        }
        
        .card-content {
            padding: 1.5rem;
        }
        
        .card-title {
            font-size: 1.25rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
        }
        
        .card-price {
            color: #6b7280;
            font-size: 0.875rem;
            margin-bottom: 1rem;
        }
        
        .card-actions {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .btn-sm {
            padding: 0.5rem 1rem;
            font-size: 0.875rem;
        }
        
        .btn-text {
            background: none;
            border: none;
            color: #2563eb;
            font-weight: 600;
            cursor: pointer;
            font-size: 0.875rem;
        }
        
        .btn-text:hover {
            color: #1e40af;
        }
        
        /* Badge */
        .badge {
            position: absolute;
            top: 1rem;
            left: 1rem;
            padding: 0.25rem 0.5rem;
            border-radius: 0.25rem;
            font-size: 0.75rem;
            font-weight: 600;
        }
        
        .badge-green {
            background: #10b981;
            color: white;
        }
        
        .badge-red {
            background: #ef4444;
            color: white;
        }
        
        /* Category cards */
        .category-card {
            background: white;
            padding: 2rem;
            border-radius: 0.5rem;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        
        .category-card .mb-star {
            margin: 0 auto 1rem;
            opacity: 0.6;
        }
        
        /* Service cards */
        .service-card {
            padding: 2rem;
            border-radius: 0.5rem;
            color: white;
        }
        
        .service-blue {
            background: linear-gradient(135deg, #2563eb, #1e40af);
        }
        
        .service-gray {
            background: linear-gradient(135deg, #374151, #111827);
        }
        
        .service-card h3 {
            font-size: 1.25rem;
            font-weight: 700;
            margin-bottom: 1rem;
        }
        
        .service-card p {
            margin-bottom: 1.5rem;
        }
        
        /* Newsletter */
        .newsletter {
            background: #2563eb;
            color: white;
            text-align: center;
        }
        
        .newsletter-form {
            display: flex;
            flex-direction: column;
            gap: 1rem;
            max-width: 28rem;
            margin: 0 auto;
        }
        
        @media (min-width: 640px) {
            .newsletter-form {
                flex-direction: row;
            }
        }
        
        .newsletter input {
            flex: 1;
            padding: 0.75rem 1rem;
            border-radius: 0.375rem;
            border: none;
            color: black;
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
        
        /* Utilities */
        .text-center { text-align: center; }
        .text-gray-600 { color: #4b5563; }
        .text-gray-400 { color: #9ca3af; }
        .bg-gray-50 { background: #f9fafb; }
        .bg-white { background: white; }
        .mb-4 { margin-bottom: 1rem; }
        .mb-12 { margin-bottom: 3rem; }
        .opacity-50 { opacity: 0.5; }
        .opacity-60 { opacity: 0.6; }
        
        /* Star variations for footer */
        .footer .mb-star {
            background-image: url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjQiIGhlaWdodD0iMjQiIHZpZXdCb3g9IjAgMCAyNCAyNCIgZmlsbD0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPHBhdGggZD0iTTEyIDJMMTQuMDkgOC4yNkwyMiA5TDE2IDEzLjc0TDE4LjE4IDIyTDEyIDE4LjI3TDUuODIgMjJMOCAxMy43NEwyIDlMOS45MSA4LjI2TDEyIDJaIiBmaWxsPSIjRkZGRkZGIi8+Cjwvc3ZnPgo=');
        }

        /* Newsletter Popup */
        .newsletter-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 1000;
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
        }

        .newsletter-overlay.show {
            opacity: 1;
            visibility: visible;
        }

        .newsletter-popup {
            background: white;
            border-radius: 1rem;
            max-width: 450px;
            width: 90%;
            max-height: 70vh;
            overflow: hidden;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
            transform: scale(0.9) translateY(20px);
            transition: all 0.3s ease;
        }

        .newsletter-overlay.show .newsletter-popup {
            transform: scale(1) translateY(0);
        }

        .popup-header {
            background: linear-gradient(135deg, #2563eb, #1d4ed8);
            color: white;
            padding: 1rem 1.5rem;
            text-align: center;
            position: relative;
        }

        .popup-close {
            position: absolute;
            top: 1rem;
            right: 1rem;
            background: none;
            border: none;
            color: white;
            font-size: 1.5rem;
            cursor: pointer;
            width: 2rem;
            height: 2rem;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            transition: background-color 0.3s;
        }

        .popup-close:hover {
            background: rgba(255, 255, 255, 0.2);
        }

        .popup-icon {
            width: 40px;
            height: 40px;
            margin: 0 auto 0.5rem;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .popup-title {
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 0.25rem;
        }

        .popup-subtitle {
            font-size: 0.9rem;
            opacity: 0.9;
        }

        .popup-body {
            padding: 1rem 1.5rem 1.5rem;
        }

        .popup-offer {
            background: #fef3c7;
            border: 2px solid #f59e0b;
            border-radius: 0.5rem;
            padding: 1rem;
            text-align: center;
            margin-bottom: 1.5rem;
        }

        .popup-discount {
            font-size: 1.75rem;
            font-weight: 800;
            color: #d97706;
            margin-bottom: 0.25rem;
        }

        .popup-offer-text {
            color: #92400e;
            font-weight: 500;
        }

        .popup-description {
            text-align: center;
            color: #6b7280;
            margin-bottom: 1.25rem;
            line-height: 1.4;
            font-size: 0.85rem;
        }

        .popup-form {
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }

        .popup-form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1rem;
        }

        @media (max-width: 640px) {
            .popup-form-row {
                grid-template-columns: 1fr;
            }
        }

        .popup-form-group {
            display: flex;
            flex-direction: column;
        }

        .popup-form-label {
            font-weight: 500;
            margin-bottom: 0.5rem;
            color: #374151;
        }

        .popup-form-input {
            padding: 0.75rem;
            border: 2px solid #e5e7eb;
            border-radius: 0.5rem;
            font-size: 1rem;
            transition: border-color 0.3s;
        }

        .popup-form-input:focus {
            outline: none;
            border-color: #2563eb;
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
        }

        .popup-checkbox {
            display: flex;
            align-items: start;
            gap: 0.75rem;
            margin: 1rem 0;
        }

        .popup-checkbox input {
            margin-top: 0.25rem;
        }

        .popup-checkbox label {
            font-size: 0.875rem;
            color: #6b7280;
            line-height: 1.5;
        }

        .popup-checkbox a {
            color: #2563eb;
            text-decoration: none;
        }

        .popup-checkbox a:hover {
            text-decoration: underline;
        }

        .popup-submit {
            background: linear-gradient(135deg, #2563eb, #1d4ed8);
            color: white;
            border: none;
            padding: 1rem 2rem;
            border-radius: 0.5rem;
            font-size: 1.125rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            margin-top: 0.5rem;
        }

        .popup-submit:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
        }

        .popup-benefits {
            margin-top: 1.5rem;
            padding-top: 1rem;
            border-top: 1px solid #e5e7eb;
        }

        .popup-benefits-title {
            font-weight: 600;
            margin-bottom: 0.75rem;
            color: #374151;
            font-size: 0.9rem;
        }

        .popup-benefits-list {
            list-style: none;
            display: grid;
            gap: 0.5rem;
        }

        .popup-benefits-item {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            color: #6b7280;
            font-size: 0.875rem;
        }

        .popup-benefits-icon {
            width: 16px;
            height: 16px;
            color: #10b981;
        }
    </style>
</head>

<body>
    <!-- Header -->
    <header class="header">
        <div class="container">
            <nav class="nav">
                <!-- Logo -->
                <div class="logo">
                    <div class="mb-star"></div>
                    <span>Mercedes-Benz</span>
                </div>
                
                <!-- Navigation -->
                <div class="nav-menu">
                    <a href="{{ route('models') }}" style="background: none; border: none; color: black; font-weight: 500; padding: 0.5rem 0.75rem; cursor: pointer; transition: color 0.3s; text-decoration: none;">Modellek</a>
                    <a href="{{ route('vasarlas') }}" style="background: none; border: none; color: black; font-weight: 500; padding: 0.5rem 0.75rem; cursor: pointer; transition: color 0.3s; text-decoration: none;">Vásárlás</a>
                    <a href="{{ route('services') }}" style="background: none; border: none; color: black; font-weight: 500; padding: 0.5rem 0.75rem; cursor: pointer; transition: color 0.3s; text-decoration: none;">Szolgáltatások</a>
                    <a href="{{ route('about') }}" style="background: none; border: none; color: black; font-weight: 500; padding: 0.5rem 0.75rem; cursor: pointer; transition: color 0.3s; text-decoration: none;">Rólunk</a>
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
                                <a href="{{ route('profile.index') }}" class="btn-text" style="color: #00adef; font-weight: 600;">{{ Auth::user()->name }}</a>
                                <form method="POST" action="{{ route('logout') }}" style="margin: 0;">
                                    @csrf
                                    <button type="submit" class="btn-text" style="background: none; border: none; color: #666; cursor: pointer;">Kilépés</button>
                                </form>
                            </div>
                        @else
                            <a href="{{ route('login') }}" class="btn-text">Bejelentkezés</a>
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
                <h1>Az új elektromos EQA</h1>
                <p>EV-technológia egyedülálló vezető tapasztalattal</p>
                <div class="hero-buttons">
                    <button class="btn btn-primary">További információk</button>
                    <button class="btn btn-outline">Konfigurátor</button>
                </div>
            </div>
        </div>
    </section>

    <!-- Vehicle Cards -->
    <section class="section bg-white">
        <div class="container">
            <div class="grid grid-cols-1 grid-md-2 grid-lg-3">
                @foreach($featuredCars as $car)
                <a href="{{ route('car.show', $car->id) }}" class="card" style="text-decoration: none; color: inherit;">
                    <div class="card-image">
                        @if($car->is_electric)
                            <div class="badge badge-green">{{ \App\Models\Car::TYPES[$car->type] }}</div>
                        @elseif($car->is_amg)
                            <div class="badge badge-red">{{ \App\Models\Car::TYPES[$car->type] }}</div>
                        @else
                            <div class="badge" style="background: #6b7280; color: white;">{{ \App\Models\Car::TYPES[$car->type] }}</div>
                        @endif
                        <div style="text-align: center;">
                            @if($car->image)
                                <img src="{{ asset('storage/' . $car->image) }}" alt="{{ $car->name }}" style="max-width: 100px; max-height: 60px; margin: 0 auto 0.5rem; object-fit: contain;">
                                {{-- Debug: {{ $car->image }} --}}
                            @else
                                <div class="mb-star opacity-50" style="margin: 0 auto 0.5rem;"></div>
                            @endif
                            <p style="color: #6b7280; font-weight: 600;">{{ $car->model }}</p>
                        </div>
                    </div>
                    <div class="card-content">
                        <h3 class="card-title">{{ $car->name }}</h3>
                        <p class="card-price">{{ $car->formatted_price }}*</p>
                        <div class="card-actions">
                            <span class="btn btn-primary btn-sm">Konfigurátor</span>
                            <span class="btn-text">További információk</span>
                        </div>
                    </div>
                </a>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Model Categories -->
    <section class="section bg-gray-50">
        <div class="container">
            <h2 class="section-title">Ismerje meg a különböző Mercedes kategóriákat</h2>
            <div class="grid grid-cols-1 grid-md-2 grid-lg-4">
                @foreach($categories as $key => $category)
                <div class="text-center">
                    <div class="category-card">
                        <div class="mb-star"></div>
                        <p style="font-weight: 600; color: #374151;">{{ $category }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Services -->
    <section class="section bg-white">
        <div class="container">
            <h2 class="section-title">Szolgáltatások és innovációk</h2>
            <div class="grid grid-cols-1 grid-md-2">
                <div class="service-card service-blue">
                    <h3>Mercedes me connect</h3>
                    <p>Digitális szolgáltatások és csatlakoztatott megoldások</p>
                    <button class="btn" style="background: white; color: #2563eb;">További információk</button>
                </div>
                
                <div class="service-card service-gray">
                    <h3>Mercedes-Benz Bank</h3>
                    <p>Finanszírozási és biztosítási megoldások</p>
                    <button class="btn" style="background: white; color: #374151;">További információk</button>
                </div>
            </div>
        </div>
    </section>

    <!-- Newsletter -->
    <section class="section newsletter">
        <div class="container">
            <h2 style="font-size: 2.25rem; font-weight: 700; margin-bottom: 1rem;">Mercedes-Benz Hírlevelünk</h2>
            <p style="font-size: 1.25rem; margin-bottom: 2rem;">Legyen az első, aki értesül az újdonságokról</p>
            <div class="newsletter-form">
                <input type="email" placeholder="E-mail cím">
                <button class="btn" style="background: white; color: #2563eb;">Feliratkozás</button>
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

    <!-- Newsletter Popup -->
    <div id="newsletterOverlay" class="newsletter-overlay">
        <div class="newsletter-popup">
            <div class="popup-header">
                <button class="popup-close" onclick="closeNewsletterPopup()">
                    <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
                
                <div class="popup-icon">
                    <svg width="24" height="24" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                    </svg>
                </div>
                
                <h2 class="popup-title">Exkluzív ajánlatok</h2>
                <p class="popup-subtitle">Iratkozzon fel hírlevelünkre!</p>
            </div>
            
            <div class="popup-body">
                <div class="popup-offer">
                    <div class="popup-discount">15% KEDVEZMÉNY</div>
                    <p class="popup-offer-text">az első vásárlására</p>
                </div>
                
                <p class="popup-description">
                    Első értesítés új modellekről és exkluzív akciókról. 
                    Feliratkozás után azonnal megkapja a 15%-os kedvezménykódot!
                </p>
                
                <form class="popup-form" onsubmit="submitNewsletter(event)">
                    <div class="popup-form-group">
                        <label class="popup-form-label">Teljes név *</label>
                        <input type="text" class="popup-form-input" name="fullName" placeholder="Például: Nagy János" required>
                    </div>
                    
                    <div class="popup-form-group">
                        <label class="popup-form-label">E-mail cím *</label>
                        <input type="email" class="popup-form-input" name="email" placeholder="pelda@email.com" required>
                    </div>
                    
                    <div class="popup-checkbox">
                        <input type="checkbox" id="newsletter-privacy" required>
                        <label for="newsletter-privacy">
                            Elfogadom az <a href="#" target="_blank">adatvédelmi tájékoztatót</a> 
                            és hozzájárulok, hogy a Mercedes-Benz marketing célból kapcsolatba lépjen velem.
                        </label>
                    </div>
                    
                    <button type="submit" class="popup-submit">
                        Feliratkozás és 15% kedvezmény megszerzése
                    </button>
                </form>
                
                <div class="popup-benefits">
                    <p class="popup-benefits-title">Mit kap a feliratkozással:</p>
                    <ul class="popup-benefits-list">
                        <li class="popup-benefits-item">
                            <svg class="popup-benefits-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            Exkluzív 15% kedvezmény az első vásárlásra
                        </li>
                        <li class="popup-benefits-item">
                            <svg class="popup-benefits-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            Első értesítés az új modellekről
                        </li>
                        <li class="popup-benefits-item">
                            <svg class="popup-benefits-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            Különleges akciók és ajánlatok
                        </li>
                        <li class="popup-benefits-item">
                            <svg class="popup-benefits-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            VIP események meghívói
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Newsletter Popup Functionality
        function showNewsletterPopup() {
            const overlay = document.getElementById('newsletterOverlay');
            overlay.classList.add('show');
            document.body.style.overflow = 'hidden';
        }

        function closeNewsletterPopup() {
            const overlay = document.getElementById('newsletterOverlay');
            overlay.classList.remove('show');
            document.body.style.overflow = 'auto';
            
            // Set cookie to remember user closed popup
            document.cookie = 'newsletter_popup_closed=true; path=/; max-age=' + (24 * 60 * 60); // 24 hours
        }

        function submitNewsletter(event) {
            event.preventDefault();
            
            const formData = new FormData(event.target);
            const data = {
                fullName: formData.get('fullName'),
                email: formData.get('email')
            };
            
            // Simulate successful signup
            alert('Köszönjük a feliratkozást! Hamarosan megkapja a 15%-os kedvezménykódot e-mailben.');
            closeNewsletterPopup();
            
            // Set cookie to not show popup again for this user
            document.cookie = 'newsletter_subscribed=true; path=/; max-age=' + (365 * 24 * 60 * 60); // 1 year
        }

        function getCookie(name) {
            const value = `; ${document.cookie}`;
            const parts = value.split(`; ${name}=`);
            if (parts.length === 2) return parts.pop().split(';').shift();
            return null;
        }

        // Show popup when page loads (every time on homepage)
        window.addEventListener('load', function() {
            // Always show popup after 2 seconds on homepage
            setTimeout(showNewsletterPopup, 2000);
        });

        // Close popup when clicking outside
        document.addEventListener('click', function(event) {
            const overlay = document.getElementById('newsletterOverlay');
            if (event.target === overlay) {
                closeNewsletterPopup();
            }
        });

        // Close popup with Escape key
        document.addEventListener('keydown', function(event) {
            if (event.key === 'Escape') {
                const overlay = document.getElementById('newsletterOverlay');
                if (overlay.classList.contains('show')) {
                    closeNewsletterPopup();
                }
            }
        });
    </script>
</body>
</html>
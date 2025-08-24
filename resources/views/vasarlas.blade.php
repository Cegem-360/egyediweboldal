<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Vásárlás - Mercedes-Benz Magyarország</title>
    
    <link rel="icon" href="/favicon.ico" sizes="any">
    <link rel="icon" href="/favicon.svg" type="image/svg+xml">
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:300,400,500,600,700" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&family=Volkhov:wght@400;700&family=Open+Sans:wght@400;600&family=Google+Sans:wght@400;500&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        'poppins': ['Poppins', 'sans-serif'],
                        'volkhov': ['Volkhov', 'serif'],
                        'open-sans': ['Open Sans', 'sans-serif'],
                        'google-sans': ['Google Sans', 'sans-serif'],
                    },
                    backgroundImage: {
                        'linear-126': 'linear-gradient(126deg, var(--tw-gradient-stops))',
                        'conic-180': 'conic-gradient(from 180deg, var(--tw-gradient-stops))',
                    }
                }
            }
        }
    </script>
    
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
            background: none;
            border: none;
            color: black;
            font-weight: 500;
            padding: 0.5rem 0.75rem;
            cursor: pointer;
            transition: color 0.3s;
            text-decoration: none;
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
            border-radius: 0.375rem;
            transition: background-color 0.3s;
            text-decoration: none;
        }
        
        .icon-btn:hover {
            background: #f3f4f6;
        }

        /* Carousel Animation */
        @keyframes slideInfinite {
            0% {
                transform: translateX(0);
            }
            100% {
                transform: translateX(-100%);
            }
        }

        .animate-slide-infinite {
            animation: slideInfinite 20s linear infinite;
        }

        .animate-slide-infinite:hover {
            animation-play-state: paused;
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
                    <a href="{{ route('vasarlas') }}" class="active">Vásárlás</a>
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
                                <a href="{{ route('profile.index') }}" class="btn-text" style="color: #00adef; font-weight: 600; text-decoration: none;">{{ Auth::user()->name }}</a>
                                <form method="POST" action="{{ route('logout') }}" style="margin: 0;">
                                    @csrf
                                    <button type="submit" style="background: none; border: none; color: #6b7280; font-weight: 500; cursor: pointer;">Kilépés</button>
                                </form>
                            </div>
                        @else
                            <a href="{{ route('login') }}" style="color: #00adef; font-weight: 600; text-decoration: none;">Bejelentkezés</a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" style="background: #00adef; color: white; padding: 0.5rem 1rem; border-radius: 0.375rem; font-weight: 600; text-decoration: none;">Regisztráció</a>
                            @endif
                        @endauth
                    @endif
                </div>
            </nav>
        </div>
    </header>

    <!-- Main Content -->
    <div class="w-full relative bg-white overflow-x-auto">
        <div class="w-[1440px] h-[4774px] relative bg-white overflow-hidden mx-auto">
            <!-- Background Elements -->
            <div class="w-[478.94px] h-[496.86px] left-[1803.94px] top-[5053.86px] absolute opacity-80 bg-purple-300 rounded-full blur-3xl"></div>
            <div class="w-10 h-10 left-[1170px] top-[4443px] absolute bg-white shadow-[0px_2px_10px_0px_rgba(0,0,0,0.10)]"></div>
            <div class="w-4 h-3 left-[1182px] top-[4457px] absolute bg-zinc-950"></div>
            <div class="w-10 h-10 left-[1034px] top-[4441px] absolute bg-white shadow-[0px_2px_10px_0px_rgba(0,0,0,0.10)]"></div>
            <div class="w-1.5 h-3 left-[1051.57px] top-[4457px] absolute bg-zinc-950"></div>
            <div class="w-11 h-11 left-[1100px] top-[4441px] absolute bg-gradient-conic from-blue-200 via-pink-400 via-60 to-white/0 shadow-[0px_2px_10px_0px_rgba(0,0,0,0.10)]"></div>
            
            <!-- Instagram Icon -->
            <div class="w-4 h-4 left-[1115px] top-[4455px] absolute overflow-hidden">
                <div class="w-4 h-4 left-0 top-0 absolute bg-white"></div>
                <div class="w-0.5 h-0.5 left-[12.22px] top-[1.91px] absolute bg-white"></div>
                <div class="w-2 h-2 left-[3.78px] top-[3.78px] absolute bg-white"></div>
            </div>
            
            <!-- Footer Content -->
            <div class="left-[1034px] top-[4512px] absolute text-gray-500 text-xl font-normal font-poppins leading-normal tracking-tight">Discover our app</div>
            
            <!-- App Store Buttons -->
            <div class="w-28 h-9 left-[1032px] top-[4553px] absolute bg-zinc-950 rounded-2xl"></div>
            <div class="w-5 h-5 left-[1049px] top-[4560px] absolute overflow-hidden">
                <div class="w-2.5 h-5 left-[0.72px] top-[0.33px] absolute bg-sky-500"></div>
                <div class="w-3.5 h-2.5 left-[1.46px] top-0 absolute bg-green-500"></div>
                <div class="w-2 h-1.5 left-[11.51px] top-[6.62px] absolute bg-amber-400"></div>
                <div class="w-3.5 h-2.5 left-[1.46px] top-[10px] absolute bg-orange-600"></div>
            </div>
            <div class="w-14 h-3.5 left-[1074.24px] top-[4562.29px] absolute bg-white"></div>
            
            <div class="w-24 h-9 left-[1146px] top-[4553px] absolute bg-zinc-950 rounded-2xl"></div>
            <div class="w-3.5 h-3 left-[1163.44px] top-[4564.69px] absolute bg-white"></div>
            <div class="w-[3.01px] h-1 left-[1169.97px] top-[4561px] absolute bg-white"></div>
            <div class="w-14 h-4 left-[1182px] top-[4561.62px] absolute bg-white"></div>
            
            <!-- Company Info -->
            <div class="left-[186px] top-[4420px] absolute text-indigo-950 text-5xl font-normal font-poppins">Jadoo.</div>
            <div class="left-[186px] top-[4505px] absolute text-gray-500 text-xs font-normal font-poppins leading-none">Book your trip in minute, get full<br/>Control for much longer.</div>
            
            <!-- Footer Links -->
            <div class="left-[476px] top-[4441px] absolute text-zinc-950 text-xl font-bold font-poppins leading-relaxed">Company</div>
            <div class="left-[476px] top-[4501px] absolute text-gray-500 text-lg font-normal font-poppins leading-snug">About</div>
            <div class="left-[476px] top-[4535px] absolute text-gray-500 text-lg font-normal font-poppins leading-snug">Careers</div>
            <div class="left-[476px] top-[4570px] absolute text-gray-500 text-lg font-normal font-poppins leading-snug">Mobile</div>
            
            <div class="left-[657px] top-[4441px] absolute text-zinc-950 text-xl font-bold font-poppins leading-relaxed">Contact</div>
            <div class="left-[656px] top-[4499px] absolute text-gray-500 text-lg font-normal font-poppins leading-snug">Help/FAQ</div>
            <div class="left-[656px] top-[4535px] absolute text-gray-500 text-lg font-normal font-poppins leading-snug">Press</div>
            <div class="left-[656px] top-[4570px] absolute text-gray-500 text-lg font-normal font-poppins leading-snug">Affilates</div>
            
            <div class="left-[836px] top-[4441px] absolute text-zinc-950 text-xl font-bold font-poppins leading-relaxed">More</div>
            <div class="left-[836px] top-[4501px] absolute text-gray-500 text-lg font-normal font-poppins leading-snug">Airlinefees</div>
            <div class="left-[836px] top-[4537px] absolute text-gray-500 text-lg font-normal font-poppins leading-snug">Airline</div>
            <div class="left-[836px] top-[4572px] absolute text-gray-500 text-lg font-normal font-poppins leading-snug">Low fare tips</div>
            
            <div class="left-[616px] top-[4678px] absolute text-gray-500 text-sm font-normal font-poppins leading-none">All rights reserved@jadoo.co</div>
            
            <!-- Hero Section -->
            <div class="w-44 h-14 left-[148px] top-[692px] absolute bg-amber-500 rounded-[10px] shadow-[0px_20px_35px_0px_rgba(241,165,1,0.15)]"></div>
            <div class="left-[175px] top-[711px] absolute text-center text-white text-lg font-medium font-google-sans">Find out more</div>
            <div class="left-[435px] top-[711px] absolute text-zinc-500 text-base font-normal font-poppins">Play Demo</div>
            <div class="w-12 h-12 left-[362px] top-[696px] absolute bg-red-400 rounded-full shadow-[0px_15px_30px_0px_rgba(223,105,81,0.30)] transition-transform duration-300 hover:scale-125 cursor-pointer"></div>
            
            <!-- Hero Text -->
            <div class="left-[150px] top-[217px] absolute text-red-400 text-xl font-bold font-poppins uppercase">Best Destinations around the world</div>
            <div class="w-[477px] left-[148px] top-[568px] absolute text-gray-500 text-base font-normal font-poppins leading-loose">Built Wicket longer admire do barton vanity itself do in it. Preferred to sportsmen it engrossed listening. Park gate sell they west hard for the.</div>
            
            <!-- Hero Title -->
            <div class="left-[150px] top-[271px] absolute text-indigo-950 text-8xl font-bold font-volkhov leading-[89px]">Travel, enjoy<br/>and live a new<br/>and full life</div>
            
            <!-- Hero Image -->
            <img class="w-[765px] h-[764px] left-[565px] top-[105px] absolute" src="/images/Clean_Brothers_aloldal_hero_kep_mobil.webp" />
            
            <!-- Rest of the travel agency content... -->
            <!-- Services Section -->
            <div class="left-[652px] top-[974px] absolute text-center text-gray-500 text-lg font-semibold font-poppins">KIEMELT</div>
            <div class="left-[428px] top-[1011px] absolute text-center text-indigo-950 text-5xl font-bold font-volkhov capitalize">Mercedes-Benz Modellek</div>
            
            <!-- Featured Cars Grid -->
            <div class="absolute left-[140px] top-[1100px] w-[1160px] grid grid-cols-4 gap-8">
                @forelse($featuredCars as $car)
                    <div class="bg-white rounded-[36px] shadow-[0px_1.8518518209457397px_3.1481480598449707px_0px_rgba(0,0,0,0.00)] shadow-[0px_8.148148536682129px_6.518518447875977px_0px_rgba(0,0,0,0.01)] shadow-[0px_20px_13px_0px_rgba(0,0,0,0.01)] shadow-[0px_38.51852035522461px_25.481481552124023px_0px_rgba(0,0,0,0.01)] shadow-[0px_64.81481170654297px_46.85185241699219px_0px_rgba(0,0,0,0.02)] shadow-[0px_100px_80px_0px_rgba(0,0,0,0.02)] overflow-hidden group hover:shadow-3xl transition-all duration-300 cursor-pointer">
                        <div class="h-48 bg-gradient-to-br from-gray-100 to-gray-200 flex items-center justify-center relative overflow-hidden">
                            @if($car->image)
                                <img src="{{ asset('storage/' . $car->image) }}" 
                                     alt="{{ $car->name }}" 
                                     class="max-w-full max-h-full object-contain group-hover:scale-110 transition-transform duration-300">
                            @else
                                <div class="text-center">
                                    <div class="mb-star w-8 h-8 mx-auto mb-2 opacity-30 bg-black"></div>
                                    <p class="text-gray-400 text-sm">{{ $car->model }}</p>
                                </div>
                            @endif
                            
                            @if($car->is_electric)
                                <div class="absolute top-4 left-4 bg-green-500 text-white px-2 py-1 rounded-full text-xs font-medium">EQS</div>
                            @elseif($car->is_amg)
                                <div class="absolute top-4 left-4 bg-red-500 text-white px-2 py-1 rounded-full text-xs font-medium">AMG</div>
                            @elseif($car->type === 'hybrid')
                                <div class="absolute top-4 left-4 bg-orange-500 text-white px-2 py-1 rounded-full text-xs font-medium">Hybrid</div>
                            @endif
                        </div>
                        
                        <div class="p-6 text-center">
                            <h3 class="text-xl font-semibold text-indigo-950 mb-2 group-hover:text-red-400 transition-colors duration-300">{{ $car->name }}</h3>
                            <p class="text-gray-500 text-base font-normal mb-4 leading-relaxed">{{ Str::limit($car->description, 80) ?: 'Prémium Mercedes-Benz modell kivételes teljesítménnyel és luxus felszereltséggel.' }}</p>
                            <div class="text-2xl font-bold text-red-400 mb-4">{{ $car->formatted_price }}</div>
                            <a href="{{ route('car.show', $car->id) }}" class="inline-block bg-red-400 text-white px-6 py-2 rounded-lg font-medium hover:bg-red-500 transition-colors duration-300">
                                Részletek
                            </a>
                        </div>
                    </div>
                @empty
                    <div class="col-span-4 text-center py-12">
                        <p class="text-gray-500 text-lg">Jelenleg nincsenek kiemelt modellek.</p>
                    </div>
                @endforelse
            </div>
            
            <!-- Top Destinations Section -->
            <div class="left-[632px] top-[1614px] absolute text-center text-gray-500 text-lg font-semibold font-poppins">Prémium</div>
            <div class="left-[490px] top-[1649px] absolute text-center text-indigo-950 text-5xl font-bold font-volkhov capitalize">Mercedes-Benz Élmény</div>
            
            <!-- Description Text -->
            <div class="left-[280px] top-[1720px] absolute text-center text-gray-500 text-lg font-normal font-poppins leading-relaxed w-[880px]">
                Fedezze fel a Mercedes-Benz világot, ahol a német mérnöki tökéletesség találkozik a luxus és az innováció legmagasabb szintjével. Minden egyes modellünk egyedi utazási élményt nyújt, legyen szó városi közlekedésről vagy hosszú távú kalandokról.
            </div>
            
            <!-- Mercedes Image with fade effect -->
            <div class="left-[280px] top-[1820px] absolute w-[880px] h-[400px] relative overflow-hidden">
                <img src="/images/65252793_10157359571007258_27434275401891840_n.jpg" 
                     alt="Mercedes-Benz" 
                     class="w-full h-full object-cover rounded-[15px] shadow-xl">
                <!-- Gradient fade on right edge -->
                <div class="absolute top-0 right-0 w-32 h-full bg-gradient-to-l from-white to-transparent rounded-r-[15px] pointer-events-none"></div>
            </div>
            
            <!-- Testimonials Section -->
            <div class="left-[186px] top-[2400px] absolute text-gray-500 text-lg font-semibold font-poppins uppercase">Vásárlóink</div>
            <div class="left-[186px] top-[2435px] absolute text-indigo-950 text-5xl font-bold font-volkhov capitalize">Mit mondanak<br/>rólunk</div>
            
            <!-- Carousel Container -->
            <div class="left-[140px] top-[2550px] absolute w-[1160px] h-[400px] overflow-hidden">
                <!-- Sliding testimonials -->
                <div class="testimonials-carousel flex items-center h-full animate-slide-infinite">
                    <!-- Testimonial 1 -->
                    <div class="flex-shrink-0 w-[350px] mx-4 opacity-75 transform scale-90 transition-all duration-500">
                        <div class="bg-white rounded-[20px] p-8 shadow-[0px_20px_40px_0px_rgba(0,0,0,0.10)] h-[320px] flex flex-col justify-between">
                            <div>
                                <div class="flex text-amber-400 mb-4">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                    </svg>
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                    </svg>
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                    </svg>
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                    </svg>
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                    </svg>
                                </div>
                                <p class="text-gray-600 text-base font-normal font-poppins leading-relaxed mb-6">
                                    "Fantasztikus élmény volt a Mercedes-Benz vásárlás. A kiszolgálás professzionális, az autó minősége pedig felülmúlta minden várakozásomat."
                                </p>
                            </div>
                            <div>
                                <h4 class="text-gray-800 text-lg font-semibold font-poppins">Kovács Péter</h4>
                                <p class="text-gray-500 text-sm font-normal font-poppins">Mercedes-AMG tulajdonos</p>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Testimonial 2 (Center - Larger) -->
                    <div class="flex-shrink-0 w-[420px] mx-4 opacity-100 transform scale-110 transition-all duration-500">
                        <div class="bg-white rounded-[20px] p-10 shadow-[0px_30px_60px_0px_rgba(0,0,0,0.15)] h-[360px] flex flex-col justify-between border-2 border-red-400">
                            <div>
                                <div class="flex text-amber-400 mb-6">
                                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                    </svg>
                                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                    </svg>
                                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                    </svg>
                                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                    </svg>
                                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                    </svg>
                                </div>
                                <p class="text-gray-600 text-lg font-normal font-poppins leading-relaxed mb-8">
                                    "Az EQS elektromos luxusautó teljesen megváltoztatta a közlekedésről alkotott elképzeléseimet. Csendes, környezetbarát és hihetetlenül elegáns. A legjobb befektetés, amit valaha tettem!"
                                </p>
                            </div>
                            <div>
                                <h4 class="text-gray-800 text-xl font-semibold font-poppins">Nagy Katalin</h4>
                                <p class="text-gray-500 text-base font-normal font-poppins">Mercedes-EQS tulajdonos</p>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Testimonial 3 -->
                    <div class="flex-shrink-0 w-[350px] mx-4 opacity-75 transform scale-90 transition-all duration-500">
                        <div class="bg-white rounded-[20px] p-8 shadow-[0px_20px_40px_0px_rgba(0,0,0,0.10)] h-[320px] flex flex-col justify-between">
                            <div>
                                <div class="flex text-amber-400 mb-4">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                    </svg>
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                    </svg>
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                    </svg>
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                    </svg>
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                    </svg>
                                </div>
                                <p class="text-gray-600 text-base font-normal font-poppins leading-relaxed mb-6">
                                    "A szerviz szolgáltatásuk példaértékű. Minden kérdésemre türelmesen válaszoltak, és az autóm mindig tökéletes állapotban került vissza."
                                </p>
                            </div>
                            <div>
                                <h4 class="text-gray-800 text-lg font-semibold font-poppins">Szabó András</h4>
                                <p class="text-gray-500 text-sm font-normal font-poppins">Mercedes-Benz C-osztály tulajdonos</p>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Testimonial 4 -->
                    <div class="flex-shrink-0 w-[350px] mx-4 opacity-75 transform scale-90 transition-all duration-500">
                        <div class="bg-white rounded-[20px] p-8 shadow-[0px_20px_40px_0px_rgba(0,0,0,0.10)] h-[320px] flex flex-col justify-between">
                            <div>
                                <div class="flex text-amber-400 mb-4">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                    </svg>
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                    </svg>
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                    </svg>
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                    </svg>
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                    </svg>
                                </div>
                                <p class="text-gray-600 text-base font-normal font-poppins leading-relaxed mb-6">
                                    "A G-osztályú Mercedes minden várakozásomat felülmúlta. Terepjáróként és városi autóként is tökéletes. Valóban prémium élmény minden kilométer."
                                </p>
                            </div>
                            <div>
                                <h4 class="text-gray-800 text-lg font-semibold font-poppins">Varga László</h4>
                                <p class="text-gray-500 text-sm font-normal font-poppins">Mercedes-Benz G-osztály tulajdonos</p>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Repeat testimonials for infinite scroll -->
                    <div class="flex-shrink-0 w-[350px] mx-4 opacity-75 transform scale-90 transition-all duration-500">
                        <div class="bg-white rounded-[20px] p-8 shadow-[0px_20px_40px_0px_rgba(0,0,0,0.10)] h-[320px] flex flex-col justify-between">
                            <div>
                                <div class="flex text-amber-400 mb-4">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                    </svg>
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                    </svg>
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                    </svg>
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                    </svg>
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                    </svg>
                                </div>
                                <p class="text-gray-600 text-base font-normal font-poppins leading-relaxed mb-6">
                                    "Fantasztikus élmény volt a Mercedes-Benz vásárlás. A kiszolgálás professzionális, az autó minősége pedig felülmúlta minden várakozásomat."
                                </p>
                            </div>
                            <div>
                                <h4 class="text-gray-800 text-lg font-semibold font-poppins">Kovács Péter</h4>
                                <p class="text-gray-500 text-sm font-normal font-poppins">Mercedes-AMG tulajdonos</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Newsletter Section -->
            <div class="left-[280px] top-[3926px] absolute text-center text-gray-500 text-3xl font-semibold font-poppins leading-[54px]">Subscribe to get information, latest news and other<br/>interesting offers about Jadoo</div>
        </div>
    </div>
</body>
</html>
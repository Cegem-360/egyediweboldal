<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kosár - Mercedes-Benz</title>
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

        .cart-icon {
            position: relative;
            color: #fff;
            text-decoration: none;
            padding: 0.5rem;
        }

        .cart-count {
            position: absolute;
            top: 0;
            right: 0;
            background: #00adef;
            color: white;
            border-radius: 50%;
            width: 20px;
            height: 20px;
            font-size: 0.75rem;
            display: flex;
            align-items: center;
            justify-content: center;
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
            margin-bottom: 2rem;
            text-align: center;
        }

        /* Cart */
        .cart-container {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 2rem;
        }

        .cart-items {
            background: white;
            border-radius: 8px;
            padding: 1.5rem;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .cart-item {
            display: grid;
            grid-template-columns: 120px 1fr auto auto auto;
            gap: 1rem;
            padding: 1.5rem 0;
            border-bottom: 1px solid #eee;
            align-items: center;
        }

        .cart-item:last-child {
            border-bottom: none;
        }

        .cart-item-image {
            width: 120px;
            height: 80px;
            background: #f5f5f5;
            border-radius: 6px;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
        }

        .cart-item-image img {
            max-width: 100%;
            max-height: 100%;
            object-fit: contain;
        }

        .cart-item-info h3 {
            font-size: 1.1rem;
            margin-bottom: 0.5rem;
        }

        .cart-item-info p {
            color: #666;
            font-size: 0.9rem;
        }

        .cart-item-options {
            font-size: 0.8rem;
            color: #888;
            margin-top: 0.25rem;
        }

        .quantity-controls {
            display: flex;
            align-items: center;
            border: 1px solid #ddd;
            border-radius: 4px;
            overflow: hidden;
        }

        .quantity-btn {
            background: #f8f9fa;
            border: none;
            padding: 0.5rem 0.75rem;
            cursor: pointer;
            font-size: 1rem;
            border-right: 1px solid #ddd;
        }

        .quantity-btn:last-child {
            border-right: none;
            border-left: 1px solid #ddd;
        }

        .quantity-btn:hover {
            background: #e9ecef;
        }

        .quantity-input {
            border: none;
            text-align: center;
            width: 60px;
            padding: 0.5rem;
            font-size: 1rem;
        }

        .cart-item-price {
            font-weight: 600;
            color: #00adef;
        }

        .cart-item-total {
            font-weight: bold;
            font-size: 1.1rem;
        }

        .remove-btn {
            background: #dc3545;
            color: white;
            border: none;
            padding: 0.5rem 1rem;
            border-radius: 4px;
            cursor: pointer;
            font-size: 0.9rem;
        }

        .remove-btn:hover {
            background: #c82333;
        }

        /* Cart Summary */
        .cart-summary {
            background: white;
            border-radius: 8px;
            padding: 1.5rem;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            height: fit-content;
        }

        .summary-title {
            font-size: 1.5rem;
            margin-bottom: 1rem;
            padding-bottom: 1rem;
            border-bottom: 1px solid #eee;
        }

        .summary-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 0.75rem;
        }

        .summary-row.total {
            font-size: 1.2rem;
            font-weight: bold;
            padding-top: 1rem;
            border-top: 1px solid #eee;
            margin-top: 1rem;
        }

        .checkout-btn {
            width: 100%;
            background: #00adef;
            color: white;
            border: none;
            padding: 1rem;
            border-radius: 6px;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            margin-top: 1rem;
            transition: background 0.3s;
        }

        .checkout-btn:hover {
            background: #0088cc;
        }

        .continue-shopping {
            display: block;
            text-align: center;
            color: #00adef;
            text-decoration: none;
            margin-top: 1rem;
            padding: 0.75rem;
        }

        .continue-shopping:hover {
            text-decoration: underline;
        }

        /* Empty Cart */
        .empty-cart {
            text-align: center;
            padding: 3rem;
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .empty-cart-icon {
            font-size: 4rem;
            color: #ccc;
            margin-bottom: 1rem;
        }

        .empty-cart h2 {
            margin-bottom: 1rem;
            color: #666;
        }

        .empty-cart p {
            color: #888;
            margin-bottom: 2rem;
        }

        .btn {
            display: inline-block;
            background: #00adef;
            color: white;
            padding: 1rem 2rem;
            text-decoration: none;
            border-radius: 6px;
            font-weight: 600;
            transition: background 0.3s;
        }

        .btn:hover {
            background: #0088cc;
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

            .cart-container {
                grid-template-columns: 1fr;
            }

            .cart-item {
                grid-template-columns: 1fr;
                gap: 1rem;
                text-align: center;
            }

            .cart-item-image {
                width: 100px;
                height: 70px;
                margin: 0 auto;
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
                <a href="{{ route('cart.index') }}" class="cart-icon">
                    🛒
                    <span class="cart-count" id="cart-count">{{ $cartItems->sum('quantity') }}</span>
                </a>
            </nav>
        </div>
    </header>

    <!-- Main Content -->
    <main class="main-content">
        <h1 class="page-title">Kosár</h1>

        @if($cartItems->count() > 0)
            <div class="cart-container">
                <div class="cart-items">
                    @foreach($cartItems as $item)
                    <div class="cart-item" data-item-id="{{ $item->id }}">
                        <div class="cart-item-image">
                            @if($item->car->image)
                                <img src="{{ asset('storage/' . $item->car->image) }}" alt="{{ $item->car->name }}">
                            @else
                                <div style="color: #999; font-size: 0.8rem;">{{ $item->car->name }}</div>
                            @endif
                        </div>

                        <div class="cart-item-info">
                            <h3>{{ $item->car->name }}</h3>
                            <p>{{ $item->car->model }}</p>
                            @if($item->options)
                                <div class="cart-item-options">
                                    @foreach($item->options as $key => $value)
                                        <span>{{ $key }}: {{ $value }}</span>@if(!$loop->last), @endif
                                    @endforeach
                                </div>
                            @endif
                        </div>

                        <div class="quantity-controls">
                            <button class="quantity-btn" onclick="updateQuantity({{ $item->id }}, {{ $item->quantity - 1 }})">-</button>
                            <input type="text" class="quantity-input" value="{{ $item->quantity }}" readonly>
                            <button class="quantity-btn" onclick="updateQuantity({{ $item->id }}, {{ $item->quantity + 1 }})">+</button>
                        </div>

                        <div class="cart-item-price">{{ number_format($item->price, 0, ',', '.') }} HUF</div>

                        <div class="cart-item-total">{{ number_format($item->total_price, 0, ',', '.') }} HUF</div>

                        <button class="remove-btn" onclick="removeItem({{ $item->id }})">Törlés</button>
                    </div>
                    @endforeach
                </div>

                <div class="cart-summary">
                    <h3 class="summary-title">Összesítő</h3>
                    
                    <div class="summary-row">
                        <span>Részösszeg:</span>
                        <span id="subtotal">{{ number_format($cartTotal, 0, ',', '.') }} HUF</span>
                    </div>
                    
                    <div class="summary-row">
                        <span>ÁFA (27%):</span>
                        <span id="tax">{{ number_format($cartTotal * 0.27, 0, ',', '.') }} HUF</span>
                    </div>
                    
                    <div class="summary-row total">
                        <span>Végösszeg:</span>
                        <span id="total">{{ number_format($cartTotal + ($cartTotal * 0.27), 0, ',', '.') }} HUF</span>
                    </div>

                    <button class="checkout-btn" onclick="proceedToCheckout()">
                        Megrendelés véglegesítése
                    </button>

                    <a href="{{ route('models') }}" class="continue-shopping">
                        Vásárlás folytatása
                    </a>
                </div>
            </div>
        @else
            <div class="empty-cart">
                <div class="empty-cart-icon">🛒</div>
                <h2>A kosár üres</h2>
                <p>Még nem adott hozzá egyetlen autót sem a kosarához.</p>
                <a href="{{ route('models') }}" class="btn">Modellek megtekintése</a>
            </div>
        @endif
    </main>

    <script>
        // CSRF token for AJAX requests
        const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || '{{ csrf_token() }}';

        function updateQuantity(itemId, newQuantity) {
            if (newQuantity < 0) return;

            fetch(`/kosar/update/${itemId}`, {
                method: 'PUT',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken
                },
                body: JSON.stringify({ quantity: newQuantity })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    if (newQuantity === 0) {
                        document.querySelector(`[data-item-id="${itemId}"]`).remove();
                    }
                    updateCartDisplay(data.cart_total, data.cart_count);
                    
                    // Check if cart is empty
                    if (data.cart_count === 0) {
                        location.reload();
                    }
                } else {
                    alert(data.message);
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Hiba történt a kosár frissítése során');
            });
        }

        function removeItem(itemId) {
            if (!confirm('Biztosan eltávolítja ezt a terméket a kosárból?')) {
                return;
            }

            fetch(`/kosar/remove/${itemId}`, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': csrfToken
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    document.querySelector(`[data-item-id="${itemId}"]`).remove();
                    updateCartDisplay(data.cart_total, data.cart_count);
                    
                    // Check if cart is empty
                    if (data.cart_count === 0) {
                        location.reload();
                    }
                } else {
                    alert(data.message);
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Hiba történt a termék eltávolítása során');
            });
        }

        function updateCartDisplay(total, count) {
            document.getElementById('cart-count').textContent = count;
            document.getElementById('subtotal').textContent = formatPrice(total);
            document.getElementById('tax').textContent = formatPrice(total * 0.27);
            document.getElementById('total').textContent = formatPrice(total + (total * 0.27));
        }

        function formatPrice(price) {
            return new Intl.NumberFormat('hu-HU').format(Math.round(price)) + ' HUF';
        }

        function proceedToCheckout() {
            window.location.href = '{{ route("checkout.index") }}';
        }
    </script>

    <!-- Add CSRF token to head -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
</body>
</html>
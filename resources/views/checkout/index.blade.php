<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rendelés - Mercedes-Benz</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
            max-width: 1200px;
            margin: 2rem auto;
            padding: 0 2rem;
        }

        .page-title {
            font-size: 2.5rem;
            font-weight: 300;
            margin-bottom: 0.5rem;
            text-align: center;
        }

        .page-subtitle {
            text-align: center;
            color: #666;
            margin-bottom: 3rem;
        }

        /* Checkout Container */
        .checkout-container {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 3rem;
        }

        /* Checkout Form */
        .checkout-form {
            background: white;
            border-radius: 8px;
            padding: 2rem;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .form-section {
            margin-bottom: 2.5rem;
        }

        .section-title {
            font-size: 1.3rem;
            font-weight: 600;
            margin-bottom: 1.5rem;
            color: #333;
            border-bottom: 2px solid #00adef;
            padding-bottom: 0.5rem;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1rem;
        }

        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 600;
            color: #333;
        }

        .required {
            color: #e74c3c;
        }

        .form-control {
            width: 100%;
            padding: 0.75rem;
            border: 2px solid #ddd;
            border-radius: 6px;
            font-size: 1rem;
            transition: border-color 0.3s ease;
        }

        .form-control:focus {
            border-color: #00adef;
            outline: none;
        }

        .form-control.error {
            border-color: #e74c3c;
        }

        .error-message {
            color: #e74c3c;
            font-size: 0.9rem;
            margin-top: 0.25rem;
        }

        /* Checkbox */
        .checkbox-group {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            margin-bottom: 1rem;
        }

        .checkbox-group input[type="checkbox"] {
            width: 18px;
            height: 18px;
            accent-color: #00adef;
        }

        .checkbox-label {
            font-weight: normal !important;
            margin-bottom: 0 !important;
        }

        /* Radio buttons */
        .payment-methods {
            display: grid;
            gap: 1rem;
        }

        .payment-method {
            display: flex;
            align-items: center;
            padding: 1rem;
            border: 2px solid #ddd;
            border-radius: 6px;
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .payment-method:hover {
            border-color: #00adef;
        }

        .payment-method.selected {
            border-color: #00adef;
            background: #f0f8ff;
        }

        .payment-method input[type="radio"] {
            margin-right: 1rem;
            accent-color: #00adef;
        }

        .payment-info {
            flex: 1;
        }

        .payment-name {
            font-weight: 600;
            margin-bottom: 0.25rem;
        }

        .payment-desc {
            font-size: 0.9rem;
            color: #666;
        }

        /* Order Summary */
        .order-summary {
            background: white;
            border-radius: 8px;
            padding: 2rem;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            height: fit-content;
        }

        .summary-title {
            font-size: 1.5rem;
            margin-bottom: 1.5rem;
            padding-bottom: 1rem;
            border-bottom: 1px solid #eee;
        }

        /* Cart Items */
        .checkout-item {
            display: flex;
            gap: 1rem;
            padding: 1rem 0;
            border-bottom: 1px solid #f0f0f0;
        }

        .checkout-item:last-child {
            border-bottom: none;
        }

        .item-image {
            width: 60px;
            height: 40px;
            background: #f5f5f5;
            border-radius: 4px;
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

        .item-info {
            flex: 1;
        }

        .item-name {
            font-weight: 600;
            font-size: 0.9rem;
            margin-bottom: 0.25rem;
        }

        .item-model {
            font-size: 0.8rem;
            color: #666;
        }

        .item-quantity {
            font-size: 0.8rem;
            color: #888;
        }

        .item-price {
            font-weight: 600;
            color: #00adef;
            text-align: right;
        }

        /* Summary rows */
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

        /* Submit button */
        .submit-btn {
            width: 100%;
            background: #00adef;
            color: white;
            border: none;
            padding: 1rem;
            border-radius: 6px;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            margin-top: 1.5rem;
            transition: background 0.3s;
        }

        .submit-btn:hover {
            background: #0088cc;
        }

        .submit-btn:disabled {
            background: #ccc;
            cursor: not-allowed;
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

            .checkout-container {
                grid-template-columns: 1fr;
                gap: 2rem;
            }

            .form-row {
                grid-template-columns: 1fr;
            }

            .checkout-form, .order-summary {
                padding: 1.5rem;
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
                <a href="{{ route('cart.index') }}">Kosár</a>
            </nav>
        </div>
    </header>

    <!-- Main Content -->
    <main class="main-content">
        <h1 class="page-title">Rendelés véglegesítése</h1>
        <p class="page-subtitle">Kérjük, töltse ki az alábbi adatokat rendelése véglegesítéséhez</p>

        @if ($errors->any())
            <div style="background: #f8d7da; color: #721c24; padding: 1rem; border-radius: 6px; margin-bottom: 2rem;">
                <ul style="margin: 0; padding-left: 1.5rem;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('checkout.store') }}" method="POST">
            @csrf
            <div class="checkout-container">
                <!-- Checkout Form -->
                <div class="checkout-form">
                    <!-- Customer Information -->
                    <div class="form-section">
                        <h3 class="section-title">Kapcsolattartó adatok</h3>
                        <div class="form-row">
                            <div class="form-group">
                                <label for="customer_name">Név <span class="required">*</span></label>
                                <input type="text" id="customer_name" name="customer_name" class="form-control" 
                                       value="{{ old('customer_name', $user?->name) }}" required>
                                @error('customer_name')
                                    <div class="error-message">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="customer_email">E-mail <span class="required">*</span></label>
                                <input type="email" id="customer_email" name="customer_email" class="form-control" 
                                       value="{{ old('customer_email', $user?->email) }}" required>
                                @error('customer_email')
                                    <div class="error-message">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="customer_phone">Telefonszám</label>
                            <input type="tel" id="customer_phone" name="customer_phone" class="form-control" 
                                   value="{{ old('customer_phone') }}">
                            @error('customer_phone')
                                <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Billing Information -->
                    <div class="form-section">
                        <h3 class="section-title">Számlázási adatok</h3>
                        <div class="form-row">
                            <div class="form-group">
                                <label for="billing_name">Név <span class="required">*</span></label>
                                <input type="text" id="billing_name" name="billing_name" class="form-control" 
                                       value="{{ old('billing_name', $user?->name) }}" required>
                                @error('billing_name')
                                    <div class="error-message">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="billing_email">E-mail <span class="required">*</span></label>
                                <input type="email" id="billing_email" name="billing_email" class="form-control" 
                                       value="{{ old('billing_email', $user?->email) }}" required>
                                @error('billing_email')
                                    <div class="error-message">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="billing_phone">Telefonszám</label>
                            <input type="tel" id="billing_phone" name="billing_phone" class="form-control" 
                                   value="{{ old('billing_phone') }}">
                            @error('billing_phone')
                                <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="billing_address">Cím <span class="required">*</span></label>
                            <input type="text" id="billing_address" name="billing_address" class="form-control" 
                                   value="{{ old('billing_address') }}" required>
                            @error('billing_address')
                                <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-row">
                            <div class="form-group">
                                <label for="billing_city">Város <span class="required">*</span></label>
                                <input type="text" id="billing_city" name="billing_city" class="form-control" 
                                       value="{{ old('billing_city') }}" required>
                                @error('billing_city')
                                    <div class="error-message">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="billing_postal_code">Irányítószám <span class="required">*</span></label>
                                <input type="text" id="billing_postal_code" name="billing_postal_code" class="form-control" 
                                       value="{{ old('billing_postal_code') }}" required>
                                @error('billing_postal_code')
                                    <div class="error-message">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="billing_country">Ország <span class="required">*</span></label>
                            <input type="text" id="billing_country" name="billing_country" class="form-control" 
                                   value="{{ old('billing_country', 'Magyarország') }}" required>
                            @error('billing_country')
                                <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Shipping Information -->
                    <div class="form-section">
                        <h3 class="section-title">Szállítási adatok</h3>
                        <div class="checkbox-group">
                            <input type="checkbox" id="shipping_same_as_billing" name="shipping_same_as_billing" 
                                   value="1" {{ old('shipping_same_as_billing') ? 'checked' : '' }} onchange="toggleShippingFields()">
                            <label for="shipping_same_as_billing" class="checkbox-label">
                                A szállítási cím megegyezik a számlázási címmel
                            </label>
                        </div>

                        <div id="shipping-fields" style="display: {{ old('shipping_same_as_billing') ? 'none' : 'block' }};">
                            <div class="form-group">
                                <label for="shipping_name">Név</label>
                                <input type="text" id="shipping_name" name="shipping_name" class="form-control" 
                                       value="{{ old('shipping_name') }}">
                                @error('shipping_name')
                                    <div class="error-message">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="shipping_address">Cím</label>
                                <input type="text" id="shipping_address" name="shipping_address" class="form-control" 
                                       value="{{ old('shipping_address') }}">
                                @error('shipping_address')
                                    <div class="error-message">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-row">
                                <div class="form-group">
                                    <label for="shipping_city">Város</label>
                                    <input type="text" id="shipping_city" name="shipping_city" class="form-control" 
                                           value="{{ old('shipping_city') }}">
                                    @error('shipping_city')
                                        <div class="error-message">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="shipping_postal_code">Irányítószám</label>
                                    <input type="text" id="shipping_postal_code" name="shipping_postal_code" class="form-control" 
                                           value="{{ old('shipping_postal_code') }}">
                                    @error('shipping_postal_code')
                                        <div class="error-message">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="shipping_country">Ország</label>
                                <input type="text" id="shipping_country" name="shipping_country" class="form-control" 
                                       value="{{ old('shipping_country', 'Magyarország') }}">
                                @error('shipping_country')
                                    <div class="error-message">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Payment Method -->
                    <div class="form-section">
                        <h3 class="section-title">Fizetési mód</h3>
                        <div class="payment-methods">
                            <label class="payment-method {{ old('payment_method') === 'card' || !old('payment_method') ? 'selected' : '' }}" 
                                   onclick="selectPaymentMethod('card', this)">
                                <input type="radio" name="payment_method" value="card" 
                                       {{ old('payment_method') === 'card' || !old('payment_method') ? 'checked' : '' }}>
                                <div class="payment-info">
                                    <div class="payment-name">💳 Bankkártya</div>
                                    <div class="payment-desc">Biztonságos online fizetés bankkártyával</div>
                                </div>
                            </label>
                            <label class="payment-method {{ old('payment_method') === 'transfer' ? 'selected' : '' }}" 
                                   onclick="selectPaymentMethod('transfer', this)">
                                <input type="radio" name="payment_method" value="transfer" 
                                       {{ old('payment_method') === 'transfer' ? 'checked' : '' }}>
                                <div class="payment-info">
                                    <div class="payment-name">🏦 Banki átutalás</div>
                                    <div class="payment-desc">Átutalás a megadott bankszámlaszámra</div>
                                </div>
                            </label>
                            <label class="payment-method {{ old('payment_method') === 'cash' ? 'selected' : '' }}" 
                                   onclick="selectPaymentMethod('cash', this)">
                                <input type="radio" name="payment_method" value="cash" 
                                       {{ old('payment_method') === 'cash' ? 'checked' : '' }}>
                                <div class="payment-info">
                                    <div class="payment-name">💵 Készpénz</div>
                                    <div class="payment-desc">Fizetés átvételkor készpénzben</div>
                                </div>
                            </label>
                        </div>
                        @error('payment_method')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Notes -->
                    <div class="form-section">
                        <h3 class="section-title">Megjegyzések</h3>
                        <div class="form-group">
                            <label for="notes">További információk</label>
                            <textarea id="notes" name="notes" class="form-control" rows="4" 
                                      placeholder="Itt helyezhet el további megjegyzéseket rendelésével kapcsolatban...">{{ old('notes') }}</textarea>
                            @error('notes')
                                <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Terms -->
                    <div class="form-section">
                        <div class="checkbox-group">
                            <input type="checkbox" id="terms_accepted" name="terms_accepted" value="1" required>
                            <label for="terms_accepted" class="checkbox-label">
                                Elfogadom az <a href="#" style="color: #00adef;">Általános Szerződési Feltételeket</a> <span class="required">*</span>
                            </label>
                        </div>
                        @error('terms_accepted')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="submit-btn">
                        Rendelés véglegesítése
                    </button>
                </div>

                <!-- Order Summary -->
                <div class="order-summary">
                    <h3 class="summary-title">Rendelés összesítő</h3>
                    
                    @foreach($cartItems as $item)
                    <div class="checkout-item">
                        <div class="item-image">
                            @if($item->car->image)
                                <img src="{{ asset('storage/' . $item->car->image) }}" alt="{{ $item->car->name }}">
                            @else
                                <div style="color: #999; font-size: 0.7rem; text-align: center;">{{ $item->car->name }}</div>
                            @endif
                        </div>
                        <div class="item-info">
                            <div class="item-name">{{ $item->car->name }}</div>
                            <div class="item-model">{{ $item->car->model }}</div>
                            <div class="item-quantity">{{ $item->quantity }} db</div>
                        </div>
                        <div class="item-price">{{ number_format($item->total_price, 0, ',', '.') }} HUF</div>
                    </div>
                    @endforeach
                    
                    <div class="summary-row">
                        <span>Részösszeg:</span>
                        <span>{{ number_format($cartTotal, 0, ',', '.') }} HUF</span>
                    </div>
                    
                    <div class="summary-row">
                        <span>ÁFA (27%):</span>
                        <span>{{ number_format($taxAmount, 0, ',', '.') }} HUF</span>
                    </div>
                    
                    <div class="summary-row">
                        <span>Szállítás:</span>
                        <span>0 HUF</span>
                    </div>
                    
                    <div class="summary-row total">
                        <span>Végösszeg:</span>
                        <span>{{ number_format($finalTotal, 0, ',', '.') }} HUF</span>
                    </div>
                </div>
            </div>
        </form>
    </main>

    <script>
        function toggleShippingFields() {
            const checkbox = document.getElementById('shipping_same_as_billing');
            const shippingFields = document.getElementById('shipping-fields');
            
            if (checkbox.checked) {
                shippingFields.style.display = 'none';
            } else {
                shippingFields.style.display = 'block';
            }
        }

        function selectPaymentMethod(method, element) {
            // Remove selected class from all payment methods
            document.querySelectorAll('.payment-method').forEach(el => {
                el.classList.remove('selected');
            });
            
            // Add selected class to clicked element
            element.classList.add('selected');
            
            // Check the radio button
            element.querySelector('input[type="radio"]').checked = true;
        }

        // Initialize payment method selection on page load
        document.addEventListener('DOMContentLoaded', function() {
            const selectedPayment = document.querySelector('input[name="payment_method"]:checked');
            if (selectedPayment) {
                const paymentMethod = selectedPayment.closest('.payment-method');
                paymentMethod.classList.add('selected');
            }
        });
    </script>
</body>
</html>
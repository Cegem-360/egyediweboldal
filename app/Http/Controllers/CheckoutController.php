<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Services\CartService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class CheckoutController extends Controller
{
    protected CartService $cartService;

    public function __construct(CartService $cartService)
    {
        $this->cartService = $cartService;
    }

    public function index()
    {
        $cartItems = $this->cartService->getCartItems();
        
        if ($cartItems->isEmpty()) {
            return redirect()->route('cart.index')
                ->with('error', 'A kosár üres. Adjon hozzá termékeket a rendelés leadásához.');
        }

        $cartTotal = $this->cartService->getCartTotal();
        $taxAmount = $cartTotal * 0.27; // 27% ÁFA
        $finalTotal = $cartTotal + $taxAmount;

        $user = Auth::user();

        return view('checkout.index', compact(
            'cartItems', 
            'cartTotal', 
            'taxAmount', 
            'finalTotal', 
            'user'
        ));
    }

    public function store(Request $request)
    {
        $cartItems = $this->cartService->getCartItems();
        
        if ($cartItems->isEmpty()) {
            return redirect()->route('cart.index')
                ->with('error', 'A kosár üres.');
        }

        // Validation
        $validator = Validator::make($request->all(), [
            'customer_name' => 'required|string|max:255',
            'customer_email' => 'required|email|max:255',
            'customer_phone' => 'nullable|string|max:20',
            'billing_name' => 'required|string|max:255',
            'billing_email' => 'required|email|max:255',
            'billing_phone' => 'nullable|string|max:20',
            'billing_address' => 'required|string|max:500',
            'billing_city' => 'required|string|max:255',
            'billing_postal_code' => 'required|string|max:10',
            'billing_country' => 'required|string|max:255',
            'shipping_same_as_billing' => 'boolean',
            'shipping_name' => 'required_if:shipping_same_as_billing,false|string|max:255',
            'shipping_address' => 'required_if:shipping_same_as_billing,false|string|max:500',
            'shipping_city' => 'required_if:shipping_same_as_billing,false|string|max:255',
            'shipping_postal_code' => 'required_if:shipping_same_as_billing,false|string|max:10',
            'shipping_country' => 'required_if:shipping_same_as_billing,false|string|max:255',
            'payment_method' => 'required|in:card,transfer,cash',
            'notes' => 'nullable|string|max:1000',
            'terms_accepted' => 'required|accepted',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        try {
            DB::beginTransaction();

            // Calculate totals
            $subtotal = $this->cartService->getCartTotal();
            $taxAmount = $subtotal * 0.27;
            $total = $subtotal + $taxAmount;

            // Create order
            $orderData = [
                'order_number' => Order::generateOrderNumber(),
                'user_id' => Auth::id(),
                'status' => 'pending',
                'customer_name' => $request->customer_name,
                'customer_email' => $request->customer_email,
                'customer_phone' => $request->customer_phone,
                'billing_name' => $request->billing_name,
                'billing_email' => $request->billing_email,
                'billing_phone' => $request->billing_phone,
                'billing_address' => $request->billing_address,
                'billing_city' => $request->billing_city,
                'billing_postal_code' => $request->billing_postal_code,
                'billing_country' => $request->billing_country,
                'subtotal' => $subtotal,
                'tax_amount' => $taxAmount,
                'shipping_amount' => 0, // Mercedes esetében általában nincs szállítási díj
                'total' => $total,
                'currency' => 'HUF',
                'payment_method' => $request->payment_method,
                'payment_status' => 'pending',
                'notes' => $request->notes,
            ];

            // Handle shipping address
            if ($request->shipping_same_as_billing) {
                $orderData['shipping_name'] = $request->billing_name;
                $orderData['shipping_address'] = $request->billing_address;
                $orderData['shipping_city'] = $request->billing_city;
                $orderData['shipping_postal_code'] = $request->billing_postal_code;
                $orderData['shipping_country'] = $request->billing_country;
            } else {
                $orderData['shipping_name'] = $request->shipping_name;
                $orderData['shipping_address'] = $request->shipping_address;
                $orderData['shipping_city'] = $request->shipping_city;
                $orderData['shipping_postal_code'] = $request->shipping_postal_code;
                $orderData['shipping_country'] = $request->shipping_country;
            }

            $order = Order::create($orderData);

            // Create order items
            foreach ($cartItems as $cartItem) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'car_id' => $cartItem->car_id,
                    'quantity' => $cartItem->quantity,
                    'car_name' => $cartItem->car->name,
                    'car_model' => $cartItem->car->model,
                    'unit_price' => $cartItem->price,
                    'total_price' => $cartItem->total_price,
                    'options' => $cartItem->options,
                ]);
            }

            // Clear cart
            $this->cartService->clearCart();

            DB::commit();

            // Simulate payment processing
            if ($request->payment_method === 'card') {
                // Here you would integrate with a payment gateway
                // For now, we'll simulate success
                $order->update([
                    'payment_status' => 'paid',
                    'paid_at' => now(),
                    'status' => 'confirmed'
                ]);
            }

            return redirect()->route('checkout.success', $order->order_number)
                ->with('success', 'Rendelése sikeresen leadva!');

        } catch (\Exception $e) {
            DB::rollBack();
            
            return redirect()->back()
                ->with('error', 'Hiba történt a rendelés feldolgozása során: ' . $e->getMessage())
                ->withInput();
        }
    }

    public function success($orderNumber)
    {
        $order = Order::where('order_number', $orderNumber)
            ->with('orderItems.car')
            ->firstOrFail();
        
        // Only allow access to order owner or admin
        if (Auth::id() !== $order->user_id && !Auth::user()?->is_admin) {
            abort(403);
        }

        return view('checkout.success', compact('order'));
    }
}

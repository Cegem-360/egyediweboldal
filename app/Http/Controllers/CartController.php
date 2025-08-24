<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Services\CartService;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class CartController extends Controller
{
    protected CartService $cartService;

    public function __construct(CartService $cartService)
    {
        $this->cartService = $cartService;
    }

    public function index()
    {
        $cartItems = $this->cartService->getCartItems();
        $cartTotal = $this->cartService->getCartTotal();
        
        return view('cart.index', compact('cartItems', 'cartTotal'));
    }

    public function add(Request $request, Car $car): JsonResponse
    {
        $request->validate([
            'quantity' => 'integer|min:1|max:10',
            'options' => 'array|nullable',
        ]);

        $quantity = $request->input('quantity', 1);
        $options = $request->input('options', []);

        if ($this->cartService->addToCart($car, $quantity, $options)) {
            return response()->json([
                'success' => true,
                'message' => 'Autó sikeresen hozzáadva a kosárhoz',
                'cart_count' => $this->cartService->getCartCount(),
                'cart_total' => $this->cartService->getCartTotal(),
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'Hiba történt a kosárhoz adás során',
        ], 500);
    }

    public function update(Request $request, int $cartItemId): JsonResponse
    {
        $request->validate([
            'quantity' => 'required|integer|min:0|max:10',
        ]);

        if ($this->cartService->updateQuantity($cartItemId, $request->quantity)) {
            return response()->json([
                'success' => true,
                'message' => 'Kosár frissítve',
                'cart_count' => $this->cartService->getCartCount(),
                'cart_total' => $this->cartService->getCartTotal(),
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'Hiba történt a frissítés során',
        ], 500);
    }

    public function remove(int $cartItemId): JsonResponse
    {
        if ($this->cartService->removeFromCart($cartItemId)) {
            return response()->json([
                'success' => true,
                'message' => 'Termék eltávolítva a kosárból',
                'cart_count' => $this->cartService->getCartCount(),
                'cart_total' => $this->cartService->getCartTotal(),
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'Hiba történt az eltávolítás során',
        ], 500);
    }

    public function clear(): JsonResponse
    {
        if ($this->cartService->clearCart()) {
            return response()->json([
                'success' => true,
                'message' => 'Kosár kiürítve',
                'cart_count' => 0,
                'cart_total' => 0,
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'Hiba történt a kosár kiürítése során',
        ], 500);
    }

    public function count(): JsonResponse
    {
        return response()->json([
            'count' => $this->cartService->getCartCount(),
            'total' => $this->cartService->getCartTotal(),
        ]);
    }
}

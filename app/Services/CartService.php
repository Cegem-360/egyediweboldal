<?php

namespace App\Services;

use App\Models\Cart;
use App\Models\Car;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CartService
{
    protected function getCartQuery()
    {
        if (Auth::check()) {
            return Cart::forUser(Auth::id());
        }
        
        return Cart::forGuest(Session::getId());
    }

    public function addToCart(Car $car, int $quantity = 1, array $options = []): bool
    {
        try {
            $existingItem = $this->getCartQuery()
                ->where('car_id', $car->id)
                ->first();

            if ($existingItem) {
                // Update existing item
                $existingItem->update([
                    'quantity' => $existingItem->quantity + $quantity,
                    'options' => array_merge($existingItem->options ?? [], $options),
                    'price' => $car->price, // Update to current price
                ]);
            } else {
                // Create new cart item
                Cart::create([
                    'user_id' => Auth::id(),
                    'session_id' => Auth::check() ? null : Session::getId(),
                    'car_id' => $car->id,
                    'quantity' => $quantity,
                    'options' => $options,
                    'price' => $car->price,
                ]);
            }

            return true;
        } catch (\Exception $e) {
            return false;
        }
    }

    public function updateQuantity(int $cartItemId, int $quantity): bool
    {
        try {
            $cartItem = $this->getCartQuery()->findOrFail($cartItemId);
            
            if ($quantity <= 0) {
                return $this->removeFromCart($cartItemId);
            }

            $cartItem->update(['quantity' => $quantity]);
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }

    public function removeFromCart(int $cartItemId): bool
    {
        try {
            $cartItem = $this->getCartQuery()->findOrFail($cartItemId);
            $cartItem->delete();
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }

    public function getCartItems()
    {
        return $this->getCartQuery()
            ->with('car')
            ->orderBy('created_at', 'desc')
            ->get();
    }

    public function getCartTotal(): float
    {
        return $this->getCartItems()->sum('total_price');
    }

    public function getCartCount(): int
    {
        return $this->getCartItems()->sum('quantity');
    }

    public function clearCart(): bool
    {
        try {
            $this->getCartQuery()->delete();
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }

    public function mergeGuestCart($sessionId): bool
    {
        if (!Auth::check()) {
            return false;
        }

        try {
            $guestItems = Cart::forGuest($sessionId)->get();
            
            foreach ($guestItems as $guestItem) {
                $existingItem = Cart::forUser(Auth::id())
                    ->where('car_id', $guestItem->car_id)
                    ->first();

                if ($existingItem) {
                    $existingItem->update([
                        'quantity' => $existingItem->quantity + $guestItem->quantity,
                    ]);
                } else {
                    $guestItem->update([
                        'user_id' => Auth::id(),
                        'session_id' => null,
                    ]);
                }
            }

            // Clean up remaining guest items
            Cart::forGuest($sessionId)->delete();
            
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }
}
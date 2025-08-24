<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;
use App\Models\Car;

Route::get('/', function () {
    $featuredCars = Car::active()->featured()->limit(6)->get();
    $categories = Car::CATEGORIES;
    
    return view('welcome', compact('featuredCars', 'categories'));
})->name('home');

Route::get('/modellek', function () {
    $query = Car::active();
    
    // Szűrők alkalmazása
    if (request('category') && is_array(request('category')) && !empty(request('category'))) {
        $query->whereIn('category', request('category'));
    }
    
    if (request('type') && is_array(request('type')) && !empty(request('type'))) {
        $query->whereIn('type', request('type'));
    }
    
    if (request('price_from')) {
        $query->where('price', '>=', request('price_from'));
    }
    
    if (request('price_to')) {
        $query->where('price', '<=', request('price_to'));
    }
    
    $cars = $query->orderBy('name')->get();
    $categories = Car::CATEGORIES;
    $types = Car::TYPES;
    
    return view('models', compact('cars', 'categories', 'types'));
})->name('models');

Route::get('/rolunk', function () {
    $aboutData = \App\Models\About::getActiveContent();
    return view('about', compact('aboutData'));
})->name('about');

Route::get('/szolgaltatasok', function () {
    return view('services');
})->name('services');

Route::get('/vasarlas', function () {
    $featuredCars = Car::active()->featured()->limit(4)->get();
    return view('vasarlas', compact('featuredCars'));
})->name('vasarlas');

Route::get('/auto/{id}', function ($id) {
    $car = Car::active()->findOrFail($id);
    $relatedCars = Car::active()
        ->where('id', '!=', $car->id)
        ->where(function ($query) use ($car) {
            $query->where('category', $car->category)
                  ->orWhere('type', $car->type);
        })
        ->limit(4)
        ->get();
    
    return view('car-detail', compact('car', 'relatedCars'));
})->name('car.show');

// Cart routes
Route::prefix('kosar')->name('cart.')->group(function () {
    Route::get('/', [App\Http\Controllers\CartController::class, 'index'])->name('index');
    Route::post('/add/{car}', [App\Http\Controllers\CartController::class, 'add'])->name('add');
    Route::put('/update/{cartItem}', [App\Http\Controllers\CartController::class, 'update'])->name('update');
    Route::delete('/remove/{cartItem}', [App\Http\Controllers\CartController::class, 'remove'])->name('remove');
    Route::delete('/clear', [App\Http\Controllers\CartController::class, 'clear'])->name('clear');
    Route::get('/count', [App\Http\Controllers\CartController::class, 'count'])->name('count');
});

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

// Checkout routes
Route::prefix('rendeles')->name('checkout.')->group(function () {
    Route::get('/', [App\Http\Controllers\CheckoutController::class, 'index'])->name('index');
    Route::post('/', [App\Http\Controllers\CheckoutController::class, 'store'])->name('store');
    Route::get('/sikeres/{orderNumber}', [App\Http\Controllers\CheckoutController::class, 'success'])->name('success');
});

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
    
    // Profile routes
    Route::get('/profil', [App\Http\Controllers\ProfileController::class, 'index'])->name('profile.index');
    Route::get('/profil/rendelesek', [App\Http\Controllers\ProfileController::class, 'orders'])->name('profile.orders');
    Route::get('/profil/rendeles/{orderNumber}', [App\Http\Controllers\ProfileController::class, 'orderDetail'])->name('profile.order-detail');
});

require __DIR__.'/auth.php';

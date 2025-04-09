<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AllServicesController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\RequestController;
use App\Http\Controllers\FeedbackController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Главная страница
Route::get('/', function () {
    return redirect()->route('first-step');
});

Route::get('/the-first-step', function () {
    return view('first-step');
})->name('first-step');

// Авторизация и регистрация
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Главная страница (доступна всем)
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/choose-form', [RequestController::class, 'showForm'])->name('choose.form');
Route::post('/submit-form', [RequestController::class, 'submitForm'])->name('submit.form');
Route::post('/submit-review', [HomeController::class, 'submitReview'])->name('submit.review');


// Услуги (доступны всем)
Route::get('/all-services', [AllServicesController::class, 'index'])->name('all-services.index');
Route::get('/all-services/{slug}', [AllServicesController::class, 'show'])->name('all-services.show');


// О нас (доступно всем)
Route::get('/about', [AboutController::class, 'index'])->name('about');

// Главная страница портфолио
Route::get('/portfolio', [PortfolioController::class, 'index'])->name('portfolio.index');

// Страница категории (например, "/portfolio/tag")
Route::get('/portfolio/{category}', [PortfolioController::class, 'show'])->name('portfolio.show');

// Контакты (доступно всем)
Route::get('/contacts', [ContactController::class, 'index'])->name('contacts');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::post('/profile/update-profile', [ProfileController::class, 'updateProfile'])->name('profile.update');
    Route::post('/profile/update-password', [ProfileController::class, 'updatePassword'])->name('profile.update.password');
    Route::post('/profile/update-email', [ProfileController::class, 'updateEmail'])->name('profile.update.email');
    Route::post('/profile/delete-account', [ProfileController::class, 'deleteAccount'])->name('profile.delete');
});

// Корзина
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add', [CartController::class, 'addToCart'])->name('cart.add');
Route::post('/cart/clear', [CartController::class, 'clearCart'])->name('cart.clear');
Route::get('/cart/count', function () {
    $cartCount = session('cart_count', 0);
    return response()->json(['count' => $cartCount]);
})->name('cart.count');

require __DIR__.'/auth.php';

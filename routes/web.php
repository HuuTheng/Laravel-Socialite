<?php

use App\Http\Controllers\Auth\SocialLoginController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// Trang chủ
Route::get('/', function () {
    return view('welcome');
});

// Trang Login (Để nếu lỗi nó đá về đây không bị 404)
Route::get('/login', function () {
    return view('welcome'); // Hoặc tạo 1 file login riêng
})->name('login');

// Route cho Google Socialite
Route::get('auth/{provider}', [SocialLoginController::class, 'redirect']);
Route::get('auth/{provider}/callback', [SocialLoginController::class, 'callback']);

Route::get('/dashboard', function () {
    return view('dashboard', ['user' => Auth::user()]);
})->middleware(['auth']);

// Route Đăng xuất
Route::post('/logout', function () {
    Auth::logout();
    return redirect('/');
})->name('logout');
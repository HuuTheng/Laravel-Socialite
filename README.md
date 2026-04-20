# Laravel Socialite Login (Google & Facebook)

Dự án tích hợp đăng nhập mạng xã hội sử dụng Laravel Socialite.

## 1. Cách cài đặt
1. Clone dự án: `git clone https://github.com/user/repo.git`
2. Cài đặt thư viện: `composer install`
3. Tạo file .env: `cp .env.example .env`
4. Tạo key: `php artisan key:generate`
5. Cấu hình Database trong `.env` và chạy: `php artisan migrate`
6. Chạy dự án: `php artisan serve --host=localhost --port=8000`

## 2. Cấu hình OAuth
### Google
- Truy cập [Google Console](https://console.cloud.google.com/).
- Tạo Credentials -> OAuth Client ID.
- Thêm Redirect URI: `http://localhost:8000/auth/google/callback`.
- Copy Client ID và Secret vào file `.env`.

### Facebook
- Truy cập [Facebook Developers](https://developers.facebook.com/).
- Tạo App -> Facebook Login -> Settings.
- Thêm Redirect URI: `http://localhost:8000/auth/facebook/callback`.
- Cấu hình Privacy Policy URL: `http://localhost:8000`.
- Copy App ID và Secret vào file `.env`.

<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Exception;
use Illuminate\Http\RedirectResponse;
use GuzzleHttp\Client;

class SocialLoginController extends Controller
{
    /**
     * Chuyển hướng người dùng đến Google hoặc Facebook.
     */
    public function redirect($provider): RedirectResponse
    {
        try {
            $driver = Socialite::driver($provider);

            if ($provider === 'facebook') {
                $driver->scopes(['public_profile', 'email']);
            }

            // Tắt kiểm tra SSL khi chuyển hướng
            return $driver
                ->setHttpClient(new Client(['verify' => false]))
                ->redirect();
        } catch (Exception $e) {
            dd("Lỗi điều hướng: " . $e->getMessage());
        }
    }

    /**
     * Xử lý dữ liệu phản hồi từ Provider.
     */
    public function callback($provider): RedirectResponse
    {
        try {
            // SỬA TẠI ĐÂY: Thêm stateless() để bỏ qua kiểm tra InvalidStateException
            $socialUser = Socialite::driver($provider)
                ->stateless()
                ->setHttpClient(new Client(['verify' => false]))
                ->user();

            $userEmail = $socialUser->getEmail() ?? ($socialUser->getId() . '@facebook.com');

            $user = User::updateOrCreate([
                'email' => $userEmail,
            ], [
                'name' => $socialUser->getName() ?? 'Social User',
                'provider_id' => $socialUser->getId(),
                'provider' => $provider,
                'avatar' => $socialUser->getAvatar(),
                'student_id' => '23810310389',
            ]);

            Auth::login($user, true);

            return redirect('/dashboard');

        } catch (Exception $e) {
            // Nếu vẫn lỗi, in ra chi tiết để debug
            if (method_exists($e, 'getResponse') && $e->getResponse()) {
                $responseBody = json_decode($e->getResponse()->getBody()->getContents(), true);
                dd(['Facebook_Error' => $responseBody]);
            }

            dd([
                'Lỗi' => get_class($e),
                'Thông báo' => $e->getMessage(),
                'File' => $e->getFile(),
                'Line' => $e->getLine()
            ]);
        }
    }

    /**
     * Chức năng đăng xuất.
     */
    public function logout(): RedirectResponse
    {
        Auth::logout();
        return redirect('/');
    }
}
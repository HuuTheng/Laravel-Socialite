<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * Các trường có thể lưu dữ liệu hàng loạt (Mass Assignment)
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'student_id',
        'provider',
        'provider_id',
        'avatar',
    ];

    /**
     * Các trường cần ẩn khi chuyển sang dạng mảng/JSON
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Chuyển đổi kiểu dữ liệu
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
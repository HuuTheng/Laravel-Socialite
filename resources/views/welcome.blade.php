<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Đăng nhập Sinh viên</title>
    <style>
        body {
            font-family: 'Instrument Sans', sans-serif;
            background-color: #f3f4f6;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .login-card {
            background: white;
            padding: 2.5rem;
            /* Tăng padding chút cho thoáng */
            border-radius: 12px;
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
            text-align: center;
            width: 100%;
            max-width: 400px;
        }

        h2 {
            color: #1f2937;
            margin-bottom: 0.5rem;
            font-size: 1.5rem;
            font-weight: 700;
        }

        /* Định dạng chung cho cả hai nút */
        .btn-social {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 12px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.2s ease;
            margin-bottom: 1rem;
            /* Khoảng cách giữa các nút */
            border: 1px solid transparent;
            /* Đặt nền border */
        }

        .btn-social img {
            width: 20px;
            margin-right: 12px;
        }

        /* Định dạng cụ thể cho nút Google */
        .btn-google {
            background-color: #ffffff;
            color: #374151;
            border-color: #d1d5db;
            /* Viền xám cho nút Google */
        }

        .btn-google:hover {
            background-color: #f9fafb;
            border-color: #9ca3af;
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05);
        }

        /* Định dạng cụ thể cho nút Facebook */
        .btn-facebook {
            background-color: #1877F2;
            /* Màu chuẩn Facebook */
            color: #ffffff;
        }

        .btn-facebook:hover {
            background-color: #166fe5;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>

<body>

    <div class="login-card">
        <h2>Hệ Thống Đăng Nhập</h2>
        <p style="color: #6b7280; margin-bottom: 2.5rem;">Vui lòng sử dụng tài khoản để tiếp tục</p>

        <a href="{{ url('auth/google') }}" class="btn-social btn-google">
            <img src="https://www.gstatic.com/firebasejs/ui/2.0.0/images/auth/google.svg" alt="Google">
            Đăng nhập với Google
        </a>
        <a href="{{ url('auth/facebook') }}" class="btn-social btn-facebook">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" viewBox="0 0 24 24"
                style="margin-right: 12px;">
                <path
                    d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z" />
            </svg>
            Đăng nhập với Facebook
        </a>
        </a>
    </div>

</body>

</html>
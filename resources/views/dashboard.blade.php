<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard Sinh Viên</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f0f2f5;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .dashboard-card {
            background: white;
            padding: 2.5rem;
            border-radius: 15px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
            text-align: center;
            width: 100%;
            max-width: 450px;
        }

        .avatar {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            border: 4px solid #fff;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 1rem;
            object-fit: cover;
        }

        h1 {
            color: #1a73e8;
            margin-bottom: 0.5rem;
            font-size: 1.8rem;
        }

        .info-group {
            text-align: left;
            background: #f8f9fa;
            padding: 1rem;
            border-radius: 10px;
            margin-bottom: 1.5rem;
        }

        .info-item {
            margin: 10px 0;
            color: #444;
            border-bottom: 1px dashed #ddd;
            padding-bottom: 5px;
        }

        .info-item:last-child {
            border-bottom: none;
        }

        .label {
            font-weight: 600;
            color: #777;
            width: 120px;
            display: inline-block;
        }

        button {
            background-color: #dc3545;
            color: white;
            border: none;
            padding: 10px 25px;
            border-radius: 8px;
            font-weight: 600;
            cursor: pointer;
            transition: background 0.3s;
        }

        button:hover {
            background-color: #c82333;
        }

        .status-badge {
            background: #28a745;
            color: white;
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 0.8rem;
            display: inline-block;
            margin-bottom: 1rem;
        }
    </style>
</head>

<body>

    <div class="dashboard-card">
        <div class="status-badge">Đăng nhập thành công</div>

        @if(Auth::user()->avatar)
            <img src="{{ Auth::user()->avatar }}" alt="Avatar" class="avatar">
        @else
            <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&background=random"
                class="avatar">
        @endif

        <h1>Xin chào, {{ Auth::user()->name }}!</h1>
        <p style="color: #666; margin-bottom: 1.5rem;">Chào mừng bạn trở lại hệ thống sinh viên</p>

        <div class="info-group">
            <div class="info-item">
                <span class="label">Mã sinh viên:</span>
                <strong>{{ Auth::user()->student_id }}</strong>
            </div>
            <div class="info-item">
                <span class="label">Email:</span>
                <strong>{{ Auth::user()->email }}</strong>
            </div>
            <div class="info-item">
                <span class="label">Nguồn:</span>
                <span style="text-transform: capitalize; color: #1a73e8; font-weight: bold;">
                    {{ Auth::user()->provider ?? 'Hệ thống' }}
                </span>
            </div>
        </div>

        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit">Đăng xuất khỏi hệ thống</button>
        </form>
    </div>

</body>

</html>
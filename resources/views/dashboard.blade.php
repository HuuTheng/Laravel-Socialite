<!DOCTYPE html>
<html>

<head>
    <title>Dashboard Sinh Viên</title>
</head>

<body>
    <h1>Đăng nhập thành công!</h1>
    <hr>
    <p>Xin chào: <strong>{{ $user->name }}</strong></p>
    <p>Mã sinh viên: {{ $user->student_id }}</p>
    <p>Email: {{ $user->email }}</p>
    <img src="{{ $user->avatar }}" width="100" style="border-radius: 50%">

    <br><br>
    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit">Đăng xuất</button>
    </form>
</body>

</html>
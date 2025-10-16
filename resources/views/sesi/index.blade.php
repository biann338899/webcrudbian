<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Login - PLNgger</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;600;800&display=swap" rel="stylesheet" />

    <!-- Custom CSS -->
    <link href="{{ asset('css/login.css') }}" rel="stylesheet" />
</head>
<body>

    <div class="login-container">
        <div class="login-content">

            <!-- ROBLOX Logo besar -->
            <img src="/img/roblox_logo.png" alt="Roblox Logo" class="roblox-logo" />

            <!-- Login Form -->
            <form method="POST" action="{{ route('login.post') }}" class="login-form">
                @csrf

                @if(session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                @endif
                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                <input type="email" name="email" placeholder="Email" value="{{ Session::get('email') }}" required />
                <input type="password" name="password" placeholder="Password" required />

                <button type="submit" class="btn-login">Login</button>
            </form>

            <!-- Optional Links -->
            <div class="extra-links">
                <a href="#">Lupa Password?</a> · <a href="#">Buat Akun</a>
            </div>

        </div>
    </div>

</body>
</html>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sumber Rejeki Energy</title>
    @vite(['resources/css/login.css'])
</head>

<body>
    <div class="main-container">
        <!-- Bagian Kiri (Login Form) -->
        <div class="left-panel">
            <div class="logo-container">
                <img src="{{ Vite::asset('resources/images/SUMBERREJEKEIENERGY.png') }}" alt="Logo Sumber Rejeki">
            </div>

            <div class="form-container">
                <div class="welcome-text">
                    <h2  >Welcome</h2>
                </div>
                @if (session('status'))
                    <p class="alert alert-success">{{ session('status') }}</p>
                @endif
                @if ($errors->any())
                    <p class="alert alert-danger">{{ $errors->first() }}</p>
                @endif
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="input-container">
                        <input type="text" name="username" placeholder="Username" required>
                    </div>
                    <div class="input-container">
                        <input type="password" name="password" placeholder="Password" required>
                    </div>
                    <button type="submit" class="btn-submit">Login</button>
                </form>
            </div>
        </div>

        <!-- Bagian Kanan (Ilustrasi) -->
        <div class="right-panel">
            <img src="{{ Vite::asset('resources/images/solar.png') }}" alt="Solar Panel Illustration">
        </div>
    </div>
</body>

</html>

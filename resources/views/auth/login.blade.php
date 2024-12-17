<!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sumber Rejeki Energy</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    @vite(['resources/css/login.css'])
</head>


<body>
    <div class="main-container">
        <!-- Bagian Kiri (Login Form) -->
        <div class="left-panel">
            <div class="form-container">
                <div class="logo-container">
                    <img src="{{ Vite::asset('resources/images/SUMBERREJEKEIENERGY.png') }}" alt="Logo Sumber Rejeki">
                </div>
                <div class="welcome-text">
                    <h2>Welcome</h2>
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

    <!-- Modal untuk Pesan Kesalahan -->
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Pesan Kesalahan</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    @if ($errors->any())
                        <p>{{ $errors->first() }}</p>
                    @endif
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            @if ($errors->any())
                $('#myModal').modal('show');
            @endif
        });
    </script>
</body>

</html>

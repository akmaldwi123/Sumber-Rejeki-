<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class LoginController extends Controller
{
    protected $redirectTo = '/stock';

    public function __construct()
    {
        // Middleware untuk memastikan hanya tamu yang dapat mengakses halaman login
        $this->middleware('guest')->except('logout');
    }

    // Menampilkan halaman login
    public function showLoginForm()
    {
        return view('auth.login'); // Pastikan file view ini ada
    }

    // Proses login
    public function login(Request $request)
    {
        // Validasi input login
        $this->validateLogin($request);

        // Coba autentikasi user
        if ($this->attemptLogin($request)) {
            $request->session()->regenerate();

            // Panggil metode authenticated untuk redirect berdasarkan role
            return $this->authenticated($request, Auth::user());
        }

        // Jika login gagal
        return redirect()->back()->withErrors([
            'username' => 'Username atau Password salah!',
        ])->withInput();
    }

    // Validasi input
    protected function validateLogin(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);
    }

    // Coba login menggunakan username dan password
    protected function attemptLogin(Request $request)
    {
        return Auth::attempt([
            'username' => $request->input('username'),
            'password' => $request->input('password'),
        ]);
    }

    // Redirect default (tidak dipakai jika ada authenticated)
    public function redirectPath()
    {
        return $this->redirectTo;
    }

    // Redirect berdasarkan role setelah login berhasil
    protected function authenticated(Request $request, $user)
    {
        Log::info('User logged in', ['role' => $user->role]); // Log role user yang login

        switch ($user->role) {
            case 'admin':
                return redirect('/admin');
            case 'manager':
                return redirect('/manager');
            case 'staffa':
                return redirect('/staffa');
            case 'staffb':
                return redirect('/staffb');
            case 'project':
                return redirect('/project');
            default:
                return redirect('/unauthorized'); // Jika role tidak dikenal
        }
    }

    // Proses logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login')->with('status', 'Anda berhasil logout, silahkan login kembali');
    }
}

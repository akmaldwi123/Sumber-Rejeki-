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
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $this->validateLogin($request);

        if ($this->attemptLogin($request)) {
            $request->session()->regenerate();

            return redirect()->intended($this->redirectPath());
        }

        return redirect()->back()->withErrors([
            'username' => 'Username atau Password salah!',
        ]);
    }

    protected function validateLogin(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);
    }

    protected function attemptLogin(Request $request)
    {
        return Auth::attempt([
            'username' => $request->input('username'),
            'password' => $request->input('password'),
        ]);
    }

    public function redirectPath()
    {
        return '/stock';
    }

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
            return redirect('/unauthorized');
        }
    }



    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login')->with('status', 'Anda berhasil logout, silahkan login kembali');
    }
}

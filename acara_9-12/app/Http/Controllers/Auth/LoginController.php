<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    use \Illuminate\Foundation\Auth\AuthenticatesUsers;

    /**
     * Menampilkan halaman login.
     */
    public function showLoginForm()
    {
        return view('auth.login');
    }

    /**
     * Proses login.
     */
    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string|min:6'
        ]);

        $loginType = $this->username($request);

        $credentials = [
            $loginType => $request->username,
            'password' => $request->password
        ];

        if (Auth::attempt($credentials, $request->filled('remember'))) {
            return redirect()->intended($this->redirectTo());
        }

        return redirect()->route('login')->withErrors([
            'error' => 'Username atau password salah!'
        ]);
    }

    /**
     * Menentukan apakah login menggunakan email atau username.
     */
    public function username(Request $request)
    {
        return filter_var($request->username, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
    }

    /**
     * Logout user dan hapus sesi.
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }

    /**
     * Redirect setelah login.
     */
    protected function redirectTo()
    {
        return route('home');
    }

    /**
     * Middleware.
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
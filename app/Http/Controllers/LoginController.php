<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Display login page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function showLoginForm()
    {
        return view('auth.login');
    }

    /**
     * Handle user login.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // Attempt to authenticate the user
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            $user = Auth::user();

            // Redirect based on user role
            switch ($user->role) {
                case 'admin':
                    return redirect()->intended('/dashboard');
                case 'user':
                    return redirect()->intended('/home');
                default:
                    Auth::logout();
                    return back()->withErrors([
                        'email' => 'Access denied: Undefined role for this account.',
                    ]);
            }
        }

        // Authentication failed
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    /**
     * Handle user logout.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
